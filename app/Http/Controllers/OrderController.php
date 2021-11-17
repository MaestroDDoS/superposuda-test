<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \Throwable;

class OrderController extends Controller
{
    private array $validation_rules =
    [
        'personal_info'     => [ 'required', 'string', 'min:3', 'max:255', 'regex:/^\s*(\S+)\s+(\S+)\s+(\S+)\s*$/' ],

        'item_article'      => [ 'required_without:item_manufacturer', 'max:255' ],		// simple filter
        'item_manufacturer' => [ 'required_without:item_article'     , 'max:255' ],

        'comment'           => [ 'required', 'string', 'min:1', 'max:255' ],
    ];

    private array  $http_headers  = [];

    public  function __construct()
    {
        $this->http_headers[ 'X-API-KEY' ] = env( 'RETAILCRM_API_KEY' );
    }

    private function validateRequest()
    {
        request()->validate( $this->validation_rules );
    }

    private function findProductID( array $filter )
    {
        $response = Http::withHeaders( $this->http_headers )
        ->acceptJson()
        ->get(
            env( "RETAILCRM_DOMAIN" ) . "/store/products",
            [
                'filter' => $filter,
            ]
        );

        if( $response->successful() )
        {
            try
            {
                return  $response->json()[ 'products' ][ 0 ][ 'offers' ][ 0 ][ 'id' ];      //return first product id from first page
            }
            catch( Throwable $e )
            {
                return;
            }
        }
    }

    public function renderForm()
    {
        return  view( "order-creation" );
    }

    public function submitNewOrder( Request $request )
    {
        $this->validateRequest();

        [ $lastname, $firstname, $patronymic ] = preg_split( "/[\s]+/", $request->input('personal_info') );

        $comment           = $request->input('comment');
        $item_article      = $request->input('item_article');
        $item_manufacturer = $request->input('item_manufacturer');

        $product_id = $this->findProductID(
            [
                'name'         => $item_article,
                'manufacturer' => $item_manufacturer
            ]
        );

        if( !$product_id )
        {
            return  redirect()->back()->withErrors( [ 'product_id' => 'Missing product with selected filter!' ] );
        }

        $order_info =
        [
            'status'          => 'trouble',
            'orderType'       => 'fizik',
            'orderMethod'     => 'test',
            'number'          => '16102000',
            'firstName'       => $firstname,
            'lastName'        => $lastname,
            'patronymic'      => $patronymic,
            'customerComment' => $comment,

            'items' =>
            [
                [
                    'offer' =>
                    [
                        'id' => $product_id,
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders( $this->http_headers )
        ->asForm()
        ->acceptJson()
        ->post(
            env( "RETAILCRM_DOMAIN" ) . "/orders/create",
            [
                'site'  => 'test',
                'order' => json_encode( $order_info, true ),
            ]
        );

        if( !$response->successful() || !( $response->json()[ "success" ] ) )
        {
           return  redirect()->back()->withErrors( [ 'response' => $response->body() ] );
        }

        return  redirect()->back()->with( "order_id", $response->json()[ "id" ] );
    }
}

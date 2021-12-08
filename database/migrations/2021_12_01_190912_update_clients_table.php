<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'client_source_id' )->change();
                $table->unsignedBigInteger( 'c_c_base_id'      )->change();

                $table->foreign( 'client_source_id' )->references( 'id' )->on( 'client_sources' );
                $table->foreign( 'c_c_base_id'      )->references( 'id' )->on( 'c_c_bases'      );
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

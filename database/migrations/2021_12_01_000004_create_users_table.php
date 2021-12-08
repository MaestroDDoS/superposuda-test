<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function( Blueprint $table )
            {
                $table->id();
                $table->string( 'name' );
                $table->string( 'email' )                   ->unique();
                $table->string( 'phone' )                   ->unique();
                $table->unsignedBigInteger( 'user_role_id'  );
                $table->unsignedBigInteger( 'department_id' )->nullable();
                $table->unsignedBigInteger( 'permissions'   )->nullable();
                $table->string( 'password' );
                $table->boolean( 'verified' )               ->nullable();
                $table->timestamp( 'last_auth' )            ->nullable();
                $table->rememberToken();
                $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}

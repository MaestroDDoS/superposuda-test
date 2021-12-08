<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'user_role_id' )->change();
                $table->unsignedBigInteger( 'department_id' )->change();

                $table->foreign( 'department_id' )->references( 'id' )->on( 'departments' );
                $table->foreign( 'user_role_id' )->references( 'id' )->on( 'user_roles' );
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

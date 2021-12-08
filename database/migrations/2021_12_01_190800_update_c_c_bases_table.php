<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCCBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('c_c_bases', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'c_c_base_type_id' )->change();

                $table->foreign( 'c_c_base_type_id' )->references( 'id' )->on( 'c_c_base_types' );
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

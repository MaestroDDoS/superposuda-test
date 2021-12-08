<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetings', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'client_id'           )->change();
                $table->unsignedBigInteger( 'user_id'             )->change();
                $table->unsignedBigInteger( 'project_id'          )->change();
                $table->unsignedBigInteger( 'interview_status_id' )->change();
                $table->unsignedBigInteger( 'office_id'           )->change();

                $table->foreign( 'client_id'           )->references( 'id' )->on( 'clients'            );
                $table->foreign( 'user_id'             )->references( 'id' )->on( 'users'              );
                $table->foreign( 'project_id'          )->references( 'id' )->on( 'projects'           );
                $table->foreign( 'interview_status_id' )->references( 'id' )->on( 'interview_statuses' );
                $table->foreign( 'office_id'           )->references( 'id' )->on( 'offices'            );
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

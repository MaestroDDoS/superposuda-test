<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'job_seeker_id'       )->change();
                $table->unsignedBigInteger( 'vacancy_id'          )->change();
                $table->unsignedBigInteger( 'user_id'             )->change();
                $table->unsignedBigInteger( 'interview_status_id' )->change();
                $table->unsignedBigInteger( 'office_id'           )->change();

                $table->foreign( 'job_seeker_id'       )->references( 'id' )->on( 'job_seekers'        );
                $table->foreign( 'vacancy_id'          )->references( 'id' )->on( 'vacancies'          );
                $table->foreign( 'user_id'             )->references( 'id' )->on( 'users'              );
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

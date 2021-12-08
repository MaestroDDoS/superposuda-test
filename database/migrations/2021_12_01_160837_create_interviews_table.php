<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table)
            {
                $table->id();
                $table->dateTime( 'datetime' );
                $table->unsignedBigInteger( 'job_seeker_id' );
                $table->unsignedBigInteger( 'vacancy_id' );
                $table->unsignedBigInteger( 'user_id' );
                $table->unsignedBigInteger( 'interview_status_id' );
                $table->unsignedBigInteger( 'office_id' );
                $table->text( 'comment' );
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
        Schema::dropIfExists('interviews');
    }
}

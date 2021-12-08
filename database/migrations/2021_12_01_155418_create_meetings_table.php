<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->dateTime( 'datetime' );
            $table->unsignedBigInteger( 'client_id' );
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'project_id' );
            $table->unsignedBigInteger( 'interview_status_id' );
            $table->unsignedBigInteger( 'office_id' );
            $table->text( 'comment' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}

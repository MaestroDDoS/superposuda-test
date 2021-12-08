<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_seekers', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'job_seeker_source_id' )->change();
                $table->unsignedBigInteger( 'vacancy_id'           )->change();

                $table->foreign( 'job_seeker_source_id' )->references( 'id' )->on( 'job_seeker_sources' );
                $table->foreign( 'vacancy_id'           )->references( 'id' )->on( 'vacancies'          );
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

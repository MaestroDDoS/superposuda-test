<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table)
            {
                $table->unsignedBigInteger( 'client_id'         )->change();
                $table->unsignedBigInteger( 'project_type_id'   )->change();
                $table->unsignedBigInteger( 'project_status_id' )->change();

                $table->foreign( 'client_id'         )->references( 'id' )->on( 'clients'           );
                $table->foreign( 'project_type_id'   )->references( 'id' )->on( 'project_types'     );
                $table->foreign( 'project_status_id' )->references( 'id' )->on( 'project_statuses'  );
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

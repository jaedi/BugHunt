<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_assignments', function (Blueprint $table) {
            $table->id(); //Primary key
            $table->unsignedBigInteger('project_id'); //Project being assigned to the user
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); //Assigning foreign key
            //alter table `project_assignments` add foreign key (`project_id`) references `projects`(id)
            $table->unsignedBigInteger('user_id'); //User that is assigned to a project
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //Assigning foreign key
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
        Schema::dropIfExists('project_assignments');
    }
}

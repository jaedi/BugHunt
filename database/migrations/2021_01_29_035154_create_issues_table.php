<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('issue'); //Title of an issue/bug
            $table->longText('note'); //Testers
            $table->string('priority_level'); // Low, Medium, High
            // Low: Bug can be fixed at a later date. Other, more serious bugs take priority.
            // Medium: Bug can be fixed in the normal course of development and testing.
            // High: Bug must be resolved at the earliest as it affects the system adversely and renders it unusable until it is resolved.
            $table->string('status'); //See how that issue is being solved or not (Solved, Unsolved)
            $table->dateTime('due_at'); //Due date
            $table->unsignedBigInteger('assign_id');
            $table->foreign('assign_id')->references('id')->on('project_assignments')->onDelete('cascade'); 
            //Issue is Issued by this user
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
        Schema::dropIfExists('issues');
    }
}

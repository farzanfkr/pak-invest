<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('employer_id');
            $table->string('employer_name');
            $table->string('employer_national_code');
            $table->string('employer_mobile');
            $table->string('address');
            $table->string('needed_budget');
            $table->string('current_budget');
            $table->string('budget_percent');
            $table->string('description');
            // $table->integer('investor_id')->nullable();
            $table->enum('status',['fundraising','in process','finished']);
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
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('restrict');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skills');
    }
}

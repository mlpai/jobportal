<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerPostedJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_posted_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobseeker_id');
            $table->unsignedBigInteger('posted_job_id');
            $table->unsignedBigInteger('type');
            $table->timestamps();

            $table->foreign('jobseeker_id')->references('id')->on('users');
            $table->foreign('posted_job_id')->references('id')->on('posted_jobs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_posted_job');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobseeker_id')->index();
            $table->string('job_role');
            $table->string('company_name');
            $table->string('location');
            $table->string('experience_year')->nullable();
            $table->string('experience_month')->nullable();
            $table->string('drawn_salary')->nullable();
            $table->text('job_responsibility')->nullable();
            $table->bigInteger('currently_working')->default(1);
            $table->timestamps();

            // $table->foreign('jobseeker_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_experiences');
    }
}

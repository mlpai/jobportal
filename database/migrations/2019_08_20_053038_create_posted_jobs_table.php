<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posted_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('JobTitle');
            $table->unsignedBigInteger('company_id')->index();
            $table->string('Location'); //Id
            $table->unsignedBigInteger('JobType'); //JobType|full,Part
            $table->string('salaryFrom')->nullable();
            $table->string('salaryTo')->nullable();
            $table->unsignedInteger('salarytime')->nullable();
            $table->unsignedBigInteger('Positions')->nullable();
            $table->unsignedBigInteger('IndustryType'); //type
            $table->text('JobSummary')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('skills')->nullable();
            $table->unsignedBigInteger('job_status')->default(1);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posted_jobs');
    }
}

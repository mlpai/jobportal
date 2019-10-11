<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jobseeker_id')->index();
            $table->string('qualification');
            $table->string('university');
            $table->string('year')->nullable();
            $table->float('percentage')->nullable();
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
        Schema::dropIfExists('jobseeker_educations');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyJobseekerMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_jobseeker_msgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobseeker_id');
            $table->unsignedBigInteger('company_id');
            $table->string('msg',500);
            $table->timestamps();

            $table->foreign('jobseeker_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on ('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_jobseeker_msgs');
    }
}

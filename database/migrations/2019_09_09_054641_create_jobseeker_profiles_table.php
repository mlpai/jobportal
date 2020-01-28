<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobseeker_id')->index();
            $table->string('profile_photo')->nullable();
            $table->string('profile_title');
            $table->string('mobile')->nullable();
            $table->string('address');
            $table->bigInteger('career_level')->default(0);
            $table->text('key_skills')->nullable();
            $table->string('current_salary')->nullable();
            $table->bigInteger('visibility')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('jobseeker_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_profiles');
    }
}

<?php

use App\Company;
use App\Jobseeker;
use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $company = random_int(10,100);
        $jobseekers = random_int(10,50);
        $jobs = random_int(100,999);

        factory(Company::class, $company)->create()->each(
            function($user)
            {
                $user->CompanyProfile()->save(factory(App\CompanyProfiles::class)->make());
            }
        );
        factory(Jobseeker::class, $jobseekers)->create()->each(
            function($user)
            {
                $user->JobseekerProfile()->save(factory(App\JobseekerProfile::class)->make());
                $user->jobseekerExperience()->save(factory(App\jobseeker_experience::class)->make());
                $user->jobseekerExperience()->save(factory(App\jobseeker_experience::class)->make());
                $user->jobseekerExperience()->save(factory(App\jobseeker_education::class)->make());
            }
        );

        factory(App\PostedJob::class,$jobs)->create();
    }
}

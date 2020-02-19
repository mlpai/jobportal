<?php

Route::get('/', 'SiteController@home')->name('homepage');

Route::get('/job-listings', 'SiteController@joblistings')->name('joblistings');
Route::get('/job-details/{id?}/{title?}', 'SiteController@singlejob')->name('firstJob');
Route::post('/job-listings','SiteController@searchJob')->name('searchJobs');
Route::post('/','SiteController@subscribe')->name('newsletter');
// Global PDF
Route::get('/jobseekers/{token}/profile','jobSeekers\jobseekerProfileController@getEmailProfile')->middleware('auth')->name('jobseekerpdf');

Auth::routes();

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('google');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');



//verify and Resend Emails and Pages
Route::get('/EmailVerification','Authorization\VerificationController@index')->prefix('user')->name('verificationPage');
Route::get('/verify/{token}','Authorization\VerificationController@verify')->prefix('user')->name('verifyEmail');
Route::get('/verify/Email/Resend','Authorization\VerificationController@resendEmail')->prefix('user')->name('resendEmail');
//--------------------------------------------------------------------------------------------------------------------------------


// msg send chat pop-up
Route::get('/msg/{Jobseekerid}/{CompanyId}','CompanyPostsController@GetMsg')->middleware(['auth'])->prefix('company');
Route::get('/jobseekers/msg/{Jobseekerid}/{CompanyId}','JobSeekers\JobSeekerController@GetMsg')->middleware(['auth']);
Route::post('/msg','CompanyJobseekerMsgController@store')->middleware('auth')->name('chatPost');





// Admin Route
Route::group(['prefix' => 'admin','middleware'=>['auth']], function () {
    Route::patch('/dashboard/companies/info','Admin\AdminController@UserStatus');
    Route::get('/dashboard','Admin\AdminController@dashboard')->name('admin');
    Route::patch('/dashboard/companies', 'CompanyPostsController@changeStatus')->name('adminPostUpdate');

    Route::get('/dashboard/jobseekers/pdf/{id}','Admin\AdminJobseekerController@getpdf')->name('getpdf');

    Route::resource('dashboard/companies','Admin\AdminCompanyController');
    Route::resource('dashboard/jobseekers','Admin\AdminJobseekerController');
});




//company
Route::get('/profile/edit','CompanyProfileController@index')->prefix('company')->name('EditProfile');
Route::post('/profile','CompanyProfileController@store')->prefix('company')->name('CreateProfile');

Route::group(['middleware' => ['auth','profileCreated'],'prefix'=>'company'], function () {

    Route::get('/dashboard', 'CompanyDashboardController@index')->name('dashboard'); //---------------------

    Route::post('/update/Status/{post}/{jobseeker}/{status}', 'CompanyDashboardController@changeJobStatus')->name('changeJobStatus');

    Route::get('post-job','CompanyPostsController@index')->name('postjob');

    Route::get('post-job/create-step-1','CompanyPostsController@formpart1')->name('formpart1');
    Route::get('post-job/create-step-2','CompanyPostsController@formpart1')->name('formpart2');
    Route::get('post-job/create-step-3','CompanyPostsController@formpart1')->name('formpart3');  //----------------------
    Route::get('post-job/create-review','CompanyPostsController@formpart1')->name('review');
    Route::get('post-job/save-post','CompanyPostsController@store')->name('SavePost');


    Route::post('post-job/create-step-1','CompanyPostsController@formpart1Post')->name('formpart1');
    Route::post('post-job/create-step-2','CompanyPostsController@formpart2Post')->name('formpart2');
    Route::post('post-job/create-step-3','CompanyPostsController@formpart3Post')->name('formpart3');


    Route::get('post-job/show/edit','CompanyPostsController@update')->name('formpart3Update');
    Route::get('post-job/show/{id?}/{slug?}','CompanyPostsController@show')->name('showpost');

    Route::get('/post-job/candidates/{job}/{slug?}','CompanyPostsController@showJobseekers')->name('candidates');


    Route::get('/profile','CompanyProfileController@index')->name('ShowProfile'); //------------------------------

    Route::patch('update/postStatus', 'CompanyPostsController@changeStatus');

});

//JobSeekers

Route::group(['middleware' => ['auth','onlyJobseeker'],'prefix'=>'jobseekers'], function () {

    Route::get('/profile/pdf/download','jobSeekers\jobseekerProfileController@getpdf')->name('pdf');

    Route::resource('/profile','jobSeekers\jobseekerProfileController');

    Route::resource('/profile/Experiences','jobSeekers\JobseekerExperienceController')->except('show','index');

    Route::get('/messages','JobSeekers\JobseekerController@messages')->name('messages');
    Route::get('/dashboard','JobSeekers\JobSeekerController@index')->name('jobseeker');
    Route::get('post/{post}/{type?}','Jobseekers\JobSeekerController@create')->name('applyPost');
});

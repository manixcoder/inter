<?php

use App\User;

Route::get('clear-cache', function () {
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('config:cache');
	Session::flash('success', 'All Clear'); 
	echo "DONE";
});


/* All web link Start... */ 
/* Recruiter basic info */
Route::get('basic/info', function () {
	return view('fruntend.recruiter_profile_section.basic_info');
});
Route::get('recruiter-about', function () {
	return view('fruntend.recruiter_profile_section.about');
});
Route::get('recruiter-posts', function () {
	return view('fruntend.recruiter_profile_section.my_posts');
});

Route::any('recruiter-listings', 'HomeController@recruiterListings');




Route::get('company-info/{id}', 'StudentDashboardController@companyInfo');
Route::get('recruiter-about/{id}', function () {
	return view('fruntend.student.company_profile.about');
});
Route::get('recruiter-posts/{id}', function () {
	return view('fruntend.student.company_profile.my_posts');
});



Route::get('recruiter-followers', function () {
	return view('fruntend.recruiter_profile_section.my_followers');
});
Route::get('recruiter-people', function () {
	return view('fruntend.recruiter_profile_section.people');
});

Route::get('recruiter-follow/{id}/{by_id}', 'RecruiterwebController@follow');
Route::get('recruiter-unfollow/{id}/{by_id}', 'RecruiterwebController@unfollow');
/* Recruiter basic info End */

Route::get('/', function () {
	$data['web_content'] = 'fruntend.homepage';
	return view('weblayout.web_content', compact('data'));
});

Route::get('aboutus', function () {
	return view('fruntend.aboutus');
});
Route::get('web/post/jobs', function () {
	return view('fruntend.recruiter.post_new_jobs');
});
/*Route::get('web/blog', function () {
		return view('fruntend.common_pages.web_blog');
	});*/
Route::get('recruiter-register-step-one', function () {
	return view('fruntend.recruiter_register.recruiter_register_step_one');
});
Route::any('recruider_register_step_one', 'HomeController@recruider_register_step_one');

Route::get('termsofuse', function () {
	return view('fruntend.termsofuse');
});

Route::get('privacypolicy', function () {
	return view('fruntend.privacypolicy');
});

Route::get('contactus', function () {
	return view('fruntend.contactus');
});

Route::get('web-login', function () {
	return view('fruntend.web_login');
});

Route::get('update-site', function () {
	$data['content'] = 'errors.comming-soon';
	return view('layouts.content', compact('data'));
});

Route::get('/admin-login', function () {
	return view('admin.admin-login');
});

Route::get('forgot-password', function () {
	return view('admin.forgot_password');
});

Route::get('web-forgot-password', function () {
	return view('fruntend.common_pages.forgotpassword');
});

Route::get('verification_otp', function () {
	return view('admin.verification_code');
});

Route::get('recruiter-lending', function () {
	return view('fruntend.recruiter_landing');
});
Route::get('recruiter-login', function () {
	return view('fruntend.recruiter_login');
});
Route::any('blogsearch', 'SearchController@blogsearch');
//Route::any('blogsearch', 'HomeController@blogsearch');
Route::any('blogsearchweb', 'HomeController@blogsearchweb');
Route::get('blog', 'SearchController@web_blog_data');



/* After web login pages */

Route::get('about_us', function () {
	return view('fruntend.common_pages.aboutus');
});

Route::get('contact_us', function () {
	return view('fruntend.common_pages.contactus');
});

Route::get('termsof_use', function () {
	return view('fruntend.common_pages.termsofuse');
});

Route::get('privacy_policy', function () {
	return view('fruntend.common_pages.privacypolicy');
});

Route::get('recruiter/basic/info', function () {
	return view('fruntend.recruiter.recruiter_basicinfo');
});



Route::get('recruiter/myposts', function () {
	return view('fruntend.recruiter.recruiter_myposts');
});

Route::get('recruiter/mylisting', function () {
	return view('fruntend.recruiter.recruiter_mylisting');
});

Route::any('edit/recruiter/profile', 'RecruiterwebController@edit_recruiter_profile');
Route::any('edit/recruiter/about', 'RecruiterwebController@edit_recruiter_about');
/* After web login pages End */


/*################################ Student Routes By Ritik Start Here #############################*/

Route::get('student-register-step-one', function () {
	return view('fruntend.student.student_register.student_register_step_one');
});

Route::any('student_register_step_one', 'StudentregisterController@student_register_step_one');

Route::get('student-login', function () {
	return view('fruntend.student.student_login.login');
});

Route::get('student-landing-page', function () {
	return view('fruntend.student_landing');
});

Route::any('recruiter-dashboard', 'RecruiterwebController@dashboard');
Route::any('student_logged_in', 'StudentregisterController@student_logged_in');
Route::any('student-jobs', 'StudentregisterController@student_job_search');


/*################################# Student Routes By Ritik End Here ##############################*/

/* All web link end */

Auth::routes();
Route::any('forgot_password', 'HomeController@forgot_password');
Route::any('web/forgot/password', 'HomeController@web_forgot_password');
Route::any('web/otp/verify', 'HomeController@web_otp_verify');
Route::any('web_password_update', 'HomeController@web_password_update');
Route::any('add_contactus', 'SearchController@add_contactus');
Route::any('otp_verify', 'HomeController@otp_verify');
Route::any('password_update', 'HomeController@password_update');
Route::get('user-profile', 'HomeController@UserProfile');
Route::any('edit-userprofile', 'HomeController@UpdateProfile');
Route::get('home', 'DashboardController@index')->name('home');
Route::get('dashboard', 'DashboardController@dashboard');
Route::get('notification', 'DashboardController@notification');
Route::any('web/blog', 'HomeController@web_blog');
Route::any('web/blog/detail', 'BlogController@web_blog_detail');
Route::any('org-image-upload', 'HomeController@orgImageUpload');
Route::any('profile-image-upload', 'HomeController@profileImageUpload');



/*################################ Student Routes By Ritik Start Here #############################*/

Route::any('student-dashboard', 'StudentDashboardController@dashboard');
Route::any('delete-course/{id}', 'StudentDashboardController@deleteCourse');
Route::any('delete-experience/{id}', 'StudentDashboardController@deleteExperience');

//Here 
Route::get('student-profile-basic-info', 'StudentDashboardController@basic_info');
Route::any('student-profiles/{id}', 'StudentDashboardController@studentProfiles');
Route::any('student-reject/{id}/{r_id}/{j_id}', 'StudentDashboardController@studentReject');
Route::any('student-selected/{id}/{r_id}/{j_id}', 'StudentDashboardController@studentSelected');
Route::get('student-posts', 'StudentDashboardController@student_posts');

Route::get('student-applications', 'StudentDashboardController@student_applications');

Route::post('update_student_personal_details', 'StudentDashboardController@update_student_personal_details');

Route::post('add_student_education', 'StudentDashboardController@add_student_education');



Route::post('update_student_education', 'StudentDashboardController@update_student_education');

Route::post('add_student_experience', 'StudentDashboardController@add_student_experience');
Route::any('student-image-upload', 'StudentDashboardController@studentImageUpload');

Route::post('update_student_experience', 'StudentDashboardController@update_student_experience');

Route::post('add_student_certificate', 'StudentDashboardController@add_student_certificate');

Route::post('update_student_certificate', 'StudentDashboardController@update_student_certificate');

Route::post('add_student_industry', 'StudentDashboardController@add_student_industry');

Route::any('delete_student_industry/{id}', 'StudentDashboardController@delete_student_industry');

Route::post('add_student_business', 'StudentDashboardController@add_student_business');

Route::any('delete_student_business/{id}', 'StudentDashboardController@delete_student_business');

Route::post('add_student_hobby', 'StudentDashboardController@add_student_hobby');

Route::any('delete_student_hobby/{id}', 'StudentDashboardController@delete_student_hobby');

Route::post('add_student_accomplishment', 'StudentDashboardController@add_student_accomplishment');

Route::post('update_student_accomplishment', 'StudentDashboardController@update_student_accomplishment');

Route::post('add_post', 'StudentDashboardController@add_post');

Route::any('delete_student_post/{id}', 'StudentDashboardController@delete_student_post');
Route::any('delete-student-resume/{id}','StudentDashboardController@deleteStudentResume');

Route::get('student/jobs', 'StudentDashboardController@student_jobs');

Route::any('student-job-details/{id}', 'StudentDashboardController@student_job_details');
Route::any('company-profile', 'StudentDashboardController@companyProfile');
Route::any('company-posts', 'StudentDashboardController@companyPosts');
Route::any('company-listed-jobs', 'StudentDashboardController@companyListedJobs');

Route::post('student_job_apply', 'StudentDashboardController@student_job_apply');

Route::post('upload_student_resume', 'StudentDashboardController@upload_student_resume');

Route::get('student_setting', 'StudentDashboardController@student_setting');

Route::post('change-student-email', 'StudentDashboardController@change_student_email');

Route::post('change-student-phone', 'StudentDashboardController@change_student_phone');

Route::get('student_change_password', 'StudentDashboardController@student_change_password');

Route::post('student-password-update', 'StudentDashboardController@student_password_update');

Route::any('user-logout', 'StudentDashboardController@user_logout');

Route::post('update_student_about', 'StudentDashboardController@update_student_about');

/*################################# Student Routes By Ritik End Here ##############################*/

/* Admin login Routes */
Route::any('admin_logged_in', 'AdminController@admin_logged_in');
Route::any('web-login-dashboard', 'HomeController@web_login');
Route::any('search-header', 'DashboardController@search_header');
Route::any('contactus_queryes', 'DashboardController@contactus_queryes');
Route::any('query-delete/{id}', 'DashboardController@query_delete');

/* Admin login Routes End */

/* Job Routes */
Route::get('joblist', 'JobConroller@index');
Route::any('jobstatus-change/{id}', 'JobConroller@status_update');
Route::any('add-job', 'JobConroller@create');
Route::any('job-delete/{id}', 'JobConroller@delete');
Route::any('job-detail/{id}', 'JobConroller@job_detail');
Route::any('download-resume/{id}', 'JobConroller@file_download');
Route::any('job-details/{id}', 'JobConroller@job_details');
Route::any('company-details/{id}', 'JobConroller@company_details');
Route::get('today-job-list', 'JobConroller@today_job_list');
Route::any('job-profile/{id}', 'JobConroller@job_profile');


/* Recruiter */
Route::get('recruiter-list', 'RecruiterController@index');
Route::any('recruiter-change/{id}', 'RecruiterController@status_update');
Route::any('recruiter-delete/{id}', 'RecruiterController@delete');
Route::any('redirect-recruiter', 'RecruiterController@redirect_recruiter');
Route::any('add-recruiter', 'RecruiterController@create');
Route::any('recruiter-detail/{id}', 'RecruiterController@recruiter_detail');
Route::any('recruiter-delails-delete/{id}', 'RecruiterController@recruiterDelailsDelete');
Route::get('today-recruiter-list', 'RecruiterController@today_recruiter_list');
Route::any('search/filter/recruiter/posts', 'RecruiterwebController@search_filter_recruiter_posts');

/* Blogs */
Route::get('addblog_redirect', function () {
	$data['content'] = 'admin.blog.add_blog';
	return view('layouts.content', compact('data'));
});
Route::get('blog-list', 'BlogController@index');
Route::any('blog-change/{id}', 'BlogController@status_update');
Route::any('blog-delete/{id}', 'BlogController@delete');
Route::any('blog-detail/{id}', 'BlogController@blog_detail');
// Route::any('web/blog/detail/{id}', 'BlogController@web_blog_detail');

Route::any('add-blog', 'BlogController@create');
Route::any('edit-blog/{id}', 'BlogController@edit_blog');
Route::any('update-blog', 'BlogController@updateBlog');

/* Student */
Route::get('addstudent_redirect', function () {
	$data['content'] = 'admin.student.add_student';
	return view('layouts.content', compact('data'));
});
Route::get('student-list', 'StudentController@index');
Route::any('student-change/{id}', 'StudentController@status_update');
Route::any('student-delete/{id}', 'StudentController@delete');
Route::any('add-student', 'StudentController@create');
Route::any('student-detail/{id}', 'StudentController@student_detail');

Route::get('today-student-list', 'StudentController@today_student_list');

/* Posts */
Route::get('post_redirect', function () {
	$data['content'] = 'admin.post.add_post';
	return view('layouts.content', compact('data'));
});
Route::get('post-list', 'PostController@index');
Route::any('post-delete/{id}', 'PostController@delete');
Route::any('likefilter/{id}', 'PostController@likefilter');
Route::any('share-post', 'PostController@share_post');
Route::any('add-post', 'PostController@create');
Route::any('add-comment', 'PostController@add_comment');

/* Announcement */
Route::get('add_announcement', function () {
	$data['content'] = 'admin.announcement.add_announcement';
	return view('layouts.content', compact('data'));
});
Route::get('announcement-list', 'AnnouncementController@index');
Route::any('announcement-change/{id}', 'AnnouncementController@status_update');
Route::any('announcement-delete/{id}', 'AnnouncementController@delete');
Route::any('announcement-edit/{id}', 'AnnouncementController@edit');
Route::any('add-announcement', 'AnnouncementController@create');

/* About us */
Route::get('add_aboutus', function () {
	$data['content'] = 'admin.aboutus.add_aboutus';
	return view('layouts.content', compact('data'));
});
Route::get('aboutus-list', 'AboutusController@index');
Route::any('edit-aboutus/{id}', 'AboutusController@edit');
Route::any('delete-aboutus/{id}', 'AboutusController@delete');
Route::any('add-aboutus', 'AboutusController@create');

/* Terms Of Use */
Route::get('add_termsofuse', function () {
	$data['content'] = 'admin.terms_of_use.add_termsofuse';
	return view('layouts.content', compact('data'));
});
Route::get('termofuse-list', 'TermofuseController@index');
Route::any('edit-termofuse/{id}', 'TermofuseController@edit');
Route::any('delete-termofuse/{id}', 'TermofuseController@delete');
Route::any('add-termofuse', 'TermofuseController@create');
Route::any('edit-termofuse/{id}', 'TermofuseController@edit');

/* Privacy Policy */
Route::get('add_privacypolicy', function () {
	$data['content'] = 'admin.privacy_policy.add_privacypolicy';
	return view('layouts.content', compact('data'));
});
Route::get('privacypolicy-list', 'PrivacyPolicyController@index');
Route::any('edit-privacypolicy/{id}', 'PrivacyPolicyController@edit');
Route::any('delete-privacypolicy/{id}', 'PrivacyPolicyController@delete');
Route::any('add-privacypolicy', 'PrivacyPolicyController@create');

Auth::routes();
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', 'FaceBookController@loginUsingFacebook')->name('login');
    Route::get('callback', 'FaceBookController@callbackFromFacebook')->name('callback');
});
Route::prefix('linkedin')->name('linkedin.')->group( function(){
Route::get('/auth', 'SocialAuthLinkedinController@loginUsinglinkedin')->name('login');
Route::get('/callback', 'SocialAuthLinkedinController@callbackFromLinkedin')->name('callback');
});

Route::prefix('google')->name('google.')->group( function(){
	Route::get('google', 'GoogleController@redirectToGoogle')->name('login');
	Route::get('callback', 'GoogleController@handleGoogleCallback')->name('callback');
});
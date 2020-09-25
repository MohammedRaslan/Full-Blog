<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| BACK END Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/admin', 'Auth\LoginController@showLoginForm');

Route::group(['middleware'=>'auth'], function () {

    /* Admin Panel Pages */

    Route::get('/admin/dashboard', 'BackendController@DashboardPage')->name('dashboardpage');

    Route::get('/admin/settings', 'SettingsController@index')->name('settingspage');

    Route::get('/admin/about', 'AboutController@index')->name('aboutpage');

    Route::get('/admin/slider', 'SliderController@index')->name('sliderpage');

    Route::get('/admin/features', 'FeaturesController@index')->name('featurespage');

    Route::get('/admin/services', 'ServicesController@index')->name('servicespage');

    Route::get('/admin/counter', 'CountersController@index')->name('counterspage');

    Route::get('/admin/faqs', 'FaqsController@index')->name('faqspage');

    Route::get('/admin/partners', 'PartnersController@index')->name('partnerspage');

    Route::get('/admin/pricing', 'PricingController@index')->name('pricingpage');

    Route::get('/admin/testimonials', 'TestimonialsController@index')->name('testimonialspage');

    Route::get('/admin/team', 'TeamsController@index')->name('teampage');

    Route::get('/admin/projects', 'ProjectsController@index')->name('projectspage');

    Route::get('/admin/posts', 'PostsController@index')->name('postspage');

    Route::get('/admin/subscribers', 'SubscribersController@index')->name('subscriberspage');

    Route::get('/admin/messages', 'ContactsController@index')->name('messagespage');

    Route::get('/admin/pages', 'PagesController@index')->name('pagespage');


    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    /* Settings - Update Company */

    Route::post('/admin/settings/company', 'SettingsController@updateCompany')->name('update.company');

    /* Settings - Update Social Media */

    Route::post('/admin/settings/socials', 'SettingsController@updateSocials')->name('update.socials');

    /* Settings - Update Meta Tags */

    Route::post('/admin/settings/metas', 'SettingsController@updateMetas')->name('update.metas');

    /* Settings - Update Theme Color */

    Route::post('/admin/settings/color', 'SettingsController@updateColor')->name('update.color');

    /* Settings - Customize Home Page */

    Route::post('/admin/settings/homepage', 'SettingsController@updateHomePage')->name('update.homepage');

    /* Settings - Update Headings */

    Route::post('/admin/settings/headings', 'SettingsController@updateHeadings')->name('update.headings');

    /* Settings - Customize Navbar Menu */

    Route::post('/admin/settings/navbar', 'SettingsController@storeNavbar')->name('store.navbar');

    Route::post('/admin/settings/navbarShow', 'SettingsController@storeNavbarShow')->name('store.navbar.show');

    /* Settings - Update Admin Password */

    Route::post('/admin/settings/admin/password', 'SettingsController@updateAdminPassword')->name('update.admin.password');

    /* Settings - Add a New Admin */

    Route::post('/admin/settings/admin/add', 'SettingsController@addAdmin')->name('add.admin');

    /* Settings - Delete Admin */

    Route::get('/admin/settings/admin/delete/{id}', 'SettingsController@deleteAdmin')->name('delete.admin');

    /*
    |--------------------------------------------------------------------------
    | About us
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/about/status', 'AboutController@changeStatus')->name('update.status');


    /* About us - Update History */

    Route::post('/admin/about/history', 'AboutController@updateHistory')->name('update.history');

    /* About us - Update Mission */

    Route::post('/admin/about/mission', 'AboutController@updateMission')->name('update.mission');

    /* About us - Update Vision */

    Route::post('/admin/about/vision', 'AboutController@updateVision')->name('update.vision');

    /* About us - Get Edit Form Skill */

    Route::get('/admin/about/skills/{id}/edit', 'AboutController@editSkill')->name('edit.skill');

    /* About us - Update Skill */

    Route::post('/admin/about/skills/update/{id}/{name}/{perc}', 'AboutController@updateSkill')->name('update.skill');

    /* About us - Add Skill */

    Route::get('/admin/about/skills/addskill', 'AboutController@addSkill')->name('add.skill');

    Route::post('/admin/about/skills/addskill/store', 'AboutController@storeSkill')->name('store.skill');

    /* About us - delete Skill */

    Route::get('/admin/about/skills/delete/{id}', 'AboutController@deleteSkill')->name('delete.skill');


    /* About us - Update Logo */

    Route::post('/admin/about/logo', 'AboutController@updateLogo')->name('update.logo');

    /*
    |--------------------------------------------------------------------------
    | Slider
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/slider/status', 'SliderController@changeStatus')->name('update.slider.status');


    /* Sliders - Create Slider Form */

    Route::get('/admin/slider/add', 'SliderController@createSlider')->name('create.slider');

    /* Sliders - Store Slider*/

    Route::post('/admin/slider/store', 'SliderController@storeSlider')->name('store.slider');

    /* Sliders - Get Edit Form Slider */

    Route::get('/admin/slider/edit/{id}', 'SliderController@editSlider')->name('edit.slider');

    /* Sliders - Update Slider */

    Route::post('/admin/slider/update/{id}', 'SliderController@updateSlider')->name('update.slider');

    /* Sliders - Delete Slider */

    Route::get('/admin/slider/delete/{id}', 'SliderController@deleteSlider')->name('delete.slider');

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/features/Navstatus', 'FeaturesController@changeNavStatus')->name('update.feature.statusNav');

    
    Route::get('/admin/features/Homestatus', 'FeaturesController@changeHomeStatus')->name('update.feature.statusHome');

    /* Features - Get Edit Feature Form */

    Route::get('/admin/features/edit/{id}', 'FeaturesController@editFeature')->name('edit.feature');

    /* Features - Update Feature */

    Route::post('/admin/features/update/{id}', 'FeaturesController@updateFeature')->name('update.feature');

    /* Features - Update Feature Icon */

    Route::get('/admin/features/delete/{id}', 'FeaturesController@deleteFeature')->name('delete.feature');

    /* Features - Get Form To Add Feature */

    Route::get('/admin/features/add', 'FeaturesController@addFeature')->name('add.feature');

    /* Features - Store Feature */

    Route::post('/admin/features/store', 'FeaturesController@storeFeature')->name('store.feature');

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */


    Route::get('/admin/services/Navstatus', 'ServicesController@changeNavStatus')->name('update.service.statusNav');

    
    Route::get('/admin/services/Homestatus', 'ServicesController@changeHomeStatus')->name('update.service.statusHome');


    /* Services - Get Form To Edit Service */

    Route::get('/admin/services/edit/{id}', 'ServicesController@editServiceForm')->name('edit.service');

    /* Services - Update Service */

    Route::post('/admin/services/update/{id}', 'ServicesController@updateService')->name('update.service');

    /* Services - Delete Service */

    Route::get('/admin/services/delete/{id}', 'ServicesController@deleteService')->name('delete.service');

    /* Sliders - Add a New Service*/

    Route::post('/admin/service/add', 'ServicesController@addService')->name('add.service');

    /*
    |--------------------------------------------------------------------------
    | Counter
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/counter/Homestatus', 'CountersController@changeHomeStatus')->name('update.counter.statusHome');


    /* Counter - Get Edit Counter Form */

    Route::get('/admin/counter/edit/{id}', 'CountersController@editCounter')->name('edit.counter');

    /* Counter - Update Counter */

    Route::post('/admin/counter/update/{id}', 'CountersController@updateCounter')->name('update.counter');

    /* Counter - Update Counter */

    Route::get('/admin/counter/delete/{id}', 'CountersController@deleteCounter')->name('delete.counter');

    /* Counter - Get Form To Add Counter */

    Route::get('/admin/counter/add', 'CountersController@addCounter')->name('add.counter');

    /* Counter - Store Counter */

    Route::post('/admin/counter/store', 'CountersController@storeCounter')->name('store.counter');

    /*
    |--------------------------------------------------------------------------
    | FAQ's
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/Faq/Navstatus', 'FaqsController@changeNavStatus')->name('update.faqs.statusNav');

    
    Route::get('/admin/Faq/Homestatus', 'FaqsController@changeHomeStatus')->name('update.faqs.statusHome');

    /* FAQ's - Get Form To Edit Question */

    Route::get('/admin/faqs/edit/{id}', 'FaqsController@editFaqsForm')->name('edit.faq');

    /* FAQ's - Update Faq */

    Route::post('/admin/faqs/update/{id}', 'FaqsController@updateFaqs')->name('update.faq');

    /* FAQ's - Delete Faq */

    Route::get('/admin/faqs/delete/{id}', 'FaqsController@deleteFaqs')->name('delete.faq');

    /* FAQ's - Add a New Faq*/

    Route::post('/admin/faqs/add', 'FaqsController@addFaqs')->name('add.faq');

    /*
    |--------------------------------------------------------------------------
    | Partners
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/partner/Homestatus', 'PartnersController@changeHomeStatus')->name('update.partner.statusHome');

    /* Partners - Get Form To Edit Partner */

    Route::get('/admin/partner/edit/{id}', 'PartnersController@editPartnerForm')->name('edit.partner');

    /* Partners - Update Partner */

    Route::post('/admin/partner/update/{id}', 'PartnersController@updatePartner')->name('update.partner');

    /* Partners - Delete Partner */

    Route::get('/admin/partner/delete/{id}', 'PartnersController@deletePartner')->name('delete.partner');

    /* Partners - Add a New Partner*/

    Route::post('/admin/partner/add', 'PartnersController@addPartner')->name('add.partner');

    /*
    |--------------------------------------------------------------------------
    | Packages
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/package/Navstatus', 'PricingController@changeNavStatus')->name('update.package.statusNav');

    
    Route::get('/admin/package/Homestatus', 'PricingController@changeHomeStatus')->name('update.package.statusHome');

    /* Packages - Get Form To Edit Package */

    Route::get('/admin/package/edit/{id}', 'PricingController@editPackageForm')->name('edit.package');

    /* Packages - Get Form To Edit Package */

    Route::get('/admin/package/features/edit/{id}', 'PricingController@editPackageFeature')->name('edit.packagefeatures');

    /* Packages - Update Package */

    Route::post('/admin/package/update/{id}', 'PricingController@updatePackage')->name('update.package');

    /* Packages - Update Package Feature */

    Route::post('/admin/package/features/update/{id}', 'PricingController@updatePackageFeature')->name('update.packagefeature');

    /* Packages - Delete Package Feature */

    Route::get('/admin/package/features/delete/{id}', 'PricingController@deletePackageFeature')->name('delete.packagefeature');

    /* Packages - Add a New Package Feature*/

    Route::post('/admin/package/{package_id}/feature/add', 'PricingController@addPackageFeature')->name('add.packagefeature');

    /* Packages - Delete Package */

    Route::get('/admin/package/delete/{id}', 'PricingController@deletePackage')->name('delete.package');

    /* Packages - Add a New Package*/

    Route::post('/admin/package/add', 'PricingController@addPackage')->name('add.package');

    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/testimonials/Navstatus', 'TestimonialsController@changeNavStatus')->name('update.testimonials.statusNav');

    
    Route::get('/admin/testimonials/Homestatus', 'TestimonialsController@changeHomeStatus')->name('update.testimonials.statusHome');

    /* Testimonials - Get Form To Edit Package */

    Route::get('/admin/testimonials/edit/{id}', 'TestimonialsController@editTestimonialForm')->name('edit.testimonial');

    /* Testimonials - Update Testimonial */

    Route::post('/admin/testimonial/update/{id}', 'TestimonialsController@updateTestimonial')->name('update.testimonial');

    /* Testimonials - Delete Testimonial */

    Route::get('/admin/testimonial/delete/{id}', 'TestimonialsController@deleteTestimonial')->name('delete.testimonial');

    /* Testimonials - Add a New Testimonial*/

    Route::post('/admin/testimonial/add', 'TestimonialsController@addTestimonial')->name('add.testimonial');

    /*
    |--------------------------------------------------------------------------
    | Team Members
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/team/Navstatus', 'TeamsController@changeNavStatus')->name('update.team.statusNav');

    
    Route::get('/admin/team/Homestatus', 'TeamsController@changeHomeStatus')->name('update.team.statusHome');

    /* Team Members - Get Form To Edit Member */

    Route::get('/admin/team/edit/{id}', 'TeamsController@editTeamForm')->name('edit.team');

    /* Team Members - Update Team Member */

    Route::post('/admin/team/update/{id}', 'TeamsController@updateTeam')->name('update.team');

    /* Team Members - Delete Team Member */

    Route::get('/admin/team/delete/{id}', 'TeamsController@deleteTeam')->name('delete.team');

    /* Testimonials - Add a New Team Member */

    Route::post('/admin/team/add', 'TeamsController@addTeam')->name('add.team');


     /*
    |--------------------------------------------------------------------------
    | Projects & Project Categories
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/projects/Navstatus', 'ProjectsController@changeNavStatus')->name('update.projects.statusNav');

    
    Route::get('/admin/projects/Homestatus', 'ProjectsController@changeHomeStatus')->name('update.projects.statusHome');

    /* Projects - Get Form To Edit PRoject */

    Route::get('/admin/projects/edit/{id}', 'ProjectsController@editProject')->name('edit.project');


    /* Projects - Update Project */

    Route::post('/admin/projects/update/{id}', 'ProjectsController@updateProject')->name('update.project');

    /* Projects - Delete Project */

    Route::get('/admin/projects/delete/{id}', 'ProjectsController@deleteProject')->name('delete.project');

    /* Projects - Get Form To Edit Project Cat */

    Route::get('/admin/projects/category/edit/{id}', 'ProjectsController@editCategory')->name('edit.project-category');

    /* Projects - Update Project Category */

    Route::post('/admin/projects/category/update/{id}', 'ProjectsController@updateCategory')->name('update.project-category');

    /* Projects - Delete Project Category */

    Route::get('/admin/projects/category/delete/{id}', 'ProjectsController@deleteCategory')->name('delete.project-category');

    /* Projects - Add a New Category */

    Route::post('/admin/projects/category/add', 'ProjectsController@addCategory')->name('add.project-category');

    /* Projects - Add a New Project */

    Route::post('/admin/projects/add', 'ProjectsController@addProject')->name('add.project');

     /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    */

    /* Posts - Add New Post */

    Route::post('/admin/posts/add', 'PostsController@addPost')->name('add.post');

    /* Posts - Get Form To Edit Post */

    Route::get('/admin/posts/edit/{id}', 'PostsController@editPost')->name('edit.post');

    /* Posts - Update Post */

    Route::post('/admin/posts/update/{id}', 'PostsController@updatePost')->name('update.post');

    /* Posts - DElete Post */

    Route::get('/admin/posts/delete/{id}', 'PostsController@deletePost')->name('delete.post');

     /*
    |--------------------------------------------------------------------------
    | Subscribers
    |--------------------------------------------------------------------------
    */

    /* Subscribers - Delete Subscriber  */

    Route::get('/subscriber/delete/{id}', 'SubscribersController@deleteSubscriber')->name('delete.subscriber');

     /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    /* Messages - Read Full Message  */

    Route::get('/messages/read/{id}', 'ContactsController@readMessage')->name('read.message');

    /* Messages - Delete Message  */

    Route::get('/messages/delete/{id}', 'ContactsController@deleteMessage')->name('delete.message');

     /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    */

    /* Pages - Get Form To Add New Page */

    Route::get('/admin/pages/add', 'PagesController@addNewPage')->name('add.newpage');

    /* Pages - Add New Page */

    Route::post('/admin/pages/add/store', 'PagesController@addPage')->name('add.page');

    /* Pages - Get Form To Edit Page */

    Route::get('/admin/pages/edit/{id}', 'PagesController@editPage')->name('edit.page');

    /* Pages - Update Page */

    Route::post('/admin/pages/update/{id}', 'PagesController@updatePage')->name('update.page');

    /* Pages - DElete Page */

    Route::get('/admin/pages/delete/{id}', 'PagesController@deletePage')->name('delete.page');
});

/*
|--------------------------------------------------------------------------
| FRONT END Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'FrontendController@HomePage')->name('/');

Route::get('/about', 'FrontendController@AboutPage')->name('about');

Route::get('/features', 'FrontendController@FeaturesPage')->name('features');

Route::get('/services', 'FrontendController@ServicesPage')->name('services');

Route::get('/services/{id}', 'FrontendController@SingleServicePage')->name('singleservice');

Route::get('/projects', 'FrontendController@ProjectsPage')->name('projects');

Route::get('/projects/{id}', 'FrontendController@SingleProjectPage')->name('singleproject');

Route::get('/team', 'FrontendController@TeamPage')->name('team');

Route::get('/prices', 'FrontendController@PricesPage')->name('prices');

Route::get('/testimonials', 'FrontendController@TestimonialsPage')->name('testimonials');

Route::get('/blog', 'FrontendController@BlogPage')->name('blog');

Route::get('/blog/post/{id}', 'FrontendController@SinglePostPage')->name('singlepost');

Route::get('/faq', 'FrontendController@FaqPage')->name('faq');

Route::get('/contact', 'FrontendController@ContactPage')->name('contact');

Route::get('/{id}/{title}', 'FrontendController@PagesPage')->name('page');

/* Subscribers - Add New Subscriber To List */

Route::post('/addsubscriber', 'SubscribersController@addSubscriber')->name('add.subscriber');

/* Messages - Send Message From Contact Form */

Route::post('/sendmessage', 'ContactsController@sendMessage')->name('send.message');

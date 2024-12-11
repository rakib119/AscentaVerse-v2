<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\DashboardControllers\BlogCategoryController;
use App\Http\Controllers\DashboardControllers\home\BlogController;
use App\Http\Controllers\DashboardControllers\home\ContactController;
use App\Http\Controllers\DashboardControllers\home\DynamicContentController;
use App\Http\Controllers\DashboardControllers\home\FaqController;
use App\Http\Controllers\DashboardControllers\home\hs1LeftController;
use App\Http\Controllers\DashboardControllers\home\hs1RightController;
use App\Http\Controllers\DashboardControllers\home\hs2Controller;
use App\Http\Controllers\DashboardControllers\home\hs3LeftController;
use App\Http\Controllers\DashboardControllers\home\hs3RightController;
use App\Http\Controllers\DashboardControllers\home\hs4Controller;
use App\Http\Controllers\DashboardControllers\home\TeamController;
use App\Http\Controllers\DashboardControllers\home\TestimonialController;
use App\Http\Controllers\DashboardControllers\InfoController;
use App\Http\Controllers\DashboardControllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\socialMedia\PackagePurchaseController;
use App\Http\Controllers\socialMedia\SocialMediaController;
use App\Http\Controllers\socialMedia\UserInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$sectionIdArray = array( 1=>'Home Sec 1 left',2=>'Home Sec 1 Right(Banner)',3=>'Home Sec 2(About)',4=>'Home Sec 3 Right',5=>'Home Sec 3 Left',6=>'Home Sec 4',7=>'Faq',8=>'Team',9=>'Blog',10=>'Testimonial',11=>'Blog Details',12=>'Contact');
Auth::routes();

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/teams', 'teams')->name('teams');
    Route::get('/contact-us', 'contact_us')->name('contact_us');
    Route::get('/service/details/{slug}', 'services_details')->name('service.details');
    Route::get('/team/member/{slug}', 'team_member_dtls')->name('team_details');
    Route::get('/blogs', 'blogs')->name('blog');
    Route::get('/blog/details/{slug}', 'blogs_details')->name('blog-details');
    Route::get('/blogs/category/{slug}', 'category_wise_blogs')->name('blog.category');
    Route::get('/policies', 'policies')->name('policies');
    Route::get('/terms-and-conditions', 'terms_and_conditions')->name('t&c');
    Route::get('/return-and-refund-policy', 'return_and_refund_policy')->name('refund_policy');
    Route::get('/kyc', 'kyc')->name('kyc');
    Route::get('/notice', 'notice')->name('notice');

});
Route::post('send/message',[ContactController::class, 'send_message'])->name('send_message');

// HOME PAGE MANAGEMENT ROUTES
Route::middleware(['auth','RoutePermission'])->group(function () {

    Route::controller(BackendController::class)->prefix('admin')->group(function(){
        Route::get('/', 'dashboard')->name('dashboard');
    });
    Route::get('user/list',[BackendController::class, 'user_list'])->name('user.list');
    Route::get('user/details/{id}',[BackendController::class, 'user_details'])->name('user.details');

    // BANNER
    Route::resource('homeS1Left', hs1LeftController::class)->only(['index','store','update']);
    Route::post('homeS1Left/published',[hs1LeftController::class, 'published'])->name('homeS1Left.publish');

    //ABOUT
    Route::resource('homeS1Right', hs1RightController::class)->only(['index','store','edit','update','destroy']);
    Route::post('homeS1Right/published',[hs1RightController::class, 'published'])->name('homeS1Right.publish');
    Route::resource('homeS2', hs2Controller::class)->only(['index','store','update']);
    Route::post('homeS2/published',[hs2Controller::class, 'published'])->name('homeS2.publish');

    //ABOUT
    Route::resource('contact', ContactController::class);

    //PARTNERS
    Route::resource('homeS3Left', hs3LeftController::class)->only(['index','store','edit','update','destroy']);
    Route::post('homeS3Left/published',[hs3LeftController::class, 'published'])->name('homeS3Left.publish');
    Route::resource('homeS3Right', hs3RightController::class)->only(['index','store','update']);
    Route::post('homeS3Right/published',[hs3RightController::class, 'published'])->name('homeS3Right.publish');

    // SERVICE
    Route::resource('homeS4', hs4Controller::class);
    Route::post('homeS4/title/store',[hs4Controller::class, 'title_store'])->name('homeS4.title_store');
    Route::put('homeS4/title/update/{id}',[hs4Controller::class, 'title_update'])->name('homeS4.title_update');
    Route::post('homeS4/published',[hs4Controller::class, 'published'])->name('homeS4.publish');
    Route::get('homeS4/edit/details/{id}',[hs4Controller::class, 'serviceDetails'])->name('homeS4.details.edit');
    Route::put('homeS4/update/details',[hs4Controller::class, 'serviceDetailsUpdate'])->name('homeS4.details.update');

    //FAQ
    Route::resource('faq', FaqController::class);
    Route::post('faq/title/store',[FaqController::class, 'title_store'])->name('faq.title_store');
    Route::put('faq/title/update/{id}',[FaqController::class, 'title_update'])->name('faq.title_update');
    Route::post('faq/published',[FaqController::class, 'published'])->name('faq.publish');

    //TEAM
    Route::resource('team', TeamController::class);
    Route::post('team/title/store',[TeamController::class, 'title_store'])->name('team.title_store');
    Route::put('team/title/update/{id}',[TeamController::class, 'title_update'])->name('team.title_update');
    Route::post('team/published',[TeamController::class, 'published'])->name('team.publish');

    //BLOG CATEGORY
    Route::resource('blog-category', BlogCategoryController::class)->only('index','store','edit','update');

    //BLOG MST
    Route::resource('blog', BlogController::class);
    Route::post('blog/title/store',[BlogController::class, 'title_store'])->name('blog.title_store');
    Route::put('blog/title/update/{id}',[BlogController::class, 'title_update'])->name('blog.title_update');
    Route::post('blog/published',[BlogController::class, 'published'])->name('blog.publish');
    Route::get('blog/edit/details/{id}',[BlogController::class, 'blogDetails'])->name('blog.details.edit');
    Route::put('blog/update/details',[BlogController::class, 'blogDetailsUpdate'])->name('blog.details.update');

    //TESTIMONIAL
    Route::resource('testimonial', TestimonialController::class);
    Route::post('testimonial/title/store',[TestimonialController::class, 'title_store'])->name('testimonial.title_store');
    Route::put('testimonial/title/update/{id}',[TestimonialController::class, 'title_update'])->name('testimonial.title_update');
    Route::post('testimonial/published',[TestimonialController::class, 'published'])->name('testimonial.publish');

    //Settings
    Route::resource('info-setup', InfoController::class)->only('index','edit','update');
    Route::put('info-setup/photo/update/{id}',[InfoController::class, 'image_update'])->name('info-setup.photo-update');
    Route::post('info-setup/published',[InfoController::class, 'published'])->name('info-setup.publish');
    Route::post('ckeditor/upload', [InfoController::class, 'uploadCkFile'])->name('ckeditor.upload');

    //DynamicContentController
    Route::resource('content', DynamicContentController::class);

});

Route::middleware(['auth'])->group(function ()
{
    Route::resource('permission', PermissionController::class)->only('index','store','edit','update');
    Route::post('select-options', [PermissionController::class, 'get_options'])->name('permission.getOptions');
    Route::post('get-role', [PermissionController::class, 'get_role'])->name('permission.getRole');
    Route::post('update-role', [PermissionController::class, 'update_role'])->name('role.update');
});


// Social Media Route
Route::middleware(['auth'])->prefix('social-media')->group(function () {
    Route::get('/home',[SocialMediaController::class, 'social_home'])->name('social.home');
    Route::get('/my-account',[SocialMediaController::class, 'my_account'])->name('social.myAccount');
    Route::get('/profile/{slug?}',[SocialMediaController::class, 'social_profile'])->name('social.profile');
    Route::post('/upload-photo',[SocialMediaController::class, 'upload_photo'])->name('social.upload_photo');
    Route::post('/submit-step/{step}', [UserInfoController::class, 'submitStep'])->name('submitStep');
    Route::get('/load-step/{step}', [UserInfoController::class, 'loadStep'])->name('loadStep');

    Route::get('/my-info',[UserInfoController::class, 'myInfo'])->name('social.myInfo');
    Route::get('/load-division', [UserInfoController::class, 'loadDivision'])->name('loadDivision');
    Route::get('/load-district', [UserInfoController::class, 'loadDistrict'])->name('loadDistrict');
    Route::get('/load-upazila', [UserInfoController::class, 'loadUpazila'])->name('loadUpazila');

    Route::get('/upgrade-to-premium',[PackagePurchaseController::class, 'upgrade_to_premium'])->name('social.upgrade');
    Route::get('/choose-plan/{id}',[PackagePurchaseController::class, 'choose_plane'])->name('social.choose_plane');
    Route::get('/load-package-subtotal',[PackagePurchaseController::class, 'load_package_subtotal'])->name('social.load_subtotal');
    Route::get('/load-payment-method',[PackagePurchaseController::class, 'load_payment_method'])->name('social.load_payment_method');
    Route::get('/load-bank-name', [PackagePurchaseController::class, 'loadBankName'])->name('loadBankName');
    Route::get('/load-bank-dtls', [PackagePurchaseController::class, 'loadBankDtls'])->name('loadBankDtls');
    Route::post('/submit-payment', [PackagePurchaseController::class, 'submitPayment'])->name('submitManualPayment');

});

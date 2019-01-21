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

/*Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);
Route::post('/submitContact','HomeController@submitContact');
Route::post('submit-subscribe',['as'=>'submit-subscribe','uses'=>'HomeController@submitSubscribe']);
Route::get('blog',['as'=>'blog','uses'=>'HomeController@getBlog']);
Route::get('terms-condition',['as'=>'terms-condition','uses'=>'HomeController@getTermCondition']);
Route::get('privacy-policy',['as'=>'privacy-policy','uses'=>'HomeController@getPrivacyPolicy']);
Route::get('blog-details/{slug}',['as'=>'blog-details','uses'=>'HomeController@detailsBlog']);
Route::get('category-blog/{slug}',['as'=>'category-blog','uses'=>'HomeController@categoryBlog']);
Route::get('/menu/{id}/{name}','HomeController@getMenu');
Route::get('about-us',['as'=>'about-us','uses'=>'HomeController@getAbout']);
Route::get('contact-us',['as'=>'contact-us','uses'=>'HomeController@getContact']);*/

Route::get('cron-fire',['as'=>'cron-fire','uses'=>'HomeController@submitCronJob']);


Auth::routes();

Route::get('user-dashboard',['as'=>'user-dashboard','uses'=>'UserController@getDashboard']);

Route::get('user-edit-profile',['as'=>'user-edit-profile','uses'=>'UserController@editProfile']);
Route::post('user-edit-profile',['as'=>'user-update-profile','uses'=>'UserController@updateProfile']);

Route::get('user-change-password',['as'=>'user-change-password','uses'=>'UserController@getChangePass']);
Route::post('user-change-password',['as'=>'user-change-password','uses'=>'UserController@postChangePass']);

Route::group(['prefix' => 'user'], function () {


});


Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('admin-dashboard',['as'=>'dashboard','uses'=>'DashboardController@getDashboard']);

Route::group(['prefix' => 'admin'], function () {

    Route::get('edit-profile', ['as' => 'edit-profile', 'uses' => 'BasicSettingController@editProfile']);
    Route::post('edit-profile', ['as' => 'update-profile', 'uses' => 'BasicSettingController@updateProfile']);

    Route::get('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@getChangePass']);
    Route::post('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@postChangePass']);

    Route::get('basic-setting', ['as' => 'basic-setting', 'uses' => 'BasicSettingController@getBasicSetting']);
    Route::put('basic-general/{id}', ['as' => 'basic-update', 'uses' => 'BasicSettingController@putBasicSetting']);

    Route::get('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@manageLogo']);
    Route::post('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@updateLogo']);

    Route::get('email-template',['as'=>'email-template','uses'=>'BasicSettingController@manageEmailTemplate']);
    Route::post('email-template',['as'=>'email-template','uses'=>'BasicSettingController@updateEmailTemplate']);

    Route::get('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@manageAbout']);
    Route::post('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@updateAbout']);

    Route::get('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@shortAbout']);
    Route::post('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@updateShortAbout']);

    Route::get('manage-parallax',['as'=>'manage-parallax','uses'=>'WebSettingController@mangeParallax']);
    Route::post('manage-parallax',['as'=>'manage-parallax','uses'=>'WebSettingController@updateParallax']);


    Route::get('transaction-log',['as'=>'transaction-log','uses'=>'DashboardController@getTransactionLog']);

    Route::get('cron-job',['as'=>'cron-job','uses'=>'BasicSettingController@setCronJob']);

    Route::get('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@smsSetting']);
    Route::post('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@updateSmsSetting']);

    Route::get('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@getGoogleAnalytic']);
    Route::post('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@updateGoogleAnalytic']);

    Route::get('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@getLiveChat']);
    Route::post('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@updateLiveChat']);

    Route::get('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@manageTermsCondition']);
    Route::post('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@updateTermsCondition']);

    Route::get('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@managePrivacyPolicy']);
    Route::post('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@updatePrivacyPolicy']);

    Route::get('user-create',['as'=>'user-create','uses'=>'DashboardController@createUser']);
    Route::post('user-create',['as'=>'user-create','uses'=>'DashboardController@submitUser']);
    Route::get('user-edit/{id}',['as'=>'user-edit','uses'=>'DashboardController@editUser']);
    Route::post('user-update',['as'=>'user-update','uses'=>'DashboardController@updateUser']);
    Route::delete('user-delete',['as'=>'user-delete','uses'=>'DashboardController@deleteUser']);
    Route::get('manage-user',['as'=>'manage-user','uses'=>'DashboardController@manageUser']);
    Route::post('user-block',['as'=>'user-block','uses'=>'DashboardController@blockUser']);
    Route::post('email-block',['as'=>'email-block','uses'=>'DashboardController@blockEmail']);
    Route::post('phone-block',['as'=>'phone-block','uses'=>'DashboardController@blockPhone']);

    Route::get('/manage-footer', ['as' => 'manage-footer', 'uses' => 'WebSettingController@manageFooter']);
    Route::put('/manage-footer/{id}', ['as' => 'manage-footer-update', 'uses' => 'WebSettingController@updateFooter']);

    Route::get('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@manageSocial']);
    Route::post('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@storeSocial']);
    Route::get('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@editSocial']);
    Route::put('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@updateSocial']);
    Route::delete('manage-social/{product_id?}',['as'=>'social-delete','uses'=>'WebSettingController@deleteSocial']);

    Route::get('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@createMenu']);
    Route::post('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@storeMenu']);
    Route::get('menu-control',['as'=>'menu-control','uses'=>'WebSettingController@manageMenu']);
    Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenu']);
    Route::post('menu-update/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenu']);
    Route::delete('menu-delete',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenu']);

    Route::get('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@manageSlider']);
    Route::post('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@storeSlider']);
    Route::delete('slider-delete', ['as' => 'slider-delete', 'uses' => 'WebSettingController@deleteSlider']);

    Route::get('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@createMenu']);
    Route::post('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@storeMenu']);
    Route::get('menu-control',['as'=>'menu-control','uses'=>'WebSettingController@manageMenu']);
    Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenu']);
    Route::post('menu-update/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenu']);
    Route::delete('menu-delete',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenu']);

    Route::get('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@createTestimonial']);
    Route::post('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@submitTestimonial']);
    Route::get('testimonial-all',['as'=>'testimonial-all','uses'=>'WebSettingController@allTestimonial']);
    Route::get('testimonial-edit/{id}',['as'=>'testimonial-edit','uses'=>'WebSettingController@editTestimonial']);
    Route::put('testimonial-edit/{id}',['as'=>'testimonial-update','uses'=>'WebSettingController@updateTestimonial']);
    Route::delete('testimonial-delete',['as'=>'testimonial-delete','uses'=>'WebSettingController@deleteTestimonial']);

    Route::get('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@mangeBreadcrumb']);
    Route::post('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@updateBreadcrumb']);

    Route::get('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@createSpeciality']);
    Route::post('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@storeSpeciality']);
    Route::get('speciality-control',['as'=>'speciality-control','uses'=>'WebSettingController@manageSpeciality']);
    Route::get('speciality-edit/{id}',['as'=>'speciality-edit','uses'=>'WebSettingController@editSpeciality']);
    Route::post('speciality-update/{id}',['as'=>'speciality-update','uses'=>'WebSettingController@updateSpeciality']);
    Route::delete('speciality-delete',['as'=>'speciality-delete','uses'=>'WebSettingController@deleteSpeciality']);

    Route::get('manage-category',['as'=>'manage-category','uses'=>'CategoryController@manageCategory']);
    Route::post('manage-category',['as'=>'manage-category','uses'=>'CategoryController@storeCategory']);
    Route::get('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@editCategory']);
    Route::put('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@updateCategory']);
    Route::delete('/manage-category/{product_id?}','CategoryController@deleteItem');

    Route::get('manage-company',['as'=>'manage-company','uses'=>'CompanyController@manageCompany']);
    Route::post('manage-company',['as'=>'manage-company','uses'=>'CompanyController@storeCompany']);
    Route::get('manage-company/{product_id?}',['as'=>'company-edit','uses'=>'CompanyController@editCompany']);
    Route::put('manage-company/{product_id?}',['as'=>'company-edit','uses'=>'CompanyController@updateCompany']);

    Route::get('product-new',['as'=>'product-new','uses'=>'ProductController@newProduct']);
    Route::post('product-new',['as'=>'product-new','uses'=>'ProductController@storeProduct']);
    Route::get('product-history',['as'=>'product-history','uses'=>'ProductController@storeHistory']);
    Route::get('product-edit/{id}',['as'=>'product-edit','uses'=>'ProductController@editProduct']);
    Route::put('product-edit/{id}',['as'=>'product-update','uses'=>'ProductController@updateProduct']);
    Route::get('product-view/{id}',['as'=>'product-view','uses'=>'ProductController@viewProduct']);

    Route::get('store-new',['as'=>'store-new','uses'=>'StoreController@newStore']);
    Route::post('store-new',['as'=>'store-new','uses'=>'StoreController@submitStore']);
    Route::get('store-history',['as'=>'store-history','uses'=>'StoreController@storeHistory']);
    Route::get('store-view/{id}',['as'=>'store-view','uses'=>'StoreController@viewHistory']);
    Route::get('store-edit/{id}',['as'=>'store-edit','uses'=>'StoreController@editHistory']);
    Route::put('store-edit/{id}',['as'=>'store-update','uses'=>'StoreController@updateHistory']);
    Route::get('current-store',['as'=>'current-store','uses'=>'StoreController@currentStore']);
    Route::get('search-current-store',['as'=>'search-current-store','uses'=>'StoreController@searchCurrentStore']);
    Route::get('store-search-view/{id}',['as'=>'store-search-view','uses'=>'StoreController@searchViewResult']);

    Route::get('payment-new',['as'=>'payment-new','uses'=>'CompanyPaymentController@newPayment']);
    Route::post('payment-new',['as'=>'payment-new','uses'=>'CompanyPaymentController@storePayment']);
    Route::get('payment-history',['as'=>'payment-history','uses'=>'CompanyPaymentController@historyPayment']);
    Route::delete('payment-delete',['as'=>'payment-delete','uses'=>'CompanyPaymentController@deletePayment']);

    Route::get('mange-account',['as'=>'mange-account','uses'=>'AccountController@mangeAccount']);
    Route::post('mange-account',['as'=>'mange-account','uses'=>'AccountController@submitAccount']);
    Route::get('account-history',['as'=>'account-history','uses'=>'AccountController@historyAccount']);
    Route::delete('account-delete',['as'=>'account-delete','uses'=>'AccountController@deleteAccount']);

    Route::get('manage-instalment',['as'=>'manage-instalment','uses'=>'InstalmentController@manageInstalment']);
    Route::post('manage-instalment',['as'=>'manage-instalment','uses'=>'InstalmentController@storeInstalment']);
    Route::get('manage-instalment/{product_id?}',['as'=>'instalment-edit','uses'=>'InstalmentController@editInstalment']);
    Route::put('manage-instalment/{product_id?}',['as'=>'instalment-edit','uses'=>'InstalmentController@updateInstalment']);

    Route::get('customer-new',['as'=>'customer-new','uses'=>'CustomerController@createCustomer']);
    Route::post('customer-new',['as'=>'customer-new','uses'=>'CustomerController@storeCustomer']);
    Route::get('customer-history',['as'=>'customer-history','uses'=>'CustomerController@historyCustomer']);
    Route::get('customer-edit/{id}',['as'=>'customer-edit','uses'=>'CustomerController@editCustomer']);
    Route::put('customer-edit/{id}',['as'=>'customer-update','uses'=>'CustomerController@updateCustomer']);
    Route::get('customer-view/{id}',['as'=>'customer-view','uses'=>'CustomerController@viewCustomer']);

    Route::get('sell-new',['as'=>'sell-new','uses'=>'SellController@newSell']);
    Route::post('sell-new',['as'=>'sell-new','uses'=>'SellController@submitSell']);
    Route::get('sell-invoice/{invoice}',['as'=>'sell-invoice','uses'=>'SellController@sellInvoice']);
    Route::get('print-invoice/{invoice}',['as'=>'print-invoice','uses'=>'SellController@printInvoice']);
    Route::get('sell-history',['as'=>'sell-history','uses'=>'SellController@sellHistory']);
    Route::delete('sell-delete',['as'=>'sell-delete','uses'=>'SellController@sellDelete']);
    Route::get('check-instalment-percent/{instalment_id}/{total}',['as'=>'check-instalment-percent','uses'=>'SellController@checkInstalmentPercent']);

    Route::get('due-repayment',['as'=>'due-repayment','uses'=>'RepaymentController@newDueRepayment']);
    Route::get('get-customer-due',['as'=>'get-customer-due','uses'=>'RepaymentController@getCustomerDue']);
    Route::get('get-order-details/{id}',['as'=>'get-order-details','uses'=>'RepaymentController@getOrderDetails']);
    Route::post('submit-due-repayment',['as'=>'submit-due-repayment','uses'=>'RepaymentController@submitDueRepayment']);
    Route::get('due-repayment-history',['as'=>'due-repayment-history','uses'=>'RepaymentController@historyDueRepayment']);
    Route::delete('due-repayment-delete',['as'=>'due-repayment-delete','uses'=>'RepaymentController@deleteDueRepayment']);
    Route::get('upcoming-due-repayment',['as'=>'upcoming-due-repayment','uses'=>'RepaymentController@upcomingDueRepayment']);
    Route::get('repayment-search',['as'=>'repayment-search','uses'=>'RepaymentController@repaymentSearch']);
    Route::get('due-repayment-receipt-view/{invoice}',['as'=>'due-repayment-receipt-view','uses'=>'RepaymentController@dueRepaymentReceiptView']);
    Route::get('due-repayment-receipt-print/{invoice}',['as'=>'due-repayment-receipt-print','uses'=>'RepaymentController@dueRepaymentReceiptPrint']);


    Route::get('instalment-repayment',['as'=>'instalment-repayment','uses'=>'RepaymentController@instalmentRepayment']);
    Route::get('get-customer-instalment',['as'=>'get-customer-instalment','uses'=>'RepaymentController@CheckCustomerInstalment']);
    Route::get('instalment-repayment-list',['as'=>'instalment-repayment-list','uses'=>'RepaymentController@instalmentRepaymentList']);
    Route::get('get-instalment-details/{id}',['as'=>'get-instalment-details','uses'=>'RepaymentController@getInstalmentDetails']);
    Route::post('submit-instalment-repayment',['as'=>'submit-instalment-repayment','uses'=>'RepaymentController@submitInstalmentRepayment']);
    Route::get('instalment-repayment-history',['as'=>'instalment-repayment-history','uses'=>'RepaymentController@instalmentRepaymentHistory']);
    Route::delete('instalment-repayment-delete',['as'=>'instalment-repayment-delete','uses'=>'RepaymentController@deleteInstalmentRepayment']);
    Route::get('upcoming-instalment-repayment',['as'=>'upcoming-instalment-repayment','uses'=>'RepaymentController@upcomingInstalmentRepayment']);
    Route::get('instalment-repayment-search',['as'=>'instalment-repayment-search','uses'=>'RepaymentController@searchInstalmentRepayment']);
    Route::get('instalment-repayment-receipt/{invoice}',['as'=>'instalment-repayment-invoice','uses'=>'RepaymentController@invoiceInstalmentRepayment']);
    Route::get('instalment-repayment-receipt-print/{invoice}',['as'=>'instalment-repayment-invoice-print','uses'=>'RepaymentController@printInstalmentRepayment']);

    Route::get('manage-staff',['as'=>'manage-staff','uses'=>'DashboardController@manageStaff']);
    Route::post('manage-staff',['as'=>'manage-staff','uses'=>'DashboardController@storeStaff']);
    Route::get('manage-staff/{product_id?}',['as'=>'staff-edit','uses'=>'DashboardController@editStaff']);
    Route::put('manage-staff/{product_id?}',['as'=>'staff-edit','uses'=>'DashboardController@updateStaff']);

    /** Salary Route */

    Route::get('salaries','SalaryController@index')->name('salaries');
    Route::post('save-salaries','SalaryController@store')->name('save-salaries');



});

Route::get('/get-company-category',function (){
    $company_id = \Illuminate\Support\Facades\Input::get('company_id');
    $category = \App\Category::where('company_id','=',$company_id)->whereStatus(1)->get();
    return Response::json($category);
});

Route::get('/get-category-product',function (){
    $category_id = \Illuminate\Support\Facades\Input::get('category_id');
    $product = \App\Product::where('category_id','=',$category_id)->get();
    return Response::json($product);
});

Route::get('/check-product-code',function (){
    $code = \Illuminate\Support\Facades\Input::get('code');
    $product = \App\Code::whereCode($code)->count();
    if ($product == 0){
        $rr['errorStatus'] = 'yes';
        $rr['errorDetails'] = 'Enter Wrong Bar Code.';
        return $result = json_encode($rr);
    }else{
        $product = \App\Code::whereCode($code)->firstOrFail();
        if ($product->status == 1){
            $rr['errorStatus'] = 'yes';
            $rr['errorDetails'] = 'Product Is Already Soled.';
            return $result = json_encode($rr);
        }else{
            $rr['errorStatus'] = 'no';
            $rr['errorDetails'] = 'Product Is Added To Sell Item.';
            $rr['name'] = $product->product->name;
            $rr['warranty'] = $product->store->warranty;
            $rr['price'] = $product->store->sell_price;
            $rr['product_id'] = $product->store->product_id;
            return $result = json_encode($rr);
        }
    }

});

Route::get('/check-admin-balance',function (){
    $amount = \Illuminate\Support\Facades\Input::get('amount');
    $balance = \App\BasicSetting::first()->balance;
    if ($balance < $amount){
        $rr['errorStatus'] = 'yes';
        $rr['errorDetails'] = 'Amount Large Then Your Balance.';
    }else{
        $rr['errorStatus'] = 'no';
        $rr['errorDetails'] = 'You can Process Your Request.';
    }
    return $result = json_encode($rr);
});

Route::get('staff', 'Staff\LoginController@showLoginForm')->name('staff.login');
Route::post('staff', 'Staff\LoginController@login')->name('staff.login.post');
Route::get('staff/password/reset', 'Staff\ForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
Route::post('staff/password/email', 'Staff\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
Route::get('staff/password/reset/{token}', 'Staff\ResetPasswordController@showResetForm')->name('staff.password.reset');
Route::post('staff/password/reset', 'Staff\ResetPasswordController@reset');
Route::get('staff-logout', 'Staff\LoginController@logout')->name('staff.logout');

Route::get('staff-dashboard',['as'=>'staff-dashboard','uses'=>'StaffController@getDashboard']);

Route::group(['prefix' => 'staff'], function () {

    Route::get('edit-profile',['as'=>'staff-edit-profile','uses'=>'StaffController@editProfile']);
    Route::post('edit-profile',['as'=>'staff-update-profile','uses'=>'StaffController@updateProfile']);

    Route::get('change-password', ['as'=>'staff-change-password', 'uses'=>'StaffController@getChangePass']);
    Route::post('change-password', ['as'=>'staff-change-password', 'uses'=>'StaffController@postChangePass']);

    Route::get('instalment-repayment',['as'=>'staff-instalment-repayment','uses'=>'Staff\RepaymentController@instalmentRepayment']);
    Route::get('get-customer-instalment',['as'=>'staff-get-customer-instalment','uses'=>'Staff\RepaymentController@CheckCustomerInstalment']);
    Route::get('instalment-repayment-list',['as'=>'staff-instalment-repayment-list','uses'=>'Staff\RepaymentController@instalmentRepaymentList']);
    Route::get('get-instalment-details/{id}',['as'=>'staff-get-instalment-details','uses'=>'Staff\RepaymentController@getInstalmentDetails']);
    Route::post('submit-instalment-repayment',['as'=>'staff-submit-instalment-repayment','uses'=>'Staff\RepaymentController@submitInstalmentRepayment']);
    Route::get('instalment-repayment-history',['as'=>'staff-instalment-repayment-history','uses'=>'Staff\RepaymentController@instalmentRepaymentHistory']);
    Route::get('upcoming-instalment-repayment',['as'=>'staff-upcoming-instalment-repayment','uses'=>'Staff\RepaymentController@upcomingInstalmentRepayment']);
    Route::get('instalment-repayment-search',['as'=>'staff-instalment-repayment-search','uses'=>'Staff\RepaymentController@searchInstalmentRepayment']);
    Route::get('instalment-repayment-receipt/{invoice}',['as'=>'staff-instalment-repayment-invoice','uses'=>'Staff\RepaymentController@invoiceInstalmentRepayment']);
    Route::get('instalment-repayment-receipt-print/{invoice}',['as'=>'staff-instalment-repayment-invoice-print','uses'=>'Staff\RepaymentController@printInstalmentRepayment']);


    Route::get('due-repayment',['as'=>'staff-due-repayment','uses'=>'Staff\RepaymentController@newDueRepayment']);
    Route::get('get-customer-due',['as'=>'staff-get-customer-due','uses'=>'Staff\RepaymentController@getCustomerDue']);
    Route::get('get-order-details/{id}',['as'=>'staff-get-order-details','uses'=>'Staff\RepaymentController@getOrderDetails']);
    Route::post('submit-due-repayment',['as'=>'staff-submit-due-repayment','uses'=>'Staff\RepaymentController@submitDueRepayment']);
    Route::get('due-repayment-history',['as'=>'staff-due-repayment-history','uses'=>'Staff\RepaymentController@historyDueRepayment']);
    Route::delete('due-repayment-delete',['as'=>'due-repayment-delete','uses'=>'RepaymentController@deleteDueRepayment']);
    Route::get('upcoming-due-repayment',['as'=>'staff-upcoming-due-repayment','uses'=>'Staff\RepaymentController@upcomingDueRepayment']);
    Route::get('repayment-search',['as'=>'staff-repayment-search','uses'=>'Staff\RepaymentController@repaymentSearch']);
    Route::get('due-repayment-receipt-view/{invoice}',['as'=>'staff-due-repayment-receipt-view','uses'=>'Staff\RepaymentController@dueRepaymentReceiptView']);
    Route::get('due-repayment-receipt-print/{invoice}',['as'=>'staff-due-repayment-receipt-print','uses'=>'Staff\RepaymentController@dueRepaymentReceiptPrint']);

    Route::get('sell-new',['as'=>'staff-sell-new','uses'=>'Staff\SellController@newSell']);
    Route::post('sell-new',['as'=>'staff-sell-new','uses'=>'Staff\SellController@submitSell']);
    Route::get('sell-invoice/{invoice}',['as'=>'staff-sell-invoice','uses'=>'Staff\SellController@sellInvoice']);
    Route::get('print-invoice/{invoice}',['as'=>'staff-print-invoice','uses'=>'Staff\SellController@printInvoice']);
    Route::get('sell-history',['as'=>'staff-sell-history','uses'=>'Staff\SellController@sellHistory']);
    Route::delete('sell-delete',['as'=>'sell-delete','uses'=>'SellController@sellDelete']);
    Route::get('check-instalment-percent/{instalment_id}/{total}',['as'=>'staff-check-instalment-percent','uses'=>'Staff\SellController@checkInstalmentPercent']);

    Route::get('customer-new',['as'=>'staff-customer-new','uses'=>'Staff\CustomerController@createCustomer']);
    Route::post('customer-new',['as'=>'staff-customer-new','uses'=>'Staff\CustomerController@storeCustomer']);
    Route::get('customer-history',['as'=>'staff-customer-history','uses'=>'Staff\CustomerController@historyCustomer']);
    Route::get('customer-edit/{id}',['as'=>'staff-customer-edit','uses'=>'Staff\CustomerController@editCustomer']);
    Route::put('customer-edit/{id}',['as'=>'staff-customer-update','uses'=>'Staff\CustomerController@updateCustomer']);
    Route::get('customer-view/{id}',['as'=>'staff-customer-view','uses'=>'Staff\CustomerController@viewCustomer']);

    Route::get('new-expense',['as'=>'new-expense','uses'=>'StaffController@newExpense']);
    Route::post('new-expense',['as'=>'new-expense','uses'=>'StaffController@submitExpense']);
    Route::get('expense-history',['as'=>'expense-history','uses'=>'StaffController@historyExpense']);

    Route::get('store-new',['as'=>'staff-store-new','uses'=>'Staff\StoreController@newStore']);
    Route::post('store-new',['as'=>'staff-store-new','uses'=>'Staff\StoreController@submitStore']);
    Route::get('store-history',['as'=>'staff-store-history','uses'=>'Staff\StoreController@storeHistory']);
    Route::get('store-view/{id}',['as'=>'staff-store-view','uses'=>'Staff\StoreController@viewHistory']);
    /*Route::get('store-edit/{id}',['as'=>'staff-store-edit','uses'=>'StoreController@editHistory']);
    Route::put('store-edit/{id}',['as'=>'store-update','uses'=>'StoreController@updateHistory']);*/
    Route::get('current-store',['as'=>'staff-current-store','uses'=>'Staff\StoreController@currentStore']);
    Route::get('search-current-store',['as'=>'staff-search-current-store','uses'=>'Staff\StoreController@searchCurrentStore']);
    Route::get('store-search-view/{id}',['as'=>'staff-store-search-view','uses'=>'Staff\StoreController@searchViewResult']);

    Route::get('product-new',['as'=>'staff-product-new','uses'=>'Staff\ProductController@newProduct']);
    Route::post('product-new',['as'=>'staff-product-new','uses'=>'Staff\ProductController@storeProduct']);
    Route::get('product-history',['as'=>'staff-product-history','uses'=>'Staff\ProductController@storeHistory']);
    Route::get('product-edit/{id}',['as'=>'staff-product-edit','uses'=>'Staff\ProductController@editProduct']);
    Route::put('product-edit/{id}',['as'=>'staff-product-update','uses'=>'Staff\ProductController@updateProduct']);
    Route::get('product-view/{id}',['as'=>'staff-product-view','uses'=>'Staff\ProductController@viewProduct']);

    Route::get('transaction-log',['as'=>'staff-transaction-log','uses'=>'StaffController@getTransactionLog']);
});



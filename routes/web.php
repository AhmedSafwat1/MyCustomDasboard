<?php

use Illuminate\Support\Facades\Route;

//Genrate bcrypt 123456

Route::get('/hash', function () {
    return bcrypt(123456);
});

//test some code
Route::get('/test-code', function () {
    return settings('about_us');
});

// Site Index
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/login', 'AuthController@loginForm')->name('loginForm');

    Route::post('/login', 'AuthController@login')->name('login');

    /**** ajax routes ****/
    #change-checked
    Route::post('change-checked', 'UsersController@change_checked')->name('change-checked');

    // Auth user only
    Route::group(['middleware' => ['admin', 'check_role']], function () {

        Route::get('/', [
            'uses' => 'AuthController@dashboard',
            'as' => 'dashboard',
            'icon' => '<i class="fa fa-dashboard"></i>',
            'title' => 'الرئيسيه'
        ]);

        // ============= Permission ==============
        Route::get('permissions-list', [
            'uses' => 'PermissionController@index',
            'as' => 'permissionslist',
            'title' => 'قائمة الصلاحيات',
            'icon' => '<i class="fa fa-eye"></i>',
            'child' => [
                'addpermissionspage',
                'addpermission',
                'editpermissionpage',
                'updatepermission',
                'deletepermission',

            ]
        ]);

        Route::get('permissions', [
            'uses' => 'PermissionController@create',
            'as' => 'addpermissionspage',
            'title' => 'اضافة صلاحيه',
        ]);

        Route::post('add-permission', [
            'uses' => 'PermissionController@store',
            'as' => 'addpermission',
            'title' => 'تمكين اضافة صلاحيه'
        ]);

        #edit permissions page
        Route::get('edit-permissions/{id}', [
            'uses' => 'PermissionController@edit',
            'as' => 'editpermissionpage',
            'title' => 'تعديل صلاحيه'
        ]);

        #update permission
        Route::post('update-permission', [
            'uses' => 'PermissionController@update',
            'as' => 'updatepermission',
            'title' => 'تمكين تعديل صلاحيه'
        ]);

        #delete permission
        Route::post('delete-permission', [
            'uses' => 'PermissionController@destroy',
            'as' => 'deletepermission',
            'title' => 'حذف صلاحيه'
        ]);

        #admins
        Route::get('/admins', [
            'uses' => 'AdminController@index',
            'as' => 'admins',
            'title' => 'المشرفين',
            'icon' => '<i class="fa fa-user-circle"></i>',
            'child' => [
                'addadmin',
                'updateadmin',
                'deleteadmin',
                'deleteadmins',
            ]
        ]);

        Route::post('/add-admin', [
            'uses' => 'AdminController@store',
            'as' => 'addadmin',
            'title' => 'اضافة مشرف'
        ]);

        // Update User
        Route::post('/update-admin', [
            'uses' => 'AdminController@update',
            'as' => 'updateadmin',
            'title' => 'تعديل مشرف'
        ]);

        // Delete User
        Route::post('/delete-admin', [
            'uses' => 'AdminController@delete',
            'as' => 'deleteadmin',
            'title' => 'حذف مشرف'
        ]);

        // Delete Users
        Route::post('/delete-admins', [
            'uses' => 'AdminController@deleteAllAdmins',
            'as' => 'deleteadmins',
            'title' => 'حذف اكتر من مشرف'
        ]);

        #users
        Route::get('/users', [
            'uses' => 'UsersController@index',
            'as' => 'users',
            'title' => 'الاعضاء ',
            'icon' => '<i class="fa fa-users"></i>',
            'child' => [
                'adduser',
                'updateuser',
                'deleteuser',
                'deleteusers',
                'send-fcm',
            ]
        ]);

        // Add User
        Route::post('/add-user', [
            'uses' => 'UsersController@store',
            'as' => 'adduser',
            'title' => 'اضافة عضو'
        ]);

        // Update User
        Route::post('/update-user', [
            'uses' => 'UsersController@update',
            'as' => 'updateuser',
            'title' => 'تعديل عضو'
        ]);

        // Delete User
        Route::post('/delete-user', [
            'uses' => 'UsersController@delete',
            'as' => 'deleteuser',
            'title' => 'حذف عضو'
        ]);

        // Delete Users
        Route::post('/delete-users', [
            'uses' => 'UsersController@deleteAll',
            'as' => 'deleteusers',
            'title' => 'حذف اكتر من عضو'
        ]);

        // Send Notify
        Route::post('/send-notify', [
            'uses' => 'UsersController@sendNotify',
            'as' => 'send-fcm',
            'title' => 'ارسال اشعارات'
        ]);

        // ========== Settings

        Route::get('settings', [
            'uses' => 'SettingController@index',
            'as' => 'settings',
            'title' => 'الاعدادات',
            'icon' => '<i class="fa fa-cogs"></i>',
            'child' => [
                'sitesetting',
                'about_us',
                'add-social',
                'update-social',
                'delete-social',
                'SEO',
            ]
        ]);

        // General Settings
        Route::post('/update-settings', [
            'uses' => 'SettingController@updateSiteInfo',
            'as' => 'sitesetting',
            'title' => 'تعديل بيانات الموقع'
        ]);

        Route::post('/about-us', [
            'uses' => 'SettingController@about',
            'as' => 'about_us',
            'title' => 'تعديل صفحة من نحن'
        ]);

        // Social Sites
        Route::post('/add-social', [
            'uses' => 'SettingController@storeSocial',
            'as' => 'add-social',
            'title' => 'اضافة مواقع التواصل'
        ]);

        Route::post('/update-social', [
            'uses' => 'SettingController@updateSocial',
            'as' => 'update-social',
            'title' => 'تعديل مواقع التواصل'
        ]);

        Route::get('/delete-social/{id}', [
            'uses' => 'SettingController@deleteSocial',
            'as' => 'delete-social',
            'title' => 'حذف مواقع التواصل'
        ]);

        Route::post('/seo', [
            'uses' => 'SettingController@SEO',
            'as' => 'SEO',
            'title' => 'تعديل بيانات ال SEO'
        ]);

        #country
        Route::get('/countries', [
            'uses' => 'countryController@index',
            'as' => 'countries',
            'title' => 'الدول',
            'icon' => '<i class="fa fa-globe"></i>',
            'child' => [
                'addcountry',
                'updatecountry',
                'deletecountry',
                'deletecountries',
            ]
        ]);

        Route::post('/add-country', [
            'uses' => 'countryController@store',
            'as' => 'addcountry',
            'title' => 'اضافة دولة'
        ]);

        Route::post('/update-country', [
            'uses' => 'countryController@update',
            'as' => 'updatecountry',
            'title' => 'تعديل دولة'
        ]);

        Route::post('/delete-country', [
            'uses' => 'countryController@delete',
            'as' => 'deletecountry',
            'title' => 'حذف دولة'
        ]);

        Route::post('/delete-countries', [
            'uses' => 'countryController@deleteAll',
            'as' => 'deletecountries',
            'title' => 'حذف اكتر من دولة'
        ]);


        #city
        Route::get('/cities', [
            'uses' => 'cityController@index',
            'as' => 'cities',
            'title' => 'المدن',
            'icon' => '<i class="fa fa-globe"></i>',
            'child' => [
                'addcity',
                'updatecity',
                'deletecity',
                'deletecities',
            ]
        ]);

        Route::post('/add-city', [
            'uses' => 'cityController@store',
            'as' => 'addcity',
            'title' => 'اضافة مدينة'
        ]);

        Route::post('/update-city', [
            'uses' => 'cityController@update',
            'as' => 'updatecity',
            'title' => 'تعديل مدينة'
        ]);

        Route::post('/delete-city', [
            'uses' => 'cityController@delete',
            'as' => 'deletecity',
            'title' => 'حذف مدينة'
        ]);

        Route::post('/delete-cities', [
            'uses' => 'cityController@deleteAll',
            'as' => 'deletecities',
            'title' => 'حذف اكتر من مدينة'
        ]);

        #neighborhood
        Route::get('/neighborhoods', [
            'uses' => 'neighborhoodController@index',
            'as' => 'neighborhoods',
            'title' => 'الحي',
            'icon' => '<i class="fa fa-globe"></i>',
            'child' => [
                'addneighborhood',
                'updateneighborhood',
                'deleteneighborhood',
                'deleteneighborhoods',
            ]
        ]);

        Route::post('/add-neighborhood', [
            'uses' => 'neighborhoodController@store',
            'as' => 'addneighborhood',
            'title' => 'اضافة الحي'
        ]);

        Route::post('/update-neighborhood', [
            'uses' => 'neighborhoodController@update',
            'as' => 'updateneighborhood',
            'title' => 'تعديل الحي'
        ]);

        Route::post('/delete-neighborhood', [
            'uses' => 'neighborhoodController@delete',
            'as' => 'deleteneighborhood',
            'title' => 'حذف الحي'
        ]);

        Route::post('/delete-neighborhoods', [
            'uses' => 'neighborhoodController@deleteAll',
            'as' => 'deleteneighborhoods',
            'title' => 'حذف اكتر من الحي'
        ]);

        #contact
        Route::get('/contacts', [
            'uses' => 'contactController@index',
            'as' => 'contacts',
            'title' => 'أتصل بنا',
            'icon' => '<i class="fa fa-envelope-open"></i>',
            'child' => [
                'showcontact',
                'sendcontact',
                'deletecontact',
                'deletecontacts',
            ]
        ]);

        Route::get('/show-contact/{id}', [
            'uses' => 'contactController@show',
            'as' => 'showcontact',
            'title' => 'عرض رسالة'
        ]);

        Route::post('/send-contact', [
            'uses' => 'contactController@send',
            'as' => 'sendcontact',
            'title' => 'رد على رسالة'
        ]);

        Route::post('/delete-contact', [
            'uses' => 'contactController@delete',
            'as' => 'deletecontact',
            'title' => 'حذف رسالة'
        ]);

        Route::post('/delete-contacts', [
            'uses' => 'contactController@deleteAll',
            'as' => 'deletecontacts',
            'title' => 'حذف اكتر من رسالة'
        ]);

        // ======== Reports
        Route::get('all-reports', [
            'uses' => 'ReportController@index',
            'as' => 'reports',
            'title' => 'التقارير',
            'icon' => '<i class="fa fa-flag"></i>',
            'child' => [
                'deletereports',
            ]
        ]);

        Route::get('/delete-reports', [
            'uses' => 'ReportController@delete',
            'as' => 'deletereports',
            'title' => 'حذف التقارير'
        ]);
    });
    Route::any('/logout', 'AuthController@logout')->name('logout');
});

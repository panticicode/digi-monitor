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

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'Dashboard', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('invite', 'InviteController');
    Route::resource('sms-chanel', 'SmschanelController');

    Route::post('/hr/{hr}/change-password', 'HrController@changePW')->name('hr.changePW');
    Route::resource('hr', 'HrController');

    Route::get('/show-template', 'SendController@showTemplate')->name('send.showTemplate');
    Route::get('/show_all', 'SendController@show_all')->name('send.show_all');
	
    Route::get('/campaigns/getTemplate', 'CampaignController@getTemplate')->name('campaigns.getTemplate');
    Route::post('/campaigns/send', 'CampaignController@send')->name('campaigns.send');
    Route::post('/members/send', 'CampaignController@send_to_all')->name('members.send');
    Route::post('/hrController/send', 'HrController@send')->name('dashboard.hr.send');
    Route::resource('campaigns', 'CampaignController');


    Route::resource('suppliers', 'SuppliersController');
    Route::resource('reports', 'ReportsController');

    Route::get('/templates/{template}/send-email', 'TemplatesController@sendEmail')->name('templates.sendEmail');
    Route::get('/templates/{template}/send-sms', 'TemplatesController@sendSms')->name('templates.sendSms');
    Route::resource('templates', 'TemplatesController');

    Route::resource('members', 'MembersController');

    Route::post('/admin/{admin}/changePW', 'AdminController@changePW')->name('admin.changePW');
    Route::resource('admin', 'AdminController');

    Route::get('/groups/getUser', 'GroupsController@getUser')->name('groups.getUser');
    Route::resource('groups', 'GroupsController');

    Route::get('/recharge', 'RechargeController@showRecharge')->name('recharge.showRecharge');
    Route::post('/recharge', 'RechargeController@changeRecharge')->name('recharge.changeRecharge');
});

// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('export_xlsx', 'MyController@export_xlsx')->name('export_xlsx');
Route::get('export_xls', 'MyController@export_xls')->name('export_xls');
Route::get('export_csv', 'MyController@export_csv')->name('export_csv');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');

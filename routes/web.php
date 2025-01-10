<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\testController;
use App\Http\Controllers\appController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\agencyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\agenciesController;
use App\Http\Controllers\Admin\DashboardController;
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

    Route::get('/',[appController::Class,'index'])->name('home');
    Route::get('store', [storeController::Class,'store'])->name('store');
    Route::any('store/search', [storeController::Class,'search'])->name('store.search');
    Route::get('listing/{id}', [storeController::Class,'post'])->name('post');
    Route::get('car-discovery',[appController::Class,'discover'])->name('discover');
    Route::post('car-discovery',[appController::Class,'storeDiscover'])->name('discover.store');
    Route::get('car-comparaison',[storeController::Class,'compare'])->name('compare');
    Route::post('add-to-comparaison',[storeController::Class,'addCompare'])->name('addCompare');
    Route::get('agencies', [agencyController::Class,'agencies'])->name('agencies');
    Route::get('agency/{username}', [agencyController::Class,'agency'])->name('agency');
    Route::get('contactus', [appController::Class,'contact'])->name('contact');
    Route::post('contactus', [appController::Class,'store_contact'])->name('store_contact');


Route::middleware('auth')->group(function(){
    Route::get('messenger/{type?}/{username?}', [appController::Class,'chat'])->name('chat');
    Route::post('messenger', [appController::Class,'chatSend'])->name('chat.send');
    Route::post('messenger', [appController::Class,'chatSend'])->name('chat.send');
    Route::get('user/agency/{id}', [agencyController::Class,'myagency'])->name('myagency');
    Route::get('agency/addcar/{agency}', [agencyController::Class,'addcar'])->name('agency.addcar');
    Route::post('agency/addcar/{agency}', [agencyController::Class,'storeCar'])->name('agency.storecar');
    Route::get('user/agency/{agency}/setting', [agencyController::Class,'setting'])->name('agency.setting');
    Route::post('user/agency/{agency}/setting', [agencyController::Class,'storeSetting'])->name('agency.storeSetting');
    Route::post('user/agency/{agency}/destroy', [agencyController::Class,'destroy'])->name('agency.destroy');

    Route::get('request-agency',[agencyController::class,'create_agency'])->name('agency.create');
    Route::post('request-agency',[agencyController::class,'store_agency'])->name('agency.store');
    Route::get('thankyou',[agencyController::class,'thankyou'])->name('agency.thankyou');
    Route::get('wait',[agencyController::class,'wait'])->name('agency.wait');

    Route::get('agency/adv/{agency}',[agencyController::class,'create_ad'])->name('ad.create');
    Route::post('agency/adv/{agency}',[agencyController::class,'store_ad'])->name('ad.store');

    Route::get('mycars/{username}', [appController::Class,'mycars'])->name('mycars');
    Route::get('user/addcar', [appController::Class,'addcar'])->name('addcar');
    Route::post('user/addcar', [appController::Class,'storeCar'])->name('storecar');
    Route::get('user/editcar/{product}', [appController::Class,'editcar'])->name('editcar');
    Route::post('user/editcar/{product}', [appController::Class,'updatecar'])->name('updatecar');
    Route::get('user/editcar/destroy/{product}', [appController::Class,'destroycar'])->name('destroycar');
    Route::post('reports',[appController::class,'store_reports'])->name('reports.store');
    Route::post('upload',[appController::class,'upload'])->name('upload');

});


Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function(){
    Route::get('dashboard', [DashboardController::Class,'index'])->name('dashboard');
    Route::resource('Manage/users',UserController::class);
    Route::resource('Manage/agencies',agenciesController::class);
    Route::post('Manage/agencies/accept/{agency}', [agenciesController::Class,'accept'])->name('agencies.accept');
    Route::post('Manage/agencies/disable/{agency}', [agenciesController::Class,'disable'])->name('agencies.disable');
    Route::get('posts', [DashboardController::Class,'posts'])->name('posts');
    //Route::get('settings',[SettingsController::class,'index']);
    Route::get('admin/reports', [DashboardController::Class,'reports'])->name('reports');
    Route::post('reports/validate/{report}', [DashboardController::Class,'accept_report'])->name('accept_report');
    Route::post('reports/delete/{report}', [DashboardController::Class,'delete_report'])->name('delete_report');
    Route::get('admin/inbox', [DashboardController::Class,'inbox'])->name('inbox');
    Route::post('inbox/delete/{msg}', [DashboardController::Class,'delete_msg'])->name('delete_msg');
    Route::get('advertisement', [DashboardController::Class,'ads'])->name('ads');
    Route::post('advertisement/destroy/{ad}', [DashboardController::Class,'destroy_ad'])->name('destroy_ad');
    Route::post('advertisement/accept/{ad}', [DashboardController::Class,'accept_ad'])->name('accept_ad');
    Route::post('advertisement/disable/{ad}', [DashboardController::Class,'disable_ad'])->name('disable_ad');
});

<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    
});
//users
Route::get('/users', $controller_path. '\pages\Users@index')->name('pages-users');
Route::get('/users/create',$controller_path. '\pages\Users@create')->name('pages-users-create');
Route::post('/users/store',$controller_path. '\pages\Users@store')->name('pages-users-store');
Route::get('/users/show/{user_id}', $controller_path. '\pages\Users@show')->name('pages-users-show');
Route::post('/users/update', $controller_path. '\pages\Users@update')->name('pages-users-update');
Route::get('/users/destroy/{user_id}', $controller_path. '\pages\Users@destroy')->name('pages-users-destroy');

//switch de roles 
Route::get('/roles/switch/{user_id}', $controller_path. '\pages\Users@switch')->name('pages-users-switch-role');

//supliers
Route::get('/supliers', $controller_path. '\pages\Supliers@index')->name('pages-supliers');
Route::get('/supliers/create',$controller_path. '\pages\Supliers@create')->name('pages-supliers-create');
Route::post('/supliers/store',$controller_path. '\pages\Supliers@store')->name('pages-supliers-store');
Route::get('/supliers/show/{user_id}', $controller_path. '\pages\Supliers@show')->name('pages-supliers-show');
Route::post('/supliers/update', $controller_path. '\pages\Supliers@update')->name('pages-supliers-update');
Route::get('/supliers/destroy/{user_id}', $controller_path. '\pages\Supliers@destroy')->name('pages-supliers-destroy');
Route::get('/supliers/switch/{device_id}', $controller_path. '\pages\Supliers@switch')->name('pages-supliers-switch');
Route::get('/supliers/list', $controller_path. '\pages\Supliers@list')->name('pages-supliers-list');

//types
Route::get('/types', $controller_path. '\pages\Types@index')->name('pages-types');
Route::get('/types/create',$controller_path. '\pages\Types@create')->name('pages-types-create');
Route::post('/types/store',$controller_path. '\pages\Types@store')->name('pages-types-store');
Route::get('/types/show/{type_id}', $controller_path. '\pages\Types@show')->name('pages-types-show');
Route::post('/types/update', $controller_path. '\pages\Types@update')->name('pages-types-update');
Route::get('/types/destroy/{type_id}', $controller_path. '\pages\Types@destroy')->name('pages-types-destroy');
Route::get('/types/switch/{type_id}', $controller_path. '\pages\Types@switch')->name('pages-types-switch');
Route::get('/types/list', $controller_path. '\pages\Types@list')->name('pages-types-list');

//materials
Route::get('/materials', $controller_path. '\pages\Materials@index')->name('pages-materials');
Route::get('/materials/create',$controller_path. '\pages\Materials@create')->name('pages-materials-create');
Route::post('/materials/store',$controller_path. '\pages\Materials@store')->name('pages-materials-store');
Route::get('/materials/show/{device_id}', $controller_path. '\pages\Materials@show')->name('pages-materials-show');
Route::post('/materials/update', $controller_path. '\pages\Materials@update')->name('pages-materials-update');
Route::get('/materials/destroy/{device_id}', $controller_path. '\pages\Materials@destroy')->name('pages-materials-destroy');
Route::get('/materials/switch/{device_id}', $controller_path. '\pages\Materials@switch')->name('pages-materials-switch');
Route::get('/materials/list', $controller_path. '\pages\Materials@list')->name('pages-materials-list');
Route::get('/materials/showw/{device_id}', $controller_path. '\pages\Materials@showw')->name('pages-materials-showw');
Route::post('/materials/salida', $controller_path. '\pages\Materials@salidaM')->name('pages-materials-salida');

//backups
Route::get('/backups', $controller_path. '\pages\Backups@index')->name('pages-backups');
Route::get('/backups/create', $controller_path. '\pages\Backups@create')->name('pages-backups-create');
Route::get('/backups/delete/{id}', $controller_path. '\pages\Backups@delete')->name('pages-backups-destroy');
Route::get('/backups/download/{fileName}', $controller_path . '\pages\Backups@download')->name('pages-backups-download');

//reportes types
Route::get('/reports-T', $controller_path. '\pages\ReportsT@index')->name('pages-reports-T');
Route::get('/reports-T/create', $controller_path. '\pages\ReportsT@create')->name('pages-reports-T-create');
Route::get('/reports-T/delete/{id}', $controller_path. '\pages\ReportsT@delete')->name('pages-reports-T-destroy');
Route::get('/reports-T/download/{fileName}', $controller_path . '\pages\ReportsT@download')->name('pages-reports-T-download');

//reportes suppliers
Route::get('/reports-S', $controller_path. '\pages\ReportsS@index')->name('pages-reports-S');
Route::get('/reports-S/create', $controller_path. '\pages\ReportsS@create')->name('pages-reports-S-create');
Route::get('/reports-S/delete/{id}', $controller_path. '\pages\ReportsS@delete')->name('pages-reports-S-destroy');
Route::get('/reports-S/download/{fileName}', $controller_path . '\pages\ReportsS@download')->name('pages-reports-S-download');

//reportes suppliers
Route::get('/reports-M', $controller_path. '\pages\ReportsM@index')->name('pages-reports-M');
Route::get('/reports-M/create', $controller_path. '\pages\ReportsM@create')->name('pages-reports-M-create');
Route::get('/reports-M/delete/{id}', $controller_path. '\pages\ReportsM@delete')->name('pages-reports-M-destroy');
Route::get('/reports-M/download/{fileName}', $controller_path . '\pages\ReportsM@download')->name('pages-reports-M-download');
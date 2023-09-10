<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\ReservatioController;
use App\Http\Controllers\UsersController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Change Port
// php artisan serve --port=8001



Route::get('/', function () {
    return view('admin.Login');
});


// Route::get('/AdminUser', function () {
//     return view('admin.Users');
// });

Route::get('/AdminAccount', function () {
    return view('admin.Account');
});

Route::get('/AdminLogin', function () {
    return view('admin.Login');
});

Route::get('/AdminIndex', function () {
    return view('admin.Index');
});



Route::get('AdminCategories', [CategoryController::class, 'index'] );
Route::post('addCat', [CategoryController::class, 'create'] );
Route::post('updateCat', [CategoryController::class, 'edit'] );
Route::get('deleteCat/id/{id}', [CategoryController::class, 'destroy'] );




Route::get('AdminTrips', [TripsController::class, 'index'] );
Route::post('addtrp', [TripsController::class, 'create'] );
Route::post('updatetrp', [TripsController::class, 'edit'] );
Route::get('deletetrp/id/{id}', [TripsController::class, 'destroy'] );






Route::get('AdminOrders', [ReservatioController::class, 'index'] );
Route::post('addres', [ReservatioController::class, 'create'] );
Route::post('editres', [ReservatioController::class, 'update'] );
Route::get('updateres/id/{id}/status/{status}', [ReservatioController::class, 'edit'] );
Route::get('deleteRes/id/{id}', [ReservatioController::class, 'destroy'] );



Route::get('/AdminAdd_users', function () {
    return view('admin.Add_users');
});

Route::get('AdminUser', [UsersController::class, 'index'] );
Route::post('adduse', [UsersController::class, 'create'] );
Route::get('deleteusr/id/{id}', [UsersController::class, 'destroy'] );
Route::get('updateusr/id/{id}/status/{status}', [UsersController::class, 'edit'] );




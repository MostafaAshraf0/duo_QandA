<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CommentController;

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
// All Posts
Route::get('/',[PostController::class,'index']);
// show create form
Route::get('/Posts/create',[PostController::class,'create'])->middleware('auth');
// Store Post data
Route::post('/Posts',[PostController::class,'store'])->middleware('auth');
// show edit form
Route::get('/Posts/{Post}/edit',[PostController::class, 'edit'])->middleware('auth');
//  update edited Post
Route::put('/Posts/{Post}',[PostController::class, 'update'])->middleware('auth');
// delete post
Route::delete('/Posts/{Post}',[PostController::class,'delete'])->middleware('auth');

// manage Posts
Route::get('/Posts/manage',[PostController::class,'manage'])->middleware('auth');
//single Post
Route::get('/Posts/{Post}',[PostController::class,'show']);

// show Register/creat Form
Route::get('/register',[UserController::class,'register'])->middleware('guest');

// Create New User
Route::post('/users',[UserController::class,'store']);

// logout
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

// Login
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

// log in User
Route::post('/users/authenticate',[UserController::class,'authenticate']);

// comment
Route::post('/comment/store',[CommentController::class,'store'])->name('comment.add')->middleware('auth');
// reply
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add')->middleware('auth');

// //like 
// Route::get('/like',[PostController::class,'like']);

// // doctor page
// Route::get('/doctors-index',[DoctorController::class,'index']);
// // show Register/creat Form
// Route::get('/Doctor/doctor-register',[DoctorController::class,'register'])->middleware('guest');
// // Create New doctor
// Route::post('/Doctor',[DoctorController::class,'store']);
// // logout
// Route::post('/Doctor/logout-doctor',[UserController::class, 'logout'])->middleware('auth');
// // Login
// Route::get('/Doctor/login-doctor',[DoctorController::class,'login'])->name('login-doctor')->middleware('guest');
// // log in User
// Route::post('/Doctor/authenticate',[UserController::class,'authenticate']);


// // test doctor and user route
// Route::middleware(['auth','user-access:user'])->group(function()
// {
//     Route::get('/',[UserController::class,'index']);
// });
// Route::middleware(['auth', 'user-access:doctor'])->group(function () {
  
//     Route::get('/doctors-index', [DoctorController::class, 'index'])->name('admin.home');
// });

// Route::get('/Doctor/login-doctor',[logController::class,'login'])->name('login');

Route::get('/admin/manage-users',[adminController::class,'index']);

// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/admin/manage-users', [adminController::class, 'index']);
// });

// Route::middleware(['auth', 'user-access:doctor'])->group(function () {

//     Route::get('/doctors-index', [DoctorController::class, 'index']);
// });

Route::middleware('auth')->group(function () {
    Route::post('like', [LikeController::class,'like'])->name('like');
    Route::delete('like', [LikeController::class,'unlike'])->name('unlike');
});







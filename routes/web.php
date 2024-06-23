<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function(){

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/add', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/admin/users', [AdminController::class, 'index'])->name("admin.users.index");
/* يجب تعديل delete */
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name("admin.users.delete");

Route::post('logout',[AuthController::class,'logout'])->name('logout');

/*==========================  */
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/add', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/add', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name("admin.categories.delete");

/* ========================== */
Route::get('/admin/tags', [TagController::class, 'index'])->name('admin.tags.index');
Route::get('/admin/tags/add', [TagController::class, 'create'])->name('admin.tags.create');
Route::post('/admin/tags/add', [TagController::class, 'store'])->name('admin.tags.store');
Route::get('/admin/tags/edit/{tag}', [TagController::class, 'edit'])->name('admin.tags.edit');
Route::put('/admin/tags/update/{tag}', [TagController::class, 'update'])->name('admin.tags.update');
Route::delete('/admin/tags/{tag}', [TagController::class, 'destroy'])->name("admin.tags.delete");


/* ======================== */
Route::post('/comments/add/{post}', [CommentController::class, 'store'])->name('comments.store');
 Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name("comments.delete");


 });

/* ======================== */

Route::middleware(['guest'])->group(function(){
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

<?php

use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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

Route::get('/', [PostController::class, 'home']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Diannita",
        "email" => "dianita@gmail.com",
        "image" => "foto1.jpeg"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::post('/dashboard/categories/store', [AdminCategoryController::class, 'storeCategories'])->middleware('admin');
Route::post('/dashboard/categories/{slug}', [AdminCategoryController::class, 'deleteCategories'])->middleware('admin');
Route::get('/dashboard/categories/edit/{slug}', [AdminCategoryController::class, 'editCategories'])->middleware('admin');
Route::post('/dashboard/categories/update/{slug}', [AdminCategoryController::class, 'updateCategories'])->middleware('admin');

Route::get('/dashboard/carousel', [AdminCarouselController::class, 'carousel'])->middleware('admin');
Route::get('/dashboard/carousel/create', [AdminCarouselController::class, 'create']);
Route::post('/dashboard/carousel/store', [AdminCarouselController::class, 'store']);
Route::post('/dashboard/carousel/', [AdminCarouselController::class, 'deletecarousel']);
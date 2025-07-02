<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorContentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ExternalLinkController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::post('/save-editor', [EditorContentController::class, 'saveContent']);
Route::get('/get-editor', [EditorContentController::class, 'getContent']);

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
Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('/pinjam-sarpras', function () {
    return view('pinjam-sarpras');
})->name('pinjam-sarpras');
Route::get('/sarpras', function () {
    return view('sarpras');
})->name('sarpras');
// Route::get('/post', [EditorContentController::class, 'getContent']);
Route::get('/post/{jenis}/', [PostController::class, 'post'])->name('post.list');
Route::get('/post/{jenis}/{id}/{slug}', [PostController::class, 'post_detail'])->name('post.detail');
// Route::prefix('home/')->middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth', 'verified'])->prefix('home/')->group(function () {
    Route::get('/{tahun?}',[PostController::class, 'totalPostings'])->name('dashboard');
    Route::post('quil-upload-image', [PostController::class, 'uploadImage'])->name('quil.upload.image');
    Route::prefix('konten/{jenis}')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('konten.index');
        Route::get('/create', [PostController::class, 'create'])->name('konten.create');
        Route::post('/', [PostController::class, 'store'])->name('konten.store');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('konten.edit');
        Route::put('/{id}', [PostController::class, 'update'])->name('konten.update');
        Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('konten.destroy');    
    });
    // Route::resource('kategori/{jenis}', KategoriController::class);
    Route::prefix('kategori/{jenis}')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    //     Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    //     Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    //     Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    //     Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    //     Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    //     Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');    
    });
    Route::prefix('sliders/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::post('/', [SliderController::class, 'store'])->name('sliders.store');
        Route::post('/reorder', [SliderController::class, 'reorder'])->name('sliders.reorder');
        Route::delete('/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/{id}', [SliderController::class, 'update'])->name('sliders.update');
    });
    Route::prefix('link/link-items')->group(function () {
        Route::get('/', [ExternalLinkController::class, 'index'])->name('eksternallink.index');
        Route::get('/create', [ExternalLinkController::class, 'create'])->name('eksternallink.create');
        Route::post('/', [ExternalLinkController::class, 'store'])->name('eksternallink.store');
        Route::get('/{id}/edit', [ExternalLinkController::class, 'edit'])->name('eksternallink.edit');
        Route::patch('/{id}', [ExternalLinkController::class, 'update'])->name('eksternallink.update');
        Route::delete('/{id}', [ExternalLinkController::class, 'destroy'])->name('eksternallink.destroy');
    });

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    
    Route::get('/management/users', [RegisteredUserController::class, 'create']);
    Route::post('/management/create/users', [RegisteredUserController::class, 'store'])->name('register');
});

Route::get('/dashboard-json', [PostController::class, 'getDashboardData'])->name('dashboard.json');
Route::get('/statistik-tahunan', [PostController::class, 'getStatistikTahunan'])->name('statistik.tahunan');
Route::get('/statistik-bulanan/{tahun}', [PostController::class, 'getStatistikBulanan'])->name('statistik.bulanan');

// <?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('home/profile')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
        
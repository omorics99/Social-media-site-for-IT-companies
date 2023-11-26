<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Models\Companies;
use App\Models\Products;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    $products = Products::all();
    $companies = Companies::all();
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'products' => $products,
        'companies' => $companies,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/calendar/events', function () {
    return Inertia::render('calendar');
});
Route::post('/follow-event', [FullCalendarController::class, 'followEvent']);
Route::post('/unfollow-event', [FullCalendarController::class, 'unfollowEvent'])->name('unfollow.event');
Route::middleware('auth')->get('/calendar/followedEvents',  [FullCalendarController::class, 'getFollowerCount'])->name('followedEvents');
Route::get('/calendar/events', [FullCalendarController::class, 'index']);
Route::post('/fullcalendar-ajax', [FullCalendarController::class, 'ajax']);
Route::get('/calendar/getAuthor/{eventId}', [FullCalendarController::class, 'getAuthor']);
Route::post('/company/create/event ',function(){
    return Inertia::render('calendar');
})->middleware(['auth', 'verified'])->name('/calendar');
Route::get('/user-followed-events', [FullCalendarController::class, 'getUserFollowedEvents']);
Route::post('/company/create/post ',function(){
    return Inertia::render('xxxxx');
})->middleware(['auth', 'verified'])->name('xxxx');
Route::get('/user-followed-events', [FullCalendarController::class, 'getUserFollowedEvents']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/chats', [App\Http\Controllers\ChatsController::class, 'index']);
Route::post('/broadcast', [App\Http\Controllers\ChatsController::class, 'broadcast']);
Route::post('/receive', [App\Http\Controllers\ChatsController::class, 'receive']);

Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);

Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/business', function () {
    return Inertia::render('Business_landing');
});


Route::get('/companies', [\App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [\App\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [\App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/{company}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{company}/edit', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{company}', [\App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}', [\App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';

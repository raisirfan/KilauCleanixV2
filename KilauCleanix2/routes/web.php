<?php

use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\KilauCleanix2;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\User\UserProfileComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',KilauCleanix2::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');

//For Customer
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});


//For Admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','authadmin'
])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
});
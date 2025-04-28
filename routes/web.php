<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ModerationController;
use App\Http\Controllers\ContentWriterController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('login');
    }

    $user = Auth::user();
    if ($user->role_id == 1) {
        return redirect('/admin');
    } elseif ($user->role_id == 2) {
        return redirect('/customer');
    }
    elseif ($user->role_id == 3) {
        return redirect('/publisher');
    }
    elseif ($user->role_id == 4) {
        return redirect('/contentwriter');
    }
    elseif ($user->role_id == 5) {
        return redirect('/moderation');
    }
    return redirect('/login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home.home');
    Route::get('/user', [AdminController::class, 'user'])->name('user.user');
    Route::get('/user_create', [AdminController::class, 'user_create'])->name('user.user_create');
    Route::post('/add_user', [AdminController::class, 'add_user'])->name('user.add_user');
    Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->name('user.edit_user');
    Route::post('/update_user/{id}', [AdminController::class, 'update_user'])->name('user.update_user');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');




});

Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('home.home');

    Route::get('/order', [CustomerController::class, 'order'])->name('order.order');
    Route::get('/order_create', [CustomerController::class, 'order_create'])->name('order.order_create');
    Route::post('/add_order', [CustomerController::class, 'add_order'])->name('order.add_order');
    Route::get('/edit_order/{id}', [CustomerController::class, 'edit_order'])->name('order.edit_order');
    Route::post('/update_order/{id}', [CustomerController::class, 'update_order'])->name('order.update_order');
    Route::delete('/order_delete/{id}', [CustomerController::class, 'order_delete'])->name('order.order_delete');
});

Route::middleware(['auth'])->prefix('publisher')->name('publisher.')->group(function () {
    Route::get('/', [PublisherController::class, 'index'])->name('home');
});

Route::middleware(['auth'])->prefix('contentwriter')->name('contentwriter.')->group(function () {
    Route::get('/', [ContentWriterController::class, 'index'])->name('home');
});   

Route::middleware(['auth'])->prefix('moderation')->name('moderation.')->group(function () {
    Route::get('/', [ModerationController::class, 'index'])->name('home');
 });  

 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BookingOnline;
use App\Http\Livewire\Admin\Order\OrderIndex;
use App\Http\Livewire\Admin\Order\OrderProgress;

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

Route::get('/', BookingOnline::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/appointment', OrderIndex::class)->name('admin.order.index');
    Route::get('/antrian', OrderProgress::class)->name('admin.order.progress');
});

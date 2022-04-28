<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Products\Products;
use App\Http\Livewire\Steccate\Steccate;

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
    return view('layouts.welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('products', Products::class)->name('products');
    Route::get('steccate', Steccate::class)->name('steccate');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

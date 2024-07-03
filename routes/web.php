<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redis-test', function () {
    try {
        $redis = Redis::connection();
        $redis->set('test', 'It works!');
        $value = $redis->get('test');
        return 'Redis is working: ' . $value;
    } catch (\Exception $e) {
        return 'Redis is not working: ' . $e->getMessage();
    }
});

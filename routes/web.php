<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 投げ銭ユーザ用のルーティング
require __DIR__ . '/user.php';

// 管理者（MITS）用のルーティング
require __DIR__ . '/admin.php';

// スタッフ用のルーティング
require __DIR__ . '/staff.php';

// 事業者用のルーティング
require __DIR__ . '/bussiness-operator.php';

// 法人用のルーティング
require __DIR__ . '/corporation.php';

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class MyPageController extends Controller
{
    /**
     * マイページを表示する
     */
    public function index(): Response
    {
        return Inertia::render('User/Mypage/MypageContainer');
    }
}

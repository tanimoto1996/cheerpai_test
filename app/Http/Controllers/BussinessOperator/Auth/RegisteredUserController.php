<?php

namespace App\Http\Controllers\BussinessOperator\Auth;

use App\Http\Controllers\Controller;
use App\Models\BussinessOperator;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('BussinessOperator/Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . BussinessOperator::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $bussinessOperation = BussinessOperator::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($bussinessOperation));

        Auth::login($bussinessOperation);

        return redirect(RouteServiceProvider::BUSSINESS_OPERATOR_HOME);
    }
}

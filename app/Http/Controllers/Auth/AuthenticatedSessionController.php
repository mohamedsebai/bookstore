<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('front.account.account');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('front.home.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect()->route('front.home.index');

        if(Auth::guard('web')->check()) // this means that the admin was logged in.
        {
            Auth::guard('web')->logout();
            return redirect()->route('login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('front.home.index');
    }
}

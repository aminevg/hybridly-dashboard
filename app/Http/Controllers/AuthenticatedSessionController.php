<?php

namespace App\Http\Controllers;

use App\Data\LoginData;
use App\Providers\RouteServiceProvider;
use Hybridly\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    #[Get('login', name: 'login', middleware: 'guest')]
    public function create(): Factory
    {
        return hybridly('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    #[Post('login', name: 'login.store', middleware: 'guest')]
    public function store(LoginData $request): RedirectResponse
    {
        $request->authenticate();

        request()->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    #[Post('logout', name: 'logout', middleware: 'auth')]
    public function destroy(): RedirectResponse
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return to_route('home');
    }
}

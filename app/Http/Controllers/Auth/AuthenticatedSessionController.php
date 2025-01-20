<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('login.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user account is disabled
            if (!$user->statut_id == 1) {
                Auth::logout();
                return redirect()->route('login')->with(['account' => 'Votre compte est actuellement désactivé. Pour plus d\'informations ou pour réactiver votre compte, veuillez contacter notre support client.']);
            }

            // Regenerate session if the user is not disabled
            $request->session()->regenerate();

            $content = json_encode([
                'name' => 'Connexion au compte',
                'statut' => 'success',
                'message' => 'Content de vous revoir ' . Auth::user()->prenom . ' !',
            ]);

            session()->flash(
                'session',
                $content
            );

            return redirect()->intended(route('home', absolute: false));
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'L\'adresse mail ou le mot de passe semble incorrect(e). Veuillez vérifier et réessayer.'
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
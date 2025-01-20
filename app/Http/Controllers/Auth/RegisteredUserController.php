<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string',
                'email' => 'required|email|lowercase|unique:' . User::class,
                'sexe' => 'required',
                'password' => 'required|confirmed|min:8',
            ], [
                'prenom.required' => 'Le prénom est obligatoire',
                'nom.required' => 'Le nom est obligatoire',
                'email.required' => 'L\'adresse e-mail est obligatoire',
                'email.email' => 'L\'adresse e-mail n\'est pas valide',
                'email.unique' => 'Cette adresse e-mail est déjà utilisée',
                'sexe.required' => 'Le sexe est obligatoire',
                'password.required' => 'Le mot de passe est obligatoire',
                'password.confirmed' => 'Les mots de passe ne correspondent pas',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            ]);

            $user = User::create([
                'prenom' => $validatedData['prenom'],
                'nom' => $validatedData['nom'],
                'email' => $validatedData['email'],
                'sexe' => $validatedData['sexe'],
                'password' => Hash::make($request->password),
                'role_id' => '2',
                'statut_id' => 1,
            ]);


            Auth::login($user);

            $content = json_encode([
                'name' => 'Création du compte réussie',
                'statut' => 'success',
                'message' => 'Votre compte pro a été créé avec succès !',
            ]);

            session()->flash(
                'session',
                $content
            );

            return redirect()->route('home');

        } catch (ValidationException $e) {
            Log::error($e->getMessage());

            return back()->withErrors($e->errors());
        }
    }
}
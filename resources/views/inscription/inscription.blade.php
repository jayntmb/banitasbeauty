@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')

    <div class="block-contact">
        <div class="container">
            <div class="row g-lg-3 g-3 align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="content-form card">
                        <h1 class="mb-lg-4 text-lg">Inscrivez-vous !</h1>
                        <form method="POST" id="register-form" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row g-lg-3 g-3">
                                <div class="col-12">
                                    <div class="input-group flex flex-col">
                                        <span class="input-group-text">Vous êtes</span>
                                        <select class="form-select form-control rounded" name="sexe"
                                            id="inputGroupSelect03" aria-label="Example select with button addon">
                                            <option value="" selected disabled>Choisir...</option>
                                            <option value="Féminin">Madame</option>
                                            <option value="Masculin">Monsieur</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="validation-icon"></span>
                                <div class="col-12">
                                    <input type="text" name="prenom" class="form-control rounded lg"
                                        placeholder="Votre prénom">
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="validation-icon"></span>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="nom" class="form-control rounded lg"
                                        placeholder="Votre nom">
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="validation-icon"></span>
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control rounded lg"
                                        placeholder="Email">
                                    <span class="validation-icon"></span>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12">
                                    <div class="col-input position-relative">
                                        <input type="password" name="password"
                                            class="form-control rounded lg input-password" placeholder="Mot de passe"
                                            id="password">
                                        <div class="btn show-password" onclick="togglePassword()">
                                            <i class="bi bi-eye icon-show"></i>
                                            <i class="bi bi-eye-slash icon-hidden"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="validation-icon"></span>
                                </div>
                                <div class="col-12">
                                    <div class="col-input position-relative">
                                        <input type="password" name="password_confirmation"
                                            class="form-control rounded lg input-password"
                                            placeholder="Confirmer le mot de passe" id="confirm-password">
                                        <div class="btn show-password position-absolute top-50 end-0 translate-middle-y"
                                            onclick="toggleConfirmPassword()">
                                            <i class="bi bi-eye icon-show"></i>
                                            <i class="bi bi-eye-slash icon-hidden"></i>
                                        </div>
                                    </div>
                                    <span class="validation-icon"></span>
                                </div>
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12">
                                    <div class="col-lg-12 ms-auto">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            Se connecter
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="paragraph sm">
                                        Vous avez un compte !
                                        <a href="{{ url('login') }}" class="link">
                                            <span>Connectez-vous.</span>
                                            <span>Connectez-vous.</span>
                                            <span>Connectez-vous.</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <div class="col-lg-12 ms-auto">
                                        <a href="{{ url('auth/google') }}"
                                            class="btn btn-danger btn-lg w-100 d-flex justify-content-center align-items-center"
                                            style="background-color: white; transition: background-color 0.3s ease; color: black; border: 1px solid black;"
                                            onmouseover="this.style.backgroundColor='var(--primaryColor)'"
                                            onmouseout="this.style.backgroundColor='white'">
                                            Connectez-vous avec
                                            <img src="{{ asset('images/logos/google-logo.webp') }}" alt="Google Logo"
                                                style="height: 24px; margin-left: 8px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-black">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xxl-6">
                    <div class="text-center">
                        <h2 class="text-xxl text-white mb-lg-4 mb-3">
                            Soin de beauté <br> amour de soi
                        </h2>
                        <p class="paragraph text-white mx-auto mb-lg-4 mb-3">
                            Offrez-vous le luxe d'une peau radieuse avec nos cosmétiques. Chaque
                            application est une promesse de bien-être et de confiance. Ne laissez pas
                            passer cette chance, commandez maintenant et faites un pas vers l'amour de
                            vous-même !
                        </p>
                        <a href="produits.html" class="btn btn-white btn-default">
                            Commander
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <div class="container">
            <div class="col-lg-6">
                <h3 class="text-white">
                    Abonnez-vous a notre Newsletter
                </h3>
                <p class="paragraph text-white mb-lg-4">Pour tout savoir de l’actualité Banita’s Beauty et ses promotions ?
                </p>
                <form action="#">
                    <div class="content-form d-flex align-items-center">
                        <input type="text" class="form-control rounded" placeholder="Votre adresse e-mail">
                        <button class="btn btn-primary btn-default">
                            S'abonner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const showIcon = document.querySelector('.icon-show');
        const hideIcon = document.querySelector('.icon-hidden');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showIcon.style.display = 'none';
            hideIcon.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            showIcon.style.display = 'block';
            hideIcon.style.display = 'none';
        }
    }

    function toggleConfirmPassword() {
        const confirmPasswordInput = document.getElementById('confirm-password');
        const showIconConfirm = document.querySelector('.icon-show');
        const hideIconConfirm = document.querySelector('.icon-hidden');

        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            showIconConfirm.style.display = 'none';
            hideIconConfirm.style.display = 'block';
        } else {
            confirmPasswordInput.type = 'password';
            showIconConfirm.style.display = 'block';
            hideIconConfirm.style.display = 'none';
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#register-form").validate({
            rules: {
                prenom: {
                    required: true,
                    minlength: 2
                },
                nom: {
                    required: true,
                    minlength: 2
                },
                sexe: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                prenom: {
                    required: "Le prénom est requis",
                    minlength: "Le prénom doit contenir au moins 2 caractères"
                },
                nom: {
                    required: "Le nom est requis",
                    minlength: "Le nom doit contenir au moins 2 caractères"
                },
                sexe: {
                    required: ""
                },
                email: {
                    required: "L'adresse e-mail est requise",
                    email: "Veuillez entrer une adresse e-mail valide"
                },
                password: {
                    required: "Le mot de passe est requis",
                    minlength: "Le mot de passe doit contenir au moins 6 caractères"
                },
                password_confirmation: {
                    required: "Veuillez confirmer votre mot de passe",
                    equalTo: "Les mots de passe ne correspondent pas"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("text-danger text-sm");
                $('.validation-icon').hide();
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass("border-danger").removeClass("border-secondary");
            },
            unhighlight: function(element) {
                $(element).removeClass("border-danger").addClass("border-secondary");
            },
            success: function(label, element) {
                $(element).next(".validation-icon").remove();
                $(element).after(
                    '<span class="validation-icon text-success ml-2">✔</span>'
                );
            }
        });
    });
</script>

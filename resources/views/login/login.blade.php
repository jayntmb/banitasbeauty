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
                        <h1 class="mb-lg-4 text-lg">Connectez-vous !</h1>
                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <div class="form-group row g-lg-3 g-3">
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control lg" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="col-input">
                                        <input type="password" name="password" class="form-control lg input-password"
                                            placeholder="Mot de passe" id="password">
                                        <div class="btn show-password" onclick="togglePassword()">
                                            <i class="bi bi-eye icon-show"></i>
                                            <i class="bi bi-eye-slash icon-hidden"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                </script>
                                <div class="col-12">
                                    <div class="text-end">
                                        <a href="/mot-de-passe-oublie" class="link">
                                            <span>Mot de passe oublié ?</span>
                                            <span>Mot de passe oublié ?</span>
                                            <span>Mot de passe oublié ?</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-lg-12 ms-auto">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            Se connecter
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="paragraph sm">
                                        Vous n'avez pas de compte !
                                        <a href="/inscription" class="link">
                                            <span>Inscrivez-vous.</span>
                                            <span>Inscrivez-vous.</span>
                                            <span>Inscrivez-vous.</span>
                                        </a>
                                    </p>
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
                        <input type="text" class="form-control" placeholder="Votre adresse e-mail">
                        <button class="btn btn-primary btn-default">
                            S'abonner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

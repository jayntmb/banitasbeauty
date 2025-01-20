@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
    <div class="block-contact">
        <div class="container">
            <div class="row g-lg-3 g-3 align-items-center">
                <div class="col-lg-6">
                    <h1 class="mb-0 text-xxl">Contactez-nous pour toute question sur nos produits de beauté</h1>
                </div>
                <div class="col-lg-6">
                    <div class="content-form card">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf 
                            <div class="form-group row g-lg-3 g-2">
                                <div class="col-12">
                                    <input type="text" class="form-control lg" name="prenom" placeholder="Prénom"
                                        value="{{ old('prenom', auth()->check() ? auth()->user()->prenom : '') }}"
                                        required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control lg" name="nom" placeholder="Nom"
                                        value="{{ old('nom', auth()->check() ? auth()->user()->nom : '') }}" required>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control lg" name="email" placeholder="Email"
                                        value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control lg" name="telephone" placeholder="Téléphone"
                                        value="{{ old('telephone', auth()->check() ? auth()->user()->telephone : '') }}" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control lg" name="objet" placeholder="Objet"
                                        value="{{ old('objet') }}" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="g-recaptcha mb-3"
                                        data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                </div>
                                <div class="col-12">
                                    <div class="col-lg-6 ms-auto">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            Envoyer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Section promotionnelle commentée temporairement
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
                        <a href="#" class="btn btn-white btn-default">
                            Commander
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}

    {{-- Section newsletter commentée temporairement
    <div class="newsletter">
        <div class="container">
            <div class="col-lg-6">
                <h3 class="text-white">
                    Abonnez-vous a notre Newsletter
                </h3>
                <p class="paragraph text-white mb-lg-4">Pour tout savoir de l'actualité Banita's Beauty et ses promotions ?
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
    --}}

    {{-- Suggestions d'améliorations pour la sécurité et la pertinence :

    1. Formulaire de contact :
       - Ajouter une protection CSRF
       - Implémenter une validation côté serveur
       - Ajouter un captcha pour prévenir le spam
       - Limiter le nombre de soumissions par IP
       - Sanitiser les entrées utilisateur
       - Ajouter des messages d'erreur explicites

    2. Newsletter :
       - Implémenter une double opt-in
       - Ajouter une politique de confidentialité
       - Valider le format email
       - Ajouter un système de désinscription
       - Stocker les emails de façon sécurisée
       - Respecter le RGPD

    3. Général :
       - Ajouter des logs d'activité
       - Mettre en place un rate limiting
       - Utiliser HTTPS
       - Ajouter des en-têtes de sécurité
       - Implémenter une politique de mots de passe forts
    --}}

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
@endsection

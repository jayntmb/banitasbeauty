@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="banner-sm" id="home">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
        <div class="container">
            <h1>Identifiez-vous</h1>
        </div>
    </div>
    <div class="block-card-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <h4>Nouveau client ?</h4>
                        <p>Inscrivez-vous ! C'est simple et rapide ! Une fois inscri(e), vous pourrez:</p>
                        <ul>
                            <li>Suivre vos commandes</li>
                            <li>Commander plus rapidement</li>
                            <li>Demander un devis</li>
                        </ul>
                        <form method="post" action="{{ route('enregistrements.create') }}">
                            @csrf
                            <div class="form-group row g-4">
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Adresse e-mail"
                                        name="email" required>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Ldy-owfAAAAAM0gBGWQResVOhxrdwlb-M7IB4l6"></div>
                                <div class="col-12">
                                    <button class="btn">Créer un compte</button>
                                </div>
                                <div class="col-12 col-sign-up">
                                    <p>Vous avez un compte ? <br><a href="/login" class="reset">Connectez-vous</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-hidden">
                    <div class="card">
                        <h4>Connexion à mon compte client</h4>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row g-4">
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Adresse e-mail"
                                        name="email" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" placeholder="Mot de passe"
                                        name="password" required>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="reset-password">
                                        <a href="">Mot passe oublié ?</a>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <button class="btn">Connexion</button>
                                </div>
                                <div class="col-12 col-sign-up">
                                    <p>Vous n'avez pas de compte ? <br><a href="#" class="reset">Creer un compte</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

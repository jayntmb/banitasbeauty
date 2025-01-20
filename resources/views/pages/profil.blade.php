@extends('layouts.master-dash', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>
            <div class="block-dash">
                <div class="container">
                    <div class="row">
                        @include('layouts.partials.header.sidebar')
                        <div class="col-lg-9">
                            <div class="banner-sm">
                                <div class="container-fluid">
                                    <h2>Profil</h2>
                                </div>
                                <img src="{{asset('assets/images/img-pill.png')}}" alt="" class="img-pill">
                            </div>
                            <div class="container-fluid container-dash px-2 px-lg-3">
                                <div class="row g-lg-3">
                                    <div class="col-lg-12">
                                        <div class="card card-lg card-profil-lg">
                                            <h4 class="text-center">Modification de mon profil</h4>
                                            <form method="post" action="{{ route('profil.update') }}">
                                                @csrf
                                                <div class="block-avatar">
                                                    <div class="icon-lg">
                                                        {{-- <img src="{{ asset('assets/images/profil/3.jpg') }}"/> --}}
                                                        <h2>{{ Auth::user()->prenom != '' ? Auth::user()->prenom[0].Auth::user()->nom[0] : Auth::user()->nom[0] }}</h2>
                                                        {{-- <div class="input-file">
                                                            <input type="file" name="avatar">
                                                            <i class="bi bi-plus"></i>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group row g-lg-4 g-3">
                                                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                                    <div class="col-lg-4">
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom" required value="{{ Auth::user()->nom }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="postnom" class="form-control" placeholder="Post-nom" value="{{ Auth::user()->postnom }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{ Auth::user()->prenom }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="phone" name="telephone" class="form-control" placeholder="Telephone" required value="{{ Auth::user()->contacts->first()?->telephone }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="sexe" id="sexe" class="form-select" required>
                                                            <option disabled> Selectionnez </option>
                                                            <option value="Féminin" {{ Auth::user()->sexe == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                                                            <option value="Masculin" {{ Auth::user()->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="adresse" class="form-control" placeholder="Adresse" value="{{ Auth::user()->contacts->first()?->adresse }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="quartier" class="form-control" placeholder="Quartier" value="{{ Auth::user()->contacts->first()?->quartier }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="commune" class="form-control" placeholder="Commune" value="{{ Auth::user()->contacts->first()?->commune }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="ville" class="form-control" placeholder="Ville" value="{{ Auth::user()->contacts->first()?->ville }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="province" class="form-control" placeholder="Province" value="{{ Auth::user()->contacts->first()?->province }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="pays" class="form-control" placeholder="Pays" value="{{ Auth::user()->contacts->first()?->pays }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="societe" class="form-control" placeholder="Société" value="{{ Auth::user()->clients->first()?->societe }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="poste" class="form-control" placeholder="Poste" value="{{ Auth::user()->clients->first()?->poste }}">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn">Sauvegader les infos</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card card-lg card-profil-lg mt-2 mt-md-3">
                                            <h4 class="text-center">Modification du mot de passe</h4>
                                            <form method="post" action="{{ route('password.change') }}">
                                                @csrf
                                                <div class="form-group row g-lg-4 g-3">
                                                    <div class="col-lg-4">
                                                        <input type="password" name="password_old" class="form-control" placeholder="Ancien mot de passe" required>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmation du mot de passe" required>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn">Sauvegader</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection





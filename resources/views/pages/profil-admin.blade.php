@extends('admin.layouts.master',['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    @include('admin.layouts.partials.header.sidebar')
    <div class="banner-sm">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-left text-white">
                        <h2>Paramètres</h2>
                        {{-- <p>You have 24 new messages and 5 new notifications.</p>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card wow mb-6 card-table px-3 py-4">
                                <div class="card-body ">
                                    <h4 class="ps-0 mb-4">Modifier profil</h4>
                                    <form method="post" action="{{ route('profil.update') }}" class="mt-6">
                                        @csrf
                                        {{-- <div class="block-avatar">
                                            <div class="icon-lg">
                                                <img src="{{ asset('assets/images/profil/3.jpg') }}"/>
                                                <h2>{{ Auth::user()->prenom != '' ? Auth::user()->prenom[0] . Auth::user()->nom[0] : Auth::user()->nom[0] }}
                                                </h2>
                                                <div class="input-file">
                                                        <input type="file" name="avatar">
                                                        <i class="bi bi-plus"></i>
                                                    </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row g-lg-4 g-3">
                                            <input type="hidden" name="user_id" class="form-control"
                                                value="{{ Auth::user()->id }}">
                                            <div class="col-lg-4">
                                                <input type="text" name="nom" class="form-control" placeholder="Nom"
                                                    required value="{{ Auth::user()->nom }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="postnom" class="form-control"
                                                    placeholder="Post-nom" value="{{ Auth::user()->postnom }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="prenom" class="form-control"
                                                    placeholder="Prenom" value="{{ Auth::user()->prenom }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="phone" name="telephone" class="form-control"
                                                    placeholder="Telephone" required
                                                    value="{{ Auth::user()->contacts->first()?->telephone }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <select name="sexe" id="sexe" class="form-select" required>
                                                    <option disabled> Selectionnez </option>
                                                    <option value="Féminin"
                                                        {{ Auth::user()->sexe == 'Féminin' ? 'selected' : '' }}>Féminin
                                                    </option>
                                                    <option value="Masculin"
                                                        {{ Auth::user()->sexe == 'Masculin' ? 'selected' : '' }}>Masculin
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="adresse" class="form-control"
                                                    placeholder="Adresse"
                                                    value="{{ Auth::user()->contacts->first()?->adresse }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="quartier" class="form-control"
                                                    placeholder="Quartier"
                                                    value="{{ Auth::user()->contacts->first()?->quartier }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="commune" class="form-control"
                                                    placeholder="Commune"
                                                    value="{{ Auth::user()->contacts->first()?->commune }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="ville" class="form-control"
                                                    placeholder="Ville"
                                                    value="{{ Auth::user()->contacts->first()?->ville }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="province" class="form-control"
                                                    placeholder="Province"
                                                    value="{{ Auth::user()->contacts->first()?->province }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="pays" class="form-control" placeholder="Pays"
                                                    value="{{ Auth::user()->contacts->first()?->pays }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="societe" class="form-control"
                                                    placeholder="Société"
                                                    value="{{ Auth::user()->clients->first()?->societe }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="poste" class="form-control"
                                                    placeholder="Poste"
                                                    value="{{ Auth::user()->clients->first()?->poste }}">
                                            </div>
                                            <div class="text-end col-12">
                                                <button class="btn btn-success">Sauvegader les infos</button>
                                            </div>
                                        </div>

                                    </form>
                                    <hr>
                                    <h4 class="ps-0">Modification du mot de passe</h4>
                                    <form method="post" action="{{ route('password.change') }}">
                                        @csrf
                                        <div class="form-group row g-lg-4 g-3">
                                            <div class="col-lg-4">
                                                <label for="">Ancien mot de passe</label>
                                                <input type="password" name="password_old" class="form-control"
                                                    placeholder="Ancien mot de passe" required>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Nouveau mot de passe</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Nouveau mot de passe" required>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Confirmation mot de passe</label>
                                                <input type="password" name="password_confirm" class="form-control"
                                                    placeholder="Confirmation du mot de passe" required>
                                            </div>
                                            <div class="text-end col-12">
                                                <button class="btn btn btn-success">Sauvegader</button>
                                            </div>
                                        </div>

                                    </form>
                                    <hr>
                                    <h4 class="ps-0">Infos du site</h4>
                                    <form method="post" action="{{ route('site.update') }}">
                                        @csrf
                                        <div class="form-group row g-lg-4 g-3">
                                            <div class="col-lg-3">
                                                <label for="site-add">Adresse</label>
                                                <input type="text" name="siteadd" id="site-add" class="form-control"
                                                    placeholder="Addresse" value="" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="site-email">E-mail</label>
                                                <input type="text" name="siteemail" id="site-email"
                                                    class="form-control" placeholder="Email" value=""
                                                    required>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="site-phone">Telephone</label>
                                                <input type="text" id="site-phone" name="sitephone"
                                                    class="form-control" placeholder="Telephone"
                                                    value="" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="site-phone-wh">Whatsapp</label>
                                                <div class="row">
                                                    <input type="text" id="site-phone-wh" name="whatsapp"
                                                        class="form-control" placeholder="Numéro Whatsapp"
                                                        value="" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="site-phone">TAUX</label>
                                                <input type="number" id="site-phone" name="taux"
                                                    class="form-control" placeholder="Taux du jour"
                                                    value="" required>
                                            </div>
                                            <div class="text-end col-12">
                                                <button class="btn btn btn-success">Sauvegader</button>
                                            </div>
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
@endsection

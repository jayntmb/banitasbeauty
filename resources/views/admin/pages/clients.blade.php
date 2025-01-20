@extends('admin.layouts.master')

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
                        <h2>Clients</h2>
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
                            <div class="card wow mb-6 card-table">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0">Tous les clients</h4>
                                        <div class="group-btn">
                                            {{-- <button class="btn btn-primary"><i class="fas fa-sort-alpha-up"></i></button>
                    <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button> --}}
                                        </div>
                                        @foreach ($users as $key => $user)
                                            <div class="modal fade" id="ModalUser_{{ $key }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Détails du user
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body detail-act">
                                                            <div class="card">
                                                                <div class="card-img">
                                                                    <img src="{{ asset('assets/images/users/' . $user->image) }}"
                                                                        alt="" class="img-fluid">
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="text-left">
                                                                        <h4><span>{{ $user->libelle }}</span></h4>
                                                                        <div class="date">
                                                                            <i class="fas fa-calendar mr-2"></i>
                                                                            {{ $user->created_at->format('d-m-Y') }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="card-footer bg-white pl-0 d-flex justify-content-between">
                                                                    <div class="custom-control custom-switch">
                                                                        <a href="{{ route('admin.clients.edit', [$user->id]) }}"
                                                                            class="btn btn-default btn-delete">Modifier le
                                                                            user</a>
                                                                    </div>
                                                                    <div class="group-btn">
                                                                        <a href="{{ route('admin.clients.delete', [$user->id]) }}"
                                                                            class="btn btn-default btn-delete">Supprimer le
                                                                            user</a>
                                                                    </div>
                                                                </div>
                                                                <div class="sm-badge">
                                                                    <div class="icon-sm">
                                                                        <i class="fas fa-question"></i>
                                                                    </div>
                                                                    <div class="text-left">
                                                                        <span>Voulez-vous vraiment supprimer ?</span>
                                                                        <button
                                                                            class="btn btn-default btn-sm text-success"><i
                                                                                class="fas fa-check"></i> Oui</button>
                                                                        <button
                                                                            class="btn btn-default btn-sm text-danger btn-no"><i
                                                                                class="fas fa-times"></i> Non</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="form-group w-25 d-flex mb-0">
                      <input type="text" class="form-control" placeholder="Recherche ici..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                      <button class="btn btn-primary btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                        <i class="fas fa-search"></i>
                      </button>
                    </div> --}}
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope="col">Role</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Statut</th>
                                                            {{-- <th scope="col">Actions</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $key => $user)
                                                            <tr>
                                                                {{-- <td><img src="{{ asset('assets/images/users/'.$user->image) }}" alt=""></td> --}}
                                                                <td data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">{{ $key + 1 }}</td>
                                                                <td data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    <div class="d-flex align-items-center">
                                                                        {{-- <img src="{{asset('assets/admin/images/avatar.jpg')}}" alt=""> --}}
                                                                        <div class="block-name">
                                                                            {{ $user->nom != '' ? $user->nom[0] . Str::upper(substr($user->postnom, -1)) : Str::upper($user->nom[0]) }}
                                                                        </div>
                                                                        <div class="name d-flex"
                                                                            style="flex-direction: column">
                                                                            <span>
                                                                                {{ $user->nom . ' ' . $user->postnom . ' ' . $user->prenom }}</span>
                                                                            <span class="email-user">
                                                                                {{ $user->email }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    {{ $user->role->libelle }}</td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    {{ $user->commandes?->last()?->created_at == null ? '-' : $user->commandes?->last()?->created_at->format('d-m-Y') }}
                                                                </td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    <span
                                                                        class="badge {{ $user->active == 1 ? 'active' : 'unactive' }}">{{ $user->active == 1 ? 'Activé' : 'Désactivé' }}</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card wow mb-4 card-table">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <h4  class="mb-0">Tous les logos des clients</h4>
                      <div class="group-btn">
                        <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-new-part">Ajouter</button>
                      </div>
                      {{-- <div class="form-group w-25 d-flex mb-0">
                        <input type="text" class="form-control" placeholder="Recherche ici..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button class="btn btn-primary btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
            </div>

        </div>
    </div>
    </div>
    {{-- <div class="col-lg-4">
                  <div class="card wow">
                    <div class="card-body">
                     <h4 style="font-size: 20px;"> Ajouter un partenaire</h4>
                     <hr>
                    <form method="post" action="{{ route('admin.partenaires.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="nom">Nom du partenaire</label>
                            <input type="text" class="form-control" placeholder="Entrez le nom du produit" name="nom" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label for="nom">Téléphone</label>
                            <input type="text" class="form-control" placeholder="Entrez le numéro de téléphone" name="telephone" required>
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">E-mail</label>
                            <input type="text" class="form-control" placeholder="Entrez l'adresse E-mail " name="email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-3">
                            <label for="nom">Numéro</label>
                            <input type="text" class="form-control" placeholder="Entrez le numéro" name="numero">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-9">
                            <label for="nom">Avenue</label>
                            <input type="text" class="form-control" placeholder="Entrez l'avenue" name="avenue">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label for="nom">Quartier</label>
                            <input type="text" class="form-control" placeholder="Entrez le quartier" name="quartier">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Commune</label>
                            <input type="text" class="form-control" placeholder="Entrez la commune" name="commune">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label for="nom">Ville</label>
                            <input type="text" class="form-control" placeholder="Entrez la ville" name="ville">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Province</label>
                            <input type="text" class="form-control" placeholder="Entrez la province" name="province">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label for="nom">Pays</label>
                            <input type="text" class="form-control" placeholder="Entrez la pays" name="pays">
                          </div>
                          <div class="col-lg-6">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control">
                                <option value="1"> Actif </option>
                                <option value="2"> Inactif </option>
                                <option value="3"> En attente </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                              <label for="category">Image</label>
                            </div>
                            <div class="col-lg-12">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input form-control" id="customFileLang" lang="es" required>
                                <label class="custom-file-label" for="customFileLang">Selectionnez une image</label>
                              </div>
                            </div>
                          </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <button class="btn btn-primary w-50">Valider</button>
                          </div>
                        </div>
                     </form>
                    </div>
                  </div>
                </div> --}}
    </div>
    </div> --}}

    </div>
    </div>
    </div>


    @foreach ($users as $key => $user)
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-client_{{ $key }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail du client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="block-banner-custom mb-2 mb-md-4">
                    <div class="block-switch">
                        @if ($user->active == 1)
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-off btn-action">
                                <i class="fas fa-power-off"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-on btn-action">
                                <i class="fas fa-power-off"></i>
                            </a>
                        @endif
                        {{-- <div class="form-check form-switch d-flex align-items-center">
                            <label class="form-check-label me-1" for="flexSwitchCheckDefault">Désactiver</label>
                            <input class="form-check-input float-none m-0" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div> --}}
                    </div>

                    <div class="container-fluid px-0">
                        <div class="row align-items-center g-3">
                            <div class="col-lg-2 px-0">
                                <div class="block-name-custom">
                                    {{ $user->nom != '' ? $user->nom[0] . ' ' . Str::upper($user->prenom[0] ?? '') : $user->nom[0] . ' ' . Str::upper($user->prenom[0]) }}
                                </div>
                            </div>
                            <div class="col-lg-8 ps-0">
                                <h5>{{ $user->nom }} <span class="badge {{ $user->active == 1 ? 'active' : 'unactive' }}">{{ $user->active == 1 ? 'Activé' : 'Désactivé' }}</span></h5>
                                <div class="block-items d-flex aling-items-center flex-wrap">
                                    <div class="items">
                                        <i class="fas fa-envelope"></i>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                    <div class="items">
                                        <i class="fas fa-phone"></i>
                                        <span>{{ $user->contacts?->first()?->telephone }}</span>


                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-2 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn btn-option" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                          </div>
                    </div> --}}
                        </div>
                    </div>
                </div>
                <div class="px-md-4 px-3">
                    <h6>Infos sur l'entreprise
                        {{-- @if ($user->active == 1)
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-danger">
                                Désactivez
                            </a>
                        @else
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-success">
                                Activez
                            </a>
                        @endif --}}
                    </h6>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>Nom de l'entreprise</h5>
                                <p>{{ $user->clients?->first()->societe ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>N° RCCM</h5>
                                <p>{{ $user->clients?->first()->rccm ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>ID National</h5>
                                <p>{{ $user->clients?->first()->idnat ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>N° Impot</h5>
                                <p>{{ $user->clients?->first()->impot ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>N° d'Ordre</h5>
                                <p>{{ $user->clients?->first()->ordre ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block-info-user">
                                <h5>Secteur d'activité</h5>
                                <p>{{ $user->clients?->first()->secteur ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="px-md-4 px-3">
                    @php
                        $devis = App\Models\Commande::where('user_id', $user->id)->get();
                    @endphp
                    <h6>Activités</h6>
                    <div class="block-all-activ">
                        @if ($devis->count() > 0)
                            @foreach ($devis as $devi)
                                <div class="card-activ">
                                    <div class="d-flex align-items-center">
                                        <h5>Demande devis</h5>
                                        <span class="date">{{ $devi->created_at->format('d-m-Y') }}</span>
                                    </div>
                                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, soluta? Dignissimos, culpa.</p> --}}
                                </div>
                            @endforeach
                        @else
                            <p>Pas activité pour l'instant.</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($partenaires as $key => $partenaire)
        <div class="modal fade" id="ModalUser_{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Détails du user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body detail-act">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/images/users/' . $partenaire->image) }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="text-left">
                                    <h4><span>{{ $partenaire->libelle }}</span></h4>
                                    <div class="date">
                                        <i class="fas fa-calendar mr-2"></i>
                                        {{ $partenaire->created_at->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white pl-0 d-flex justify-content-between">
                                <div class="custom-control custom-switch">
                                    <a href="#" class="btn btn-default btn-delete">Modifier le user</a>
                                </div>
                                <div class="group-btn">
                                    <a href="#" class="btn btn-default btn-delete">Supprimer le user</a>
                                </div>
                            </div>
                            <div class="sm-badge">
                                <div class="icon-sm">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="text-left">
                                    <span>Voulez-vous vraiment supprimer ?</span>
                                    <button class="btn btn-default btn-sm text-success"><i class="fas fa-check"></i>
                                        Oui</button>
                                    <button class="btn btn-default btn-sm text-danger btn-no"><i class="fas fa-times"></i>
                                        Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
@endsection

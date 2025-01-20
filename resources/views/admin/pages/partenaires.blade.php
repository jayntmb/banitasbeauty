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
                        <h2>Partenaires</h2>
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

            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card wow mb-4 card-table">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <h4  class="mb-0">Tous les partenaires</h4>
                      <div class="group-btn">
                        <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-new-part">Nouveau partenaire</button>
                      </div>
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
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($partenaires as $key => $partenaire)
                                      <tr data-toggle="modal" data-target="#ModalUser_">
                                          {{-- <td><img src="{{ asset('assets/images/users/'.$partenaire->image) }}" alt=""></td> --}}
                                          <td>{{ $key + 1 }}</td>
                                          <td>{{ $partenaire->nom.' '.$partenaire->postnom.' '.$partenaire->prenom }}</td>
                                          <td>{{ $partenaire->created_at->diffForHumans() }}</td>
                                          <td>
                                              @if ($partenaire->statut_id == '1')
                                                  <span class="badge normal">
                                              @elseif ($partenaire->statut_id == '2')
                                                  <span class="badge urgent">
                                              @else
                                                  <span class="badge very-urgent">
                                              @endif
                                                      {{ $partenaire->statut->libelle }}
                                                  </span>
                                          </td>
                                          <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.partenaires.delete', [$partenaire->id]) }}" class="btn">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
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
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-new-part" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Ajouter un partenaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.partenaires.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row g-3">
                            <div class="col-12">
                                <label for="" class="mb-2">Images</label>
                                <div class="block-file">
                                    <label for="file-upload-part">
                                        <input name="image" type="file" id="file-upload-part" class="file-input" accept="image/*">
                                        <i class="fas fa-upload"></i>
                                        <span>Cliquez pour choisir une image</span>
                                    </label>
                                </div>
                            </div>
                          <div class="col-lg-12">
                            <label for="nom">Nom du partenaire</label>
                            <input type="text" class="form-control text-capitalize" placeholder="Entrez le nom du produit" name="nom" required>
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Téléphone</label>
                            <input type="text" class="form-control" placeholder="Entrez le numéro de téléphone" name="telephone" required>
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">E-mail</label>
                            <input type="text" class="form-control" placeholder="Entrez l'adresse E-mail " name="email">
                          </div>
                          <div class="col-12">
                                <label for="category" class="mb-2">Adresse</label>
                                <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Description"></textarea>
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Quartier</label>
                            <input type="text" class="form-control" placeholder="Entrez le quartier" name="quartier">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Commune</label>
                            <input type="text" class="form-control" placeholder="Entrez la commune" name="commune">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Ville</label>
                            <input type="text" class="form-control" placeholder="Entrez la ville" name="ville">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Province</label>
                            <input type="text" class="form-control" placeholder="Entrez la province" name="province">
                          </div>
                          <div class="col-lg-6">
                            <label for="nom">Pays</label>
                            <input type="text" class="form-control" placeholder="Entrez la pays" name="pays">
                          </div>
                          <div class="col-lg-6">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control" required>

                                <option  selected disabled> Selectionnez </option>
                                <option value="1"> Actif </option>
                                <option value="2"> Inactif </option>
                                <option value="3"> En attente </option>
                            </select>
                          </div>
                          <div class="col-lg-12 d-flex justify-content-end">
                            <button class="btn btn-primary mt-3">Ajouter</button>
                          </div>
                        </div>
                     </form>
                    </div>
                    {{-- <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row g-3">

                            <div class="col-12">
                                <label for="" class="mb-2">Nom produit</label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom du produit">
                            </div>

                            <div class="col-lg-12">
                                <label for="category" class="mb-2">Catégorie</label>
                                <select name="categorie_id" id="category"
                                    class="form-control select-form form-control-sm">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="category" class="mb-2">Catégorie</label>
                                <select name="statut_id" id="statut" class="form-control select-form form-control-sm">
                                    <option value="1"> Actif </option>
                                    <option value="2"> Inactif </option>
                                    <option value="3"> En attente </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="category" class="mb-2">Description</label>
                                <textarea name="description" id="" cols="30" rows="4" class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="category" class="mb-2">Indication</label>
                                <textarea name="posologie" name="" id="" cols="30" rows="4" class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary mt-3" type="submit">Ajouter</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
      

@endsection

@section('script')
@endsection

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
                        <h2>Catégories</h2>
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
                  <div class="card wow mb-4">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <h4  class="mb-0">Toutes les catégories</h4>
                      <div class="group-btn">
                        <button class="btn btn-primary">Nouvelle catégorie</button>
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
                                    <th scope="col">Produits</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Etat</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categories as $key => $categorie)
                                      <tr data-toggle="modal" data-target="#ModalUser_{{ $key }}">
                                          <td><img src="{{ asset('assets/images/categories/'.$categorie->image) }}" alt=""></td>
                                          <td>{{ $categorie->libelle }}</td>
                                          <td>{{ $categorie->articles->count() }}</td>
                                          <td>{{ $categorie->created_at->diffForHumans() }}</td>
                                          <td>
                                              @if ($categorie->statut_id == '1')
                                              <span class="badge normal">
                                              @elseif ($categorie->statut_id == '2')
                                              <span class="badge urgent">
                                              @else
                                              <span class="badge very-urgent">
                                              @endif
                                                  {{ $categorie->statut->libelle }}
                                              </span>
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
                <div class="col-lg-4">
                  <div class="card wow">
                    <div class="card-body">
                     <h4 style="font-size: 20px;"> {{ $article != null ? 'Modifier une categorie' : 'Ajouter une categorie' }} </h4>
                     <hr>
                     @if ($article != null)
                        <form method="post" action="{{ route('admin.categories.update') }}" enctype="multipart/form-data">
                     @else
                        <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <input type="hidden" class="form-control" placeholder="Entrez" name="categorie_id" value="{{ $article != null ? $article->id : '' }}">
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="nom">Nom de la catégorie</label>
                            <input type="text" class="form-control" placeholder="Entrez le nom de la catégorie" name="libelle" value="{{ $article != null ? $article->libelle : '' }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control">
                                <option selected disabled> Selectionnez </option>

                                <option value="1" {{ ($article != null && $article->statut_id == '1') ? 'selected' : '' }}> Actif </option>
                                <option value="2" {{ ($article != null && $article->statut_id == '2') ? 'selected' : '' }}> Inactif </option>
                                <option value="3" {{ ($article != null && $article->statut_id == '3') ? 'selected' : '' }}> En attente </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                              <label for="category">Image</label>
                            </div>
                            <div class="col-lg-12">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input form-control" id="customFileLang" lang="es" {{ $article != null ? '' : 'required' }}>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @foreach ($categories as $key => $categorie)
        <div class="modal fade" id="ModalUser_{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Détails du categorie</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body detail-act">
                  <div class="card">
                    <div class="card-img">
                      <img src="{{ asset('assets/images/categories/'.$categorie->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body">
                      <div class="text-left">
                        <h4><span>{{ $categorie->libelle }}</span></h4>
                        <div class="date">
                          <i class="fas fa-calendar mr-2"></i> {{ $categorie->created_at->format('d-m-Y') }}
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-white pl-0 d-flex justify-content-between">
                        <div class="custom-control custom-switch">
                            <a href="{{ route('admin.categories.edit', [$categorie->id]) }}" class="btn btn-default btn-delete">Modifier le categorie</a>
                        </div>
                    <div class="group-btn">
                        <a href="{{ route('admin.categories.delete', [$categorie->id]) }}" class="btn btn-default btn-delete">Supprimer le categorie</a>
                    </div>
                    </div>
                    <div class="sm-badge">
                      <div class="icon-sm">
                        <i class="fas fa-question"></i>
                      </div>
                      <div class="text-left">
                        <span>Voulez-vous vraiment supprimer ?</span>
                        <button class="btn btn-default btn-sm text-success"><i class="fas fa-check"></i> Oui</button>
                        <button class="btn btn-default btn-sm text-danger btn-no"><i class="fas fa-times"></i> Non</button>
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

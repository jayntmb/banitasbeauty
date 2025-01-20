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
                        <h2>Gestion des Images</h2>
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
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card wow mb-4 card-table py-3 px-3">
                                <div class="card-body ">
                                    <h4>Liste d'images</h4>
                                        <div class="row g-lg-3 g-3">
                                            @foreach ($images as $image)
                                                <div class="col-lg-4 col-xl-4 col-xxl-3 col-6">
                                                    <div class="card-img-gal">
                                                        <div class="content-img-gal">
                                                            <img src="{{ asset($image->path) }}" alt="{{$image->name}}">
                                                        </div>
                                                        <div class="text-center">
                                                            <p> {{$image->name}} </p>
                                                            <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-change-image-{{$image->id}}"><i class="fas fa-pen me-1"></i>Changer</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card wow mb-4 card-table">
                          <div class="card-body">
                           <div class="d-flex justify-content-between">
                            <h4  class="mb-0">Tous les logos des clients</h4>
                            <div class="group-btn">
                              <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-new-part">Ajouter</button>
                            </div>

                           </div>
                           <div class="row mt-3">
                             <div class="col-lg-12">
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                        <tr>
                                            <th>Logo</th>
                                          <th scope="col">Nom</th>
                                          {{-- <th scope="col">Date</th> --}}
                                          <th scope="col">Statut</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($logos as $key => $logo)
                                            <tr>
                                                <td><img src="{{ asset('assets/images/partenaires/logos/'.$logo->logo) }}" alt="" style="object-fit: contain; border-radius: 0"></td>
                                                <td> {{$logo->name}} </td>
                                                <td>
                                                    @if ($logo->statut_id == '1')
                                                        <span class="badge normal">
                                                            Actif
                                                    @elseif ($logo->statut_id == '2')
                                                        <span class="badge urgent">
                                                            Inactif
                                                    @elseif ($logo->statut_id == '3')
                                                        <span class="badge very-urgent">
                                                            En attente
                                                    @endif
                                                        </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-part-{{$logo->id}}" class="btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.partenaires.logo.delete', $logo->id) }}" class="btn">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($images as $image)
    <div class="modal fade" id="modal-change-image-{{$image->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Changer l'image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <br/>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <br/>
                                <button type="submit" class="btn btn-success">Télécharger l'image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="modal fade" id="modal-new-part" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Ajouter un partenaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.partenaires.logo.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row g-3">
                            <div class="col-12">
                                <label for="" class="mb-2">Logo</label>
                                <div class="block-file">
                                    <label for="file-upload-part">
                                        <input name="image" type="file" id="file-upload-part" class="file-input" accept="image/*" required>
                                        <i class="fas fa-upload"></i>
                                        <span>Cliquez pour choisir une image</span>
                                    </label>
                                </div>
                            </div>
                          <div class="col-lg-12">
                            <label for="nom">Nom du partenaire</label>
                            <input type="text" class="form-control text-capitalize" placeholder="Entrez le nom du produit" name="name" required>
                          </div>
                          <div class="col-lg-6">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control" required>

                                <option selected disabled> Selectionnez </option>
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

                </div>
            </div>
        </div>
    </div>

    @foreach ($logos as $logo)
    <div class="modal fade" id="modal-edit-part-{{$logo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Edit un logo partenaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.partenaires.logo.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row g-3">
                            <div class="col-12">
                                <input type="hidden" name="pl_id" value="{{$logo->id}}">
                                <label for="" class="mb-2">Logo</label>
                                <div class="block-file ">
                                    <img src="{{asset('assets/images/partenaires/logos/'.$logo->logo)}}" alt="" style="width: 100px;height:150px;">
                                    <label for="file-upload-part">
                                        <input name="image" type="file" id="file-upload-part" class="file-input" accept="image/*">
                                        <i class="fas fa-upload"></i>
                                        <span>Cliquez pour choisir une image</span>
                                    </label>
                                </div>
                            </div>
                          <div class="col-lg-12">
                            <label for="nom">Nom du partenaire</label>
                            <input type="text" class="form-control text-capitalize" value="{{$logo->name}}" placeholder="Entrez le nom du produit" name="name" required>
                          </div>
                          <div class="col-lg-6">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control" required>
                                <option selected disabled> Selectionnez </option>
                                <option value="1" {{$logo->statut_id == '1' ? 'selected':''}}> Actif </option>
                                <option value="2" {{$logo->statut_id == '2' ? 'selected':''}}> Inactif </option>
                                <option value="3" {{$logo->statut_id == '3' ? 'selected':''}}> En attente </option>
                            </select>
                          </div>
                          <div class="col-lg-12 d-flex justify-content-end">
                            <button class="btn btn-primary mt-3">Modifier</button>
                          </div>
                        </div>
                     </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

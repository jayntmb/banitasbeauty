@extends('layouts.master-chat', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>
            <div class="block-dash block-dash-chat">
                <div class="container">
                    <div class="row">
                        @include('layouts.partials.header.sidebar')
                        <div class="col-lg-9">
                            {{-- <div class="banner-sm">
                                <div class="container-fluid">
                                    <h2>Chat</h2>
                                </div>
                                <img src="http://127.0.0.1:8001/assets/images/img-pill.png" alt="" class="img-pill">
                            </div> --}}
                            <div class="container-fluid px-2 px-lg-3">
                                <div class="row g-lg-3">
                                    @livewire('chat',['getClient' => Auth::user()->clients?->first()->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-devis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="text-center w-100">
                        <h5 class="modal-title ">
                            Demande de devis
                        </h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row g-lg-4">
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="fill_name" placeholder="Nom complet">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="entreprise" placeholder="Entreprise">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Mail">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="adress" placeholder="Adresse">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="city" placeholder="Ville">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="province" placeholder="Province">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="contry" placeholder="Pays">
                            </div>
                            <div class="col-lg-12 col-12 col-md-6">
                                <textarea name="Message" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        J'ai lu et accepte la <a href="#">politique de confidentialité</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 text-end">
                                <button class="btn">Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

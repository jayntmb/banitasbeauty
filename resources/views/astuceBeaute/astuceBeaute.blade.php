@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
    <div class="block-astuce">
        <div class="container">
            <h2 class="title mb-lg-4 mb-3">
                Astuces beauté
            </h2>
            <p class="paragraph mb-lg-5">
                Découvrez nos conseils et astuces beauté pour sublimer votre routine quotidienne avec les produits Banita's Beauty
            </p>
            <div class="row g-lg-4 g-xl-4">
                <div class="col-lg-4">
                    <div class="card card-astuce">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="content-card d-flex flex-column">
                                <div class="content-img">
                                    <img src="{{asset("images/autres/2.jpg")}}" class="w-100 h-100 object-fit-cover"
                                        alt="image d'article">
                                </div>
                                <div class="content-text d-flex flex-column justify-content-end">
                                    <div class="date mt-2 mb-1">
                                        12 Déc, 2024
                                    </div>
                                    <h4 class="mb-0">
                                        Astuce de beauté
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-astuce">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="content-card d-flex flex-column">
                                <div class="content-img">
                                    <img src="{{asset("images/autres/1.jpg")}}" class="w-100 h-100 object-fit-cover"
                                        alt="image d'article">
                                </div>
                                <div class="content-text d-flex flex-column justify-content-end">
                                    <div class="date mt-2 mb-1">
                                        12 Déc, 2024
                                    </div>
                                    <h4 class="mb-0">
                                        Astuce de beauté
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-astuce">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="content-card d-flex flex-column">
                                <div class="content-img">
                                    <img src="{{asset("images/autres/3.jpg")}}" class="w-100 h-100 object-fit-cover"
                                        alt="image d'article">
                                </div>
                                <div class="content-text d-flex flex-column justify-content-end">
                                    <div class="date mt-2 mb-1">
                                        12 Déc, 2024
                                    </div>
                                    <h4 class="mb-0">
                                        Astuce de beauté
                                    </h4>
                                </div>
                            </div>
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

    <div class="modal fade modal-astuce" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header p-0">
             <div class="block-img-astuce d-flex justify-content-end flex-column">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-lg"></i>
              </button>
              <img src="{{asset("images/promotions/2.jpg")}}" class="w-100 h-100 object-fit-cover" alt="image d'article">
              <div class="content-title w-100 mt-auto">
                <div class="date text-white">12 Déc, 2024</div>
                <h4 class="mb-0 text-white">Astuce de beauté</h4>
              </div>
             </div>
            </div>
            <div class="modal-body">
              <h5>Description</h5>
              <p class="paragraph muted">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum adipisci esse deleniti aliquid iure, exercitationem porro, repudiandae ad debitis ipsa aliquam, cupiditate dolor ducimus sunt? Est ullam reprehenderit nam quae.
              </p>
              <p class="paragraph muted">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum adipisci esse deleniti aliquid iure, exercitationem porro, repudiandae ad debitis ipsa aliquam, cupiditate dolor ducimus sunt? Est ullam reprehenderit nam quae.
              </p>
              <p class="paragraph muted">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum adipisci esse deleniti aliquid iure, exercitationem porro, repudiandae ad debitis ipsa aliquam, cupiditate dolor ducimus sunt? Est ullam reprehenderit nam quae.
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection

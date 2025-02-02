@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')
    @include('admin.layouts.partials.header.sidebar')
    <div class="banner-sm mb-4">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-left text-white">
                        <h2>Gestion de contenu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Carte pour la bannière -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.banner-editor')
                </div>
                <!-- Carte pour la bande defilante -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.move-bundle-editor')
                </div>
                <!-- Carte pour le texte d'introduction -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.block-intro-editor')
                </div>
                <!-- Carte pour le produit mis en avant -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.block-promo-editor')
                </div>
                <!-- Carte pour les produit mis en promo -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.block-article-slide-editor')
                </div>
                <!-- Carte pour le block black -->
                <div class="col-md-4 mb-4">
                    @livewire('admin.block-black-editor')
                </div>
            </div>
        </div>
    </div>
@endsection

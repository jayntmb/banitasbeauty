@php
    $showNavPage = false;
@endphp

@extends('layouts.master')
@section('content')
    <style>
        .text-lg:hover {
            color: #3a2a1e;
            cursor: pointer;
        }
    </style>

    @include('partials.accueil.banner')
    @include('partials.accueil.move-bundle')
    @include('partials.accueil.block-intro')
    @include('partials.accueil.block-promo-lg')
    @include('partials.accueil.block-article-slide')
    @include('partials.accueil.block-black')
    @include('partials.accueil.newsletter')
@endsection

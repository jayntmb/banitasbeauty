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

    @livewire('banner-display')
    @livewire('move-bundle-display')
    @livewire('block-intro-display')
    @include('partials.accueil.block-promo-lg')
    @include('partials.accueil.block-article-slide')
    @include('partials.accueil.block-black')
    @include('partials.accueil.newsletter')
@endsection

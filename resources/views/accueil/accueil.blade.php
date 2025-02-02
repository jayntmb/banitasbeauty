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
    @livewire('block-promo-display')
    @livewire('block-article-slide-display')
    @livewire('block-black-display')
    @include('partials.accueil.newsletter')
@endsection

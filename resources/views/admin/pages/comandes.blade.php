@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')
    @include('admin.layouts.partials.header.sidebar')
    @livewire('admin.commandes-for-admin')
@endsection
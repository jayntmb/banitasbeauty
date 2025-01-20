@extends('layouts.master')

@section('style')
@endsection

@section('body')
    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>
            <div class="full-menu">
                <div class="close-menu">
                    <span></span>
                    <span></span>
                </div>
                <div class="content">
                    <h1>Menu</h1>
                    <hr>
                    <ul>
                        <li>
                            <a href="#home" class="scrollTop active">
                                Accueil
                            </a>
                            <a href="#about" class="scrollTop">
                                A Propos
                            </a>
                            <a href="#service" class="scrollTop">
                                Nos Services
                            </a>
                            <a href="#tarif" class="scrollTop">
                                Nos Tarifs
                            </a>
                            <a href="#team" class="scrollTop">
                                Notre Equipe
                            </a>
                        </li>
                    </ul>
                    <h1>Contact info</h1>
                    <hr>
                    <p>
                        <i class="fas fa-phone"></i>
                        +243 000 000 000
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i>
                        Exemple@gmail.com
                    </p>
                    <div class="net-work d-flex justify-content-center mt-4">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="block-dash">
                <div class="container">
                    <div class="row">
                        @include('layouts.partials.header.sidebar')
                        <div class="col-lg-9">
                            <div class="text-star">
                                <h1>{{ $chats->first()->client->user->nom.' '.$chats->first()->client->user->prenom }}</h1>
                            </div>
                            <div class="row mt-4">
                                {{-- <div class="col-lg-12">
                                    <div class="card card-lg card-chat">
                                        <div class="content-chat">
                                            @php
                                                $date_envoye = $chats->first()->created_at->format('d-m-Y');
                                                $temp = '1';
                                                $first = '1';
                                            @endphp
                                            @foreach ($chats as $chat)
                                                @php
                                                    if ($date_envoye != $chat->created_at->format('d-m-Y')) {
                                                        $date_envoye = $chat->created_at->format('d-m-Y');

                                                        $temp = '1';
                                                    } else {
                                                        if ($first == '1') {
                                                            $temp = '1';
                                                        } else {
                                                            $temp = '0';
                                                        }
                                                    }
                                                    $first = '0';
                                                @endphp

                                                <div class="date-chat d-flex justify-content-center">
                                                    @if ($temp == '1')
                                                        <span>{{ $date_envoye == now()->format('d-m-Y') ? 'Aujourd\'hui' : $date_envoye }}</span>
                                                    @endif
                                                </div>
                                                @if ($chat->admin_id == null)
                                                    <div class="block-chat-admin">
                                                        <div class="card-chat-sm">
                                                            <p>
                                                                {{ $chat->message }}
                                                            </p>
                                                            <span class="text-end">{{ $chat->created_at->format('H:i') }}</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="block-chat-user">
                                                        <div class="card-chat-sm">
                                                            <p>
                                                                {{ $chat->message }}
                                                            </p>
                                                            <span class="text-end">{{ $chat->created_at->format('H:i') }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="block-writing d-flex align-items-center ">
                                            <form method="post" action="{{ route('admin.chats.store') }}" class="d-flex align-items-center justify-content-between">
                                                @csrf
                                                <input type="hidden" name="client_id" value="{{ $client_id }}">
                                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                                                <button class="btn"> Envoyer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                @livewire('admin-chat', ['getClient' => $client_id])
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

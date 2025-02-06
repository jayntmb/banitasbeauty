@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')
<style>
    .total {
        font-size: 14px;
        font-weight: 400;
        color: #737373;
    }

    .total span:last-child {
        color: #222423;
        font-size: 22px;
        font-weight: 600;
    }
</style>
<div class="banner-sm">
    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-left text-white">
                    <h1>Tableau de bord</h1>
                    <h2>Bonjour, {{ Auth::user()->prenom . ' ' . Auth::user()->nom }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row g-lg-3 g-2">
            <div class="col-lg-12">
                <div class="row g-lg-3 g-2">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.produits') }}">
                            <div class="card card-hover wow h-100">
                                <div class="card-body">
                                    <span class="icon">
                                        <i class="fas fa-tags"></i>
                                    </span>
                                    <div class="text-left">
                                        <h4>Produits en ligne</h4>
                                        <h1 class="mt-0 mt-sm-2 mt-lg-5">{{ $produits->count() }}</h1>
                                        {{-- <p style="font-size: 14px;" class="mt-4"><span><i
                                                    class="fas
                                                        fa-arrow-up"></i>{{$produits->last()->created_at->format('d-m-Y') }}</span>
                                            More visitors than usual </p> --}}
                                    </div>
                                </div>
                            </div>
                            <br>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.commande.client') }}">
                            <div class="card card-hover wow h-100">
                                <div class="card-body pb-0">
                                    <span class="icon">
                                        <i class="fas fa-box"></i>
                                    </span>
                                    <div class="text-left">
                                        <h4>Commandes en ligne</h4>
                                        <h1 class="mt-0 mt-sm-2 mt-lg-5">
                                            {{ $commandes->where('statut_id', 2)->count() }}</h1>
                                        <h5
                                            class="mt-2 mt-sm-2 mt-lg-4 d-flex align-items-center justify-content-end mb-0 total">
                                            <span>Total : </span><span class="ms-1"> {{ $commandes->count() }}</span>
                                        </h5>
                                        {{-- <p style="font-size: 14px;" class="mt-4"><span class=""><i
                                                    class="fas fa-arrow-up"></i>
                                                {{$produits->last()->created_at->format('d-m-Y') }}</span> More visitors
                                            than usual </p> --}}
                                    </div>
                                </div>
                            </div>
                            <br>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.clients') }}">
                            <div class="card card-hover wow h-100">
                                <div class="card-body">
                                    <span class="icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="text-left">
                                        <h4>Clients</h4>
                                        <h1 class="mt-0 mt-sm-2 mt-lg-5">{{ $clients->count() }}
                                        </h1>
                                        {{-- <p style="font-size: 14px;" class="mt-4"><span class=""><i
                                                    class="fas fa-arrow-up"></i>
                                                {{$produits->last()->created_at->format('d-m-Y') }}</span> More visitors
                                            than usual </p> --}}
                                    </div>
                                </div>
                            </div>
                            <br>
                        </a>
                    </div>


                    {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="{{route('admin.chats.index')}}">
                            <div class="card card-hover">
                                <span class="icon bg-red">
                                    <i class="fas fa-handshake"></i>
                                </span>
                                <span class="circle"></span>
                                <div class="card-body">
                                    <div class="text-left">
                                        <h4>Messages</h4>
                                        <h1 class="mt-4">{{ $chats->count() }}</h1>
                                        <p style="font-size: 14px;" class="mt-4"><span class=""><i
                                                    class="fas fa-arrow-up"></i>
                                                {{$produits->last()->created_at->format('d-m-Y') }}</span> More visitors
                                            than usual </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="{{route('admin.mail')}}">
                            <div class="card card-hover">
                                <span class="icon bg-green">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <span class="circle"></span>
                                <div class="card-body">
                                    <div class="text-left">
                                        <h4>NewsLetters</h4>
                                        <h1 class="mt-4">{{ $newsletters->count() }}</h1>
                                        <p style="font-size: 14px;" class="mt-4"><span class=""><i
                                                    class="fas fa-arrow-up"></i>
                                                {{$produits->last()->created_at->format('d-m-Y') }}</span> More visitors
                                            than usual </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-0">
                    <div class="card-body">
                        <h4>Taux des clients</h4>
                        <div class="block-circle  d-flex justify-content-center align-items-center">
                            <div class="content-circle">
                                <div class="circle circle-1">
                                    <div class="circle-move">
                                        <div class="div"
                                            style="background: conic-gradient(#20c997 {{ 100 }}%, transparent 0%);">
                                        </div>
                                    </div>
                                    <div class="circle-white">
                                        {{ $online }}
                                        <span>Connectés</span>
                                    </div>
                                </div>
                                <div class="circle circle-2">
                                    <div class="circle-move">
                                        <div class="div"
                                            style="background: conic-gradient(#f74747 {{ 100 }}%, transparent 0%);">
                                        </div>
                                    </div>
                                    <div class="circle-white">
                                        {{ $offline }}
                                        <span>Non connectés</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card card-table">
                    <div class="card-body">
                        <h4>Listes de Commandes</h4>
                        @if ($commandes->where('statut_id', 2)->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">N° Commande</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Société</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($commandes->where('state', 0) as $key => $commande)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $commande->title }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-user">
                                                            <div class="block-name">
                                                                {{ $commande->user != '' ? $commande->user->nom[0] . Str::upper(substr($commande->user->nom, -1)) : $commande->user->nom[0] }}
                                                            </div>
                                                            {{-- <img src="{{asset('assets/admin/images/avatar.jpg')}}" alt="">
                                                            --}}
                                                        </div>
                                                        {{ $commande->user->nom }}
                                                    </div>
                                                </td>
                                                <td class="date">{{ $commande->user->clients?->first()->societe }}
                                                </td>
                                                <td class="date">Le {{ $commande->created_at->format('d-m-Y') }}
                                                </td>
                                                {{-- <td>
                                                    <div class="badge {{$devi->state}}">{{$devi->state}}</div>
                                                </td> --}}
                                                {{-- <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{route('admin.commande',$devi->id)}}" class="btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{route('admin.commande.delete',$devi->id)}}" class="btn">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td> --}}
                                                {{-- <td data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvas-demande_{{ $key }}"
                                                    aria-controls="offcanvasRight">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        @php
                                                        $cmmd = App\Models\Commande::where('user_id', $devi->user->id)
                                                        ->get()
                                                        ->count();
                                                        $repCmmd = App\Models\Commande::where('user_id',
                                                        $devi->user->id)->where('state', 0)->get()

                                                        ->count();
                                                        $prd = ($repCmmd / $cmmd) * 100;
                                                        @endphp
                                                        <div class="circle">
                                                            <div class="circle-move"
                                                                style="background: conic-gradient( #20c997 {{ $prd }}%, transparent 0%);">
                                                            </div>
                                                            <div class="circle-white">
                                                                <span>{{ $repCmmd }}</span>/<span>{{ $cmmd }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end pe-3">
                                <a href="{{ route('admin.commande.client') }}" class="more">Voir</a>
                            </div>
                        @else
                            <div class="block-empty-table">
                                <i class="fas fa-shopping-cart"></i>
                                <h3>Aucune commande </h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card wow">

                            <div class="card-body">
                                <h4 style="font-size: 20px;">Utilisateurs
                                    géolocalisation</h4>
                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <table class="table
                                                table-responsive-sm">
                                            <tbody>
                                                <tr>

                                                    <td>RD.congo</td>
                                                    <td>Kinshasa</td>
                                                    <td>2.320</td>
                                                    <td>42.18%</td>
                                                </tr>
                                                <tr>

                                                    <td>RD.congo</td>
                                                    <td>Kinshasa</td>
                                                    <td>2.320</td>
                                                    <td>42.18%</td>
                                                </tr>
                                                <tr>

                                                    <td>RD.congo</td>
                                                    <td>Kinshasa</td>
                                                    <td>2.320</td>
                                                    <td>42.18%</td>
                                                </tr>
                                                <tr>

                                                    <td>RD.congo</td>
                                                    <td>Kinshasa</td>
                                                    <td>2.320</td>
                                                    <td>42.18%</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mapcontainer">
                                            <div id="vmap" class="vmap
                                                    img-fluid" style="height: 400px"></div>
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
</div> --}}
@php
    use App\Models\Devise;
    $devises = Devise::all();
@endphp
{{-- @foreach ($devis as $key => $devi)

<div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande_{{ $key }}"
    aria-labelledby="offcanvasRightLabel" style="width: 700px">
    <form action="{{ route('admin.devis.update') }}" method="POST" class="devis">
        @csrf
        <div class="offcanvas-header px-md-4">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail devis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-md-4">
            <div class="block-banner-custom mb-2 mb-md-4">
                <div class="container-fluid px-0">
                    <div class="row align-items-center">
                        <input type="hidden" value="{{$user->id}}" name="user_id">
                        <div class="col-lg-2 pe-0">
                            <div class="block-name-custom">
                                {{ $user->nom != '' ? $user->nom[0] . Str::upper(substr($user->nom, -1)) : $user->nom[0]
                                }}
                            </div>
                        </div>
                        <div class="col-lg-8 ps-0">
                            <h5>{{ $user->nom }}</h5>
                            <div class="block-items d-flex aling-items-center">
                                <div class="items">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="items">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $user->contacts?->first()?->telephone }}</span>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-md-4 px-3">
                <h6>Liste devis </h6>
            </div>
            <div class="px-md-4 px-3">
                @if ($user->devisclient->count() > 0)
                @foreach ($user->devisclient->where('state', '0') as $devis)
                <div class="col-6 mb-3">
                    <h5 class="mb-0" style="font-size: 16px; color: #222423;font-weight:600;">{{ $devis->title }}</h5>
                    <span style="font-size: 12px; color: #8f9794;">{{ $devis->created_at->diffForHumans() }}</span>
                </div>
                @foreach ($devis->commandes->where('statut_id', '1') as $commande)
                <div class="bock-lits-demande">
                    <div class="demande">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <img src="{{ asset('storage/images/produits/' . $commande->produit?->image) }}" alt="">
                            </div>
                            <div class="col-6">
                                <h5>{{ $commande->produit?->nom }}</h5>
                                <p>{{ $commande->produit?->categorie->libelle }}</p>
                                <p>{{ $commande->quantite }}</p>
                                <p>{{ $commande->created_at->format('d-m-Y') }}</p>

                            </div>
                            <div class="col-3 ms-auto ps-0">
                                <input type="hidden" name="id[]" value="{{ $commande->id }}">
                                <div class="input-group">
                                    <input type="text" class="form-control w-75" placeholder="Prix" name="price[]"
                                        value="{{$commande->prix}}" {{$commande->prix == null ? '': 'readonly'}}
                                    >
                                    <select name="devise_id[]" class="form-control w-25">
                                        @foreach ($devises as $devise)
                                        <option value="{{ $devise->id }}"> {{ $devise->symbole }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="block-action-btn d-flex justify-content-end pe-0">
                    <button type="submit" class="btn btn-primary">Repondre</button>
                </div>
                @endforeach
                @else
                <h3>Aucun devis</h3>
                @endif
            </div>
        </div>



    </form>
</div>
@endforeach --}}

@include('admin.layouts.partials.header.sidebar')

<!-- @include('admin.layouts.partials.header.sidebar-secondary') -->
@endsection

@section('script')
@endsection

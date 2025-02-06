@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')

<div class="banner-sm" id="home">
    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
    <div class="container">
        <h1 class="fadeUp wow animate__animated animate__fadeIn">Passer Commande</h1>
    </div>

</div>
<div class="content-panier">
    <div class="container">
        <div class="row">
            <form class="devis" action="{{route('commandes.store')}}">
                @csrf
                <div class="col-lg-9">
                    <input type="hidden" name="devis_id" id="devis_id" value="{{$devis->id}}">
                    <input type="hidden" name="user_id" class="form-control" value="{{$devis->user->id}}">
                    @foreach ($devis->commandes->where('prix', '!=', null) as $key => $commande)
                        <div class="card card-product-cart">
                            <div class="row align-items-center">
                                <div class="col-lg-1">
                                    <input type='checkbox' class="checkbox">
                                </div>
                                <div class="col-lg-2">
                                    <div class="img-product">
                                        <a href="{{ route('detal-product', [$commande->produit->id]) }}">
                                            <img src="{{ asset('storage/images/produits/' . $commande->produit->image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ route('detal-product', [$commande->produit->id]) }}">
                                        <h5>{{ $commande->produit->nom }}</h5>
                                    </a>
                                    <p>{{ $commande->produit?->categorie->libelle }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        {{-- <input type="hidden" name="produit_id[]" value="{{$commande->produit_id}}" />
                                        --}}
                                        {{-- <input type="hidden" name="commande[]"
                                            value="{{$commande->produit->nom}}  Qté : {{$commande->quantite}}  P.U: {{$commande->prix}} Total:{{$commande->prix_total}}  " />
                                        --}}
                                        <input type="hidden" name="commande[{{$key}}][nom]"
                                            value="{{$commande->produit->nom}}">
                                        <input type="hidden" name="commande[{{$key}}][quantite]"
                                            value="{{$commande->quantite}}">
                                        <input type="hidden" name="commande[{{$key}}][prix]" value="{{$commande->prix}}">
                                        <input type="hidden" name="commande[{{$key}}][symbole]"
                                            value="{{$commande->devise->symbole}}">
                                        <input type="hidden" name="commande[{{$key}}][prix_total]"
                                            value="{{$commande->prix_total}}">

                                        @livewire('commande', ['commande' => $commande])
                                    </div>
                                </div>
                                <div class="col-lg-2 ">
                                    <a href="{{ route('commande.delete', [$commande->id]) }}"
                                        class="btn btn-delete">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="block-action-btn d-flex justify-content-between align-items-center mt-2">
                        <div class="block-total">
                            <h6>Total</h6>
                            <p>{{$devis->prix() }} </p>
                        </div>
                        <input type="submit" class="btn btn-success" value="Commandez">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
@endsection

@section('script')
{{--
<script>
    const input_value = $('.form-control').attr('value');
    btnplus = document.querySelector(".btn-plus");
    btnplus = document.querySelector(".btn-moins");
    console.log(input_value);
    btnplus.addEventListener("click", () => {
        alert("coucou")
        input_value++
    })
</script> --}}
<script>
    document.querySelector('.devis').addEventListener('submit', function (event) {
        event.preventDefault();
        let form = event.target;
        let data = new FormData(form);
        let checkboxes = form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            if (!checkbox.checked) {
                let card = checkbox.closest('.card-product-cart');
                let inputs = card.querySelectorAll('input[type="hidden"]');
                inputs.forEach(function (input) {
                    data.delete(input.name);
                });
            }
        });
        fetch(form.action, {
            method: form.method,
            body: data
        }).then(function (response) {
            console.log(response);
        });
    });
</script>
@endsection
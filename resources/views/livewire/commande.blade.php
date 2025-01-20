<div>
    <div class="block-quantity d-flex align-items-center">
        <button type="button" class="btn btn_moins" wire:click='moins'>-</button>
        {{-- <input type="text" name="quantite" class="form-control" value="{{$panier->quantite}}" > --}}
        <input type="text" name="quantite" class="form-control" value="{{$add}}">
        <button type="button" class="btn btn_plus" wire:click='add'>+</button>
        {{-- <input class="btn {{$show == 0 ? 'd-none':''}}" id="change" value="Change" wire:click='update({{$panier->id}})' /> --}}
    </div>
    <div class="justify-content-center mx-auto">
        <p>Prix : {{$prix}} {{$devise}} </p>
        <p>Total : {{$total}} {{$devise}}</p>
    </div>

</div>

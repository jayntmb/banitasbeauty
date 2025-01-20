<div>
    <div class="block-quantity d-flex align-items-center">
        <button type="button" class="btn btn_moins ps-0" wire:click='moins'>-</button>
        {{-- <input type="text" name="quantite" class="form-control" value="{{$panier->quantite}}" > --}}
        <input type="text" name="quantite" class="form-control" value="{{$add}}" >
        <button type="button" class="btn btn_plus" wire:click='add'>+</button>
        {{-- <input class="btn {{$show == 0 ? 'd-none':''}}" id="change" value="Change" wire:click='update({{$panier->id}})' /> --}}
    </div>
</div>

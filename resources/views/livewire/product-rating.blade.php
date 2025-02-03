<div>
    <div class="d-flex align-items-center gap-lg-2 gap-3">
        <div class="d-flex block-rate align-items-center gap-2">
            @for ($i = 1; $i <= 5; $i++)
                <i class="bi bi-star-fill lg {{ $i <= $averageRating ? 'active' : '' }}" wire:click="rate({{ $i }})"
                    style="cursor: pointer;"></i>
            @endfor
        </div>
        <div class="label">
            {{ $totalRatings }} Avis
        </div>
    </div>
</div>

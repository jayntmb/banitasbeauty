<div class="icon" >
    <i class="bi bi-bell fas fa-bell"></i>
    <span wire:poll.keep-alive>
        @if ($notifs->count() > 0)
            @if (Auth::user()->role_id != 1)
                <span class="number"> {{ $notifs->count() }} </span>
            @else
                <span class="active"></span>
            @endif
        @endif
    </span>
</div>

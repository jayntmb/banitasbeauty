<div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
        wire:ignore.self>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" wire:poll.keep-alive>
            @if ($notifications->count() < 1)
                <div class="block-empty">
                    <i class="fas fa-bell"></i>
                    <p>Vous n'avez aucune notifications pour l'instant.</p>
                </div>
            @else
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" wire:click='deleteall()' class="btn-clean">Effacer tous</a>
                    <span class="NumNotif" style="color: #737373; font-size: 14px">(1)</span>
                </div>
                @foreach ($notifications as $notif)
                    <div class="block-all-notif">
                        <div class="card card-notif">
                            <div class="close-card-notif" wire:click='delete({{ $notif }})'>
                                <i class="fas fa-times"></i>
                            </div>
                            <a href="javascript::void(0)" class="{{ $notif->read_at != null ? 'readed' : '' }} "
                                wire:click="gotoNotif({{ $notif }})">
                                <div class="block-avatar">
                                    <div class="block-name">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                </div>
                                <div class="content-notif">
                                    <h6> {{ $notif->data['subject'] }} </h6>
                                    <p>{{ $notif->data['content'] }}</p>
                                    <small class="date text-end d-block" style="color: #737373;font-size:12px;">
                                        {{ $notif->created_at }}</small>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-none position-absolute h-100 w-100 d-flex justify-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, .95); z-index:99" wire:loading
            wire:target="gotoNotif, deleteall, delete" wire:loading.class.remove="d-none">
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

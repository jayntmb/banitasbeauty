<div class="navbottom">
    <div class="content-nav d-flex justify-content-between align-items-center">
        @if (Auth::user()->role_id == '5')
            <a class="{{ session()->get('active') == '5' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-house-fill"></i>
                <span>Accueil</span>
            </a>
        @endif

        <a class="{{ session()->get('active') == '8' ? 'active' : '' }}" href="{{ route('notifications.index') }}">
            <i class="bi bi-send-fill"></i>
            <span>Message</span>
        </a>
        <a href="" class="block-cart-sm">
            <i class="bi bi-bag-fill"></i>
            <span>Panier</span>
        </a>
        @if (Auth::user()->role_id == '5')
            <a class="{{ session()->get('active') == '7' ? 'active' : '' }}" href="{{ route('commandes.index') }}">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Devis</span>
            </a>

            <a class="{{ session()->get('active') == '6' ? 'active' : '' }}" href="{{ route('profils.edit') }}">
                <i class="bi bi-person-fill"></i>
                <span>Profil</span>
            </a>

        @endif
    </div>
</div>

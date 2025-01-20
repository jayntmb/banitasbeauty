@php
    $chat = App\Models\Chat::where('client_id',Auth::user()->client?->id)->where('seen',1)->where('send_name','user')->get()->count();
@endphp
<div class="col-lg-3">
    <div class="block-nav">
        <ul>
            @if (Auth::user()->role_id == '5')
                <li>
                    <a class="{{ session()->get('active') == '5' ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> Tableau de bord</a>
                </li>
                <li>
                    <a class="{{ session()->get('active') == '7' ? 'active' : '' }}" href="{{ route('commandes.index') }}"><i class="bi bi-file-earmark-text-fill"></i>Devis demandés</a>
                </li>
                <li>
                    <a class="{{ session()->get('active') == '8'? 'active' : '' }} link" href="{{ route('commandes.client') }}"><i class="bi bi-cart-fill"></i>Commandes</a>
                </li>
                <li>
                    <a class="{{ session()->get('active') == '9' ? 'active' : '' }}" href="{{ route('notifications.index') }}"><i class="bi bi-chat-fill"></i>Messages</a>
                </li>
                <li>
                    <a class="{{ session()->get('active') == '6' ? 'active' : '' }}" href="{{ route('profils.edit') }}"><i class="bi bi-gear-fill"></i>Paramètres</a>
                </li>
            @endif
        </ul>
    </div>
</div>

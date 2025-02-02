<div class="menu">
    <div class="btn-menu send">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="block-logo">
        <a href="/administratiton/tableau-de-bord">
            <img src="{{ asset('assets/images/logo-phar.png') }}" alt="">
            <img src="{{ asset('assets/images/pill-2.png') }}" alt="">
        </a>
    </div>
    <div class="content-link">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->is('administratiton/tableau-de-bord') ? 'active' : '' }} link"><i
                        class="fas fa-home"></i> <span class="title">Tableau de bord</span></a>
            </li>
            <li>
                <a href="{{ route('admin.produits') }}"
                    class="{{ request()->is('administratiton/tableau-de-bord/produits') ? 'active' : '' }} link"><i
                        class="fas fa-tags"></i> <span class="title">Gestion de Produits</span></a>
            </li>
            <li>
                <a href="{{ route('admin.commande.client') }}"
                    class="{{ request()->is('administratiton/tableau-de-bord/client/commandes') ? 'active' : '' }} link"><i
                        class="fas fa-shopping-cart"></i> <span class="title">Gestion de Commande</span></a>
            </li>
            {{-- <li>
                    <a href="{{ route('admin.categories') }}" class="{{request()->is('administratiton/tableau-de-bord/categories') ? 'active' : '' }} link"><i class="fas fa-box"></i> <span class="title">Catégories</span></a>
                </li> --}}
            {{-- <li>
                    <a href="{{ route('admin.categories') }}" class="{{request()->is('administratiton/tableau-de-bord/Mail') ? 'active' : '' }} link"><i class="fas fa-envelope"></i><span class="title">Mails</span></a>
                </li> --}}
            <li>
                <a href="{{ route('admin.clients') }}"
                    class="{{ request()->is('administratiton/tableau-de-bord/clients') ? 'active' : '' }} link"><i
                        class="fas fa-users"></i> <span class="title">Gestion des Clients</span></a>
            </li>
            <li>
                <a href="{{ route('admin.gestion.images') }}"
                    class="{{ request()->is('gestion-image') ? 'active' : '' }} link"><i class="fas fa-image"></i>
                    <span class="title">Gestion de contenu</span></a>
            </li>
            <li>
                <a href="{{ route('profils.edit') }}"
                    class="{{ request()->is('mon-profil') ? 'active' : '' }} link"><i class="fas fa-cogs"></i> <span
                        class="title">Paramètres</span></a>
            </li>
            {{-- <li>
                    <a href="{{ route('admin.partenaires') }}" class="{{ request()->is('administratiton/tableau-de-bord/partenaires') ? 'active' : '' }} link"><i class="fas fa-handshake"></i> <span class="title">Partenaires</span></a>
                </li> --}}

            {{-- <li>
                    <a href="{{ route('admin.categories') }}" class="{{ session()->get('admin') == '5' ? 'active' : '' }} link"><i class="fas fa-id-badge"></i> Sponsors</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="{{ session()->get('admin') == '6' ? 'active' : '' }} link"><i class="fas fa-id-badge"></i> Categories</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="{{ session()->get('admin') == '7' ? 'active' : '' }} link"><i class="fas fa-id-badge"></i> Categories</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="{{ session()->get('admin') == '8' ? 'active' : '' }} link"><i class="fas fa-handshake"></i> Rendez-vous</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="{{ session()->get('admin') == '9' ? 'active' : '' }} link"><i class="fas fa-envelope"></i> NewsLetters</a> --}}
            </li>
        </ul>
        {{-- <h4>Système</h4>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('administratiton/tableau-de-bord') ? 'active' : '' }} link"><i class="fas fa-cog"></i> <span class="title">Paramètres</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('administratiton/tableau-de-bord') ? 'active' : ''}} link"><i class="fas fa-pen"></i> <span class="title">A propos</span></a>
                </li>
            </ul> --}}
    </div>
    <div class="footer-menu">
        <p>Developed by <a href="https://www.newtech-rdc.net/" target="_blank">
                Vincent
            </a></p>
        <a href="https://www.newtech-rdc.net/" target="_blank" class="icon">
            <i class="fas fa-link"></i>
        </a>
    </div>
</div>

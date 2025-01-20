<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="left d-flex align-items-center justify-content-between justify-content-md-start">
            <div class="menu-toggle me-2">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a class="navbar-brand me-md-0 ms-md-0" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo-phar.png') }}" alt="logo-pharmans" class="d-none d-sm-block">
                <img src="{{ asset('assets/images/pill-2.png') }}" alt="logo-pharmans" class="d-block d-sm-none">
            </a>
            {{-- <div class="btn-search-nav">
                <i class="bi bi-search"></i>
            </div> --}}
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ session()->get('active') == '0' ? 'active' : '' }} me-3" aria-current="page"
                        href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ session()->get('active') == '1' ? 'active' : '' }} me-3"
                        href="{{ route('about') }}">Qui sommes-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ session()->get('active') == '2' ? 'active' : '' }} me-3"
                        href="{{ route('produits') }}">Nos produits</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link {{ session()->get('active') == '3' ? 'active' : '' }} me-3"
                        href="{{ route('engagements') }}">Nos engagements</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{ session()->get('active') == '4' ? 'active' : '' }}"
                        href="{{ route('contacts') }}">Contact</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            @auth
                <div class="icon">
                    <a class="cart d-flex align-items-center" href="#" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        @livewire('notification-bell')
                    </a>
                </div>
                @if (Auth::user() && Auth::user()->role_id == 5)
                    <a href="{{ route('panier.index') }}" class="cart d-flex align-items-center">
                        <div class="icon">
                            <i class="bi bi-bag"></i>
                            <span class="number">{{ session()->get('panier_count') }}</span>
                        </div>
                    </a>
                    <div class="block-user-icon">
                        <a href="#" class="profil-user d-flex align-items-center justify-content-center">
                            <div class="user">
                                <span>{{ Auth::user()->prenom != '' ? Auth::user()->prenom[0] . Auth::user()->nom[0] : Auth::user()->nom[0] }}</span>
                            </div>
                        </a>
                        <div class="dropmenu">
                            <div class="content">
                                <h6>Salut {{ Auth::user()->prenom }}</h6>
                                <ul>
                                    <li>
                                        <a href="{{ route('dashboard') }}">Tableau de bord</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('commandes.index') }}">Devis demandés</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('commandes.client') }}">Commandes</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('notifications.index') }}">Messages</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="block-user-icon">
                        <a href="#" class="profil-user d-flex align-items-center justify-content-center">
                            <div class="user">
                                <span>{{ Auth::user()->prenom != '' ? Auth::user()->prenom[0] . Auth::user()->nom[0] : Auth::user()->nom[0] }}</span>
                            </div>
                        </a>
                        <div class="dropmenu">
                            <div class="content">
                                <h6>Salut {{ Auth::user()->prenom }}</h6>
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="btn">{{ Auth::user() != null ? 'Mon compte' : 'Se Connecter' }}</a>
            @endauth
        </div>
        @includeWhen($contentSearchBar, 'components.search-bar')
    </div>

</nav>

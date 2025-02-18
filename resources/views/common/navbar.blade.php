<header class="fixed-top header-nav {{ $showNavPage ? 'header-white' : '' }}">
    <nav class="navbar navbar-expand-lg">
        <div class="content-nav w-100">
            <div class="container-fluid px-lg-5">
                <div class="row g-lg-3 g-1 align-items-center">
                    <div class="col-lg-5 col-3">
                        <div class="btn-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-0 mb-lg-0 gap-lg-4">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/boutique">BOUTIQUE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/entreprise">ENTREPRISE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/astuceBeaute">ASTUCES BEAUTÉ </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">CONTACT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-3 mx-auto">
                        <div class="d-flex justify-content-center">
                            <a href="/" class="logo">
                                <img src="{{ asset('images/logos/logo-white.png') }}" class="logo-white"
                                    alt="logo de Banitas">
                                <img src="{{ asset('images/logos/logo-banitasbeauty.png') }}" class="logo-hidden"
                                    alt="logo de Banitas">
                                <img src="{{ asset('images/logos/logo-banitasbeauty.png') }}" class="logo-dark"
                                    alt="logo de Banitas">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-4">
                        <div class="d-flex align-items-center gap-lg-4 gap-2 justify-content-end">
                            <a href="#" class="link-icon-nav">
                                <svg viewBox="0 0 24 24" width="512" height="512">
                                    <path
                                        d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z">
                                    </path>
                                </svg>
                            </a>
                            <a href="{{ route('favorites') }}" class="link-icon-nav">
                                <svg viewBox="0 0 24 24" width="512" height="512">
                                    <path
                                        d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                                    </path>
                                </svg>
                            </a>
                            @auth
                                @if (auth()->user()->role_id == 1)
                                    <a href="{{ route('admin.dashboard') }}" class="link-icon-nav">
                                        <svg viewBox="0 0 24 24" width="512" height="512">
                                            <path d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-4,21.164v-.164c0-2.206,1.794-4,4-4s4,1.794,4,4v.164c-1.226.537-2.578.836-4,.836s-2.774-.299-4-.836Zm9.925-1.113c-.456-2.859-2.939-5.051-5.925-5.051s-5.468,2.192-5.925,5.051c-2.47-1.823-4.075-4.753-4.075-8.051C2,6.486,6.486,2,12,2s10,4.486,10,10c0,3.298-1.605,6.228-4.075,8.051Zm-5.925-15.051c-2.206,0-4,1.794-4,4s1.794,4,4,4,4-1.794,4-4-1.794-4-4-4Zm0,6c-1.103,0-2-.897-2-2s.897-2,2-2,2,.897,2,2-.897,2-2,2Z">
                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="/profile" class="link-icon-nav">
                                        <svg viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-4,21.164v-.164c0-2.206,1.794-4,4-4s4,1.794,4,4v.164c-1.226.537-2.578.836-4,.836s-2.774-.299-4-.836Zm9.925-1.113c-.456-2.859-2.939-5.051-5.925-5.051s-5.468,2.192-5.925,5.051c-2.47-1.823-4.075-4.753-4.075-8.051C2,6.486,6.486,2,12,2s10,4.486,10,10c0,3.298-1.605,6.228-4.075,8.051Zm-5.925-15.051c-2.206,0-4,1.794-4,4s1.794,4,4,4,4-1.794,4-4-1.794-4-4-4Zm0,6c-1.103,0-2-.897-2-2s.897-2,2-2,2,.897,2,2-.897,2-2,2Z">
                                            </path>
                                        </svg>
                                    </a>
                                @endif
                            @else
                                <a href="/connexion" class="link-icon-nav">
                                    <svg viewBox="0 0 24 24" width="512" height="512">
                                        <path
                                            d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-4,21.164v-.164c0-2.206,1.794-4,4-4s4,1.794,4,4v.164c-1.226.537-2.578.836-4,.836s-2.774-.299-4-.836Zm9.925-1.113c-.456-2.859-2.939-5.051-5.925-5.051s-5.468,2.192-5.925,5.051c-2.47-1.823-4.075-4.753-4.075-8.051C2,6.486,6.486,2,12,2s10,4.486,10,10c0,3.298-1.605,6.228-4.075,8.051Zm-5.925-15.051c-2.206,0-4,1.794-4,4s1.794,4,4,4,4-1.794,4-4-1.794-4-4-4Zm0,6c-1.103,0-2-.897-2-2s.897-2,2-2,2,.897,2,2-.897,2-2,2Z">
                                        </path>
                                    </svg>
                                </a>
                            @endauth
                            @livewire('cart-icon')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

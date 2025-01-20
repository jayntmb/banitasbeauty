<footer>
    @php
        use App\Models\SiteInfo;
        $info = SiteInfo::first();
    @endphp
    <div class="container">
        <div class="row g-lg-4 g-3">
            <div class="col-lg-3">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo-phar-white.png') }}" alt="">
                </a>
                <p>
                    Spécialiste dans la distribution et <br> la promotion des produits <br> pharmaceutiques depuis plus
                    de
                    30 ans
                </p>
            </div>
            <div class="col-lg-2">
                <h5>A propos</h5>
                <ul>
                    <li>
                        <a href="{{ route('about') }}">
                            Qui sommes-nous
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produits') }}">
                            Nos produits
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('engagements') }}">
                            Nos engagements
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}">
                            Contactez-nous
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5>Contact</h5>
                <ul>
                    <li>
                        <a href="tel:+243852591175">
                            {{ $info->phone }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:contact@pharmans.com">{{ $info->email }}</a>
                    </li>
                </ul>
                <p>
                    Lun - Ven de 8h à 16h <br> Sam de 8h à 14h
                </p>
            </div>
            <div class="col-lg-2">
                <h5>Adresse</h5>
                <h6 class="text-white">PHARMANS</h6>
                <p>{{ $info->addresse }} </p>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <h5>
                        <i class="bi bi-envelope-open"></i>
                        S'enregistrer pour la newsletter
                    </h5>
                    <p>
                        Abonnez-vous à la newsletter hebdomadaire pour toutes les dernières mises à jour
                    </p>
                    <form method="post" action="{{ route('newsletters') }}" class="form-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <button class="btn">Souscrire</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="net-work d-flex justify-content-star w-100">
                    <a href="https://www.facebook.com/Pharmans" tagert="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.linkedin.com/company/pharmans" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="commande d-flex align-items-center justify-content-end">
                    <div class="text d-flex align-items-center">
                        <i class="bi bi-file-earmark-text"></i>
                        <h6>
                            Demannde de <br> devis
                        </h6>
                    </div>
                    <a href="tel:+243852591175">
                        {{ $info->phone }}
                    </a>
                </div>
            </div>
        </div>
        <hr class="bg-white" style="opacity: .1;">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-star">
                    <small class="text-center">Copyright © 202 Pharmans. All Rights Reserved.</small>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-end">
                    <small class="text-center">Designed by <a href="https://newtech-rdc.net" target="_blank">Newtech
                            Consulting</a></small>
                </div>
            </div>
        </div>
    </div>
</footer>

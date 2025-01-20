@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>

            <div class="banner-engagement" id="home">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="content">
                                <h1 class="fadeUp wow animate__animated animate__fadeIn">La qualité est notre exigence n°1
                                </h1>
                                <p class="fadeUp wow animate__animated animate__fadeIn">
                                    Chez Pharmans, nous ne transigeons pas sur la qualité de nos médicaments. Depuis
                                    1985, nous avons développé une forte expertise dans la distribution et la promotion de
                                    médicaments pour soulager les maux du quotidien. Cette qyalité s’appuie en amont sur des
                                    processus d’achat rigoureux et sélectif, et en aval, sur des contrôles à chaque étape du
                                    cycle de distribution. Objectif : garantir un standard de qualité très élevé.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg">
                    <img src="{{ $images[0]->path }}" alt="img">
                </div>
            </div>
            <div class="block-engagement">
                <div class="container">
                    <div class="row mb-5 g-lg-5 g-4">
                        <div class="col-lg-6">
                            <h3 class="fadeUp wow animate__animated animate__fadeIn">Notre responsabilité pharmaceutique
                            </h3>
                            <h4 class="fadeUp wow animate__animated animate__fadeIn">En tant qu’acteur majeur du secteur
                                pharmaceutique, la sécurité de nos médicaments, et donc de nos clients, régit notre activité
                            </h4>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Parce que cette exigence doit être réévaluée sans relâche, nous menons régulièrement des
                                audits (internes et externes) sur l’ensemble des systèmes de gestion de la qualité et des
                                pratiques au sein de nos unités.
                            </p>
                            <div class="card fadeUp wow animate__animated animate__fadeIn">
                                <img src="{{ $images[1]->path}}" alt=""
                                    class="fadeUp wow animate__animated animate__fadeIn">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="fadeUp wow animate__animated animate__fadeIn">Membre actif de la FEC </h3>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                <img src="{{ asset('assets/images/fec.png') }}" alt="img"
                                    class="img-float fadeUp wow animate__animated animate__fadeIn">
                                Pharmans est membre actif de la FEC (Fédération des Entreprises Congolaises) à travers
                                notamment la présence de son Administrateur Directeur Général YVON CIZUBU MBAYI MANSANGA
                                président des grossites importateurs pharmaceutique pour une automédication responsable.
                            </p>
                            <div class="card mt-5 fadeUp wow animate__animated animate__fadeIn">
                                <img src="{{ $images[2]->path }}" alt="" class="img-filter">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-med" id="info-lutte-contre-medicament-rue">
                    <div class="container">
                        <div class="row g-lg-5 g-4">
                            <div class="col-lg-6">
                                <div class="card fadeUp wow animate__animated animate__fadeIn">
                                    <img src="{{ $images[3]->path }}" alt="img-pharmans">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="fadeUp wow animate__animated animate__fadeIn">Lutter contre les médicaments de la
                                    rue : ce poison qui tue </h3>
                                <h4 class="fadeUp wow animate__animated animate__fadeIn">Notre objectif pour les années à
                                    venir : sensibiliser le grand public aux risques liés à la prise d’un médicament de la
                                    rue et inciter à consulter un professionnel de santé pour se soigner</h4>
                                <p class="fadeUp wow animate__animated animate__fadeIn">
                                    Véritable fléau, les médicaments de la rue sont vendus en masse : selon l’OMS, les
                                    traitements falsifiés contre le paludisme entraîneraient le décès d’environ 150 000
                                    enfants africains âgés de moins de 5 ans en 2013.
                                </p>
                                <p class="fadeUp wow animate__animated animate__fadeIn">
                                    De quoi s’agit-il ? ce sont des produits contrefaits (surdosés, sous-dosés ou contenant
                                    d’autres substances) ou détournés du circuit légal de distribution et stockés sans
                                    respect des règles d’usage sanitaire. Cependant, les risques restent méconnus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row g-lg-5 g-4">
                        <div class="col-12 text-center">
                            <h2 class="fadeUp wow animate__animated animate__fadeIn">Les professionnels de santé et les
                                patients</h2>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="fadeUp wow animate__animated animate__fadeIn">Pour une automédication toujours plus
                                responsable</h3>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Le médicament n’est pas un produit comme un autre. Aujourd’hui nous recourrons de plus en
                                plus à l’automédication. Quand bien même nos produits sont présents et utilisés dans tous
                                les foyers pour soulager les maux du quotidien (douleurs, fièvre, sommeil), il convient de
                                ne pas banaliser leur usage.
                            </p>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Nous avons la conviction que chacun peut devenir un acteur autonome et responsable de sa
                                santé au quotidien. C’est pourquoi Pharmans s’engage aux côtés des patients et des
                                professionnels de santé pour accompagner une automédication responsable en toute sécurité.
                                Objectif : favoriser le bon usage de nos médicaments. Dans cette démarche, Pharmans œuvre
                                pour :
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li class="fadeUp wow animate__animated animate__fadeIn">
                                    Sensibiliser les patients par des conseils par une information accessible à tous,
                                    notamment la mise à disposition de contenus en ligne, par exemple, sur notre site web.
                                </li>
                                <li class="fadeUp wow animate__animated animate__fadeIn">
                                    Informer et « outiller » les professionnels de la santé, notamment les pharmaciens qui,
                                    dans leur officine, jouent un rôle clé auprès des patients.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

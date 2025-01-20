@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="banner-sm" id="home">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt=""
            class="img-pill">
        <div class="container">
            <h1 class="fadeUp wow animate__animated animate__fadeIn">Qui sommes-nous ?</h1>
        </div>
    </div>
    <div class="about" id="about">
        <div class="container">
            <div class="row g-3 g-sm-5 g-lg-5">
                <div class="col-lg-12 col-sm-12">
                    <div class="row g-3 g-sm-5 g-lg-5">
                        <div class="col-lg-6">
                            <div class="card fadeUp wow animate__animated
                                animate__fadeIn">
                                <img src="{{ $images[0]->path }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="fadeUp wow animate__animated
                                animate__fadeIn">Spécialiste de produits
                                pharmaceutiques
                                depuis plus de 30 ans</h1>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Pharmans est une entreprise familiale dont le cœur
                                de l’activité se situe à Kinshasa. Fondée
                                en 1988
                                après la fusion de deux
                                pharmacies HYGIENE & SANTÉ et Pharmacie RAMELLE sous
                                l’initiative
                                de Mr YVON CIZUBU MBAYI MANSANGA.
                            </p>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Depuis 2009, Pharmans a connu une mutation pour
                                devenir un
                                Établissement de Distribution en Gros des Produits
                                pharmaceutiques,
                                et le Représentant des laboratoires pharmaceutiques
                                tels que DENK
                                PHARMA, PHARMA-5 , ALIMIRALL et ELEA, ...
                            </p>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Pharmans est spécialisée dans la commercialisation,
                                la promotion et la distribution de
                                produits
                                pharmaceutiques de qualité sur le continent
                                africain.
                            </p>
                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Pharmans travaille en partenariat d’une part avec
                                les centrales d’achats étatiques et
                                d’autre part
                                avec les pharmacies hospitalières et privées.
                            </p>

                            <p class="fadeUp wow animate__animated animate__fadeIn">
                                Pharmans est en mesure de répondre à tous les
                                besoins pharmaceutiques, aussi bien à travers
                                les
                                réseaux de grossistes privés qu'à travers les
                                appels d'offres.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h3 class="title-middle fadeUp wow animate__animated animate__fadeIn">Agence
                Pharmans</h3>
        </div>
    </div>
    <div class="block-promos">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col-lg-6 px-0 col-md-6">
                    <div class="block-dis">
                        <img src="{{ asset('assets/images/bg-5.jpg') }}" alt="">
                        <h3 class="fadeUp wow animate__animated animate__fadeIn">
                            Distribution
                        </h3>
                        <p class="fadeUp wow animate__animated animate__fadeIn">
                            Notre distribution au service des laboratoires s’attache
                            à respecter les bonnes pratiques de
                            distribution par l’optimisation constante d’une
                            logistique maîtrisée depuis l’import des
                            produits
                            jusqu’à leur acheminement final.
                        </p>
                        <a href="#">
                            Votre distribution en détails
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 px-0 col-md-6">
                    <div class="block-promo">
                        <img src="{{ asset('assets/images/bg-6.jpg') }}" alt="">
                        <h3 class="fadeUp wow animate__animated animate__fadeIn">
                            Promotion</h3>
                        <p class="fadeUp wow animate__animated animate__fadeIn">Notre
                            promotion s’adapte aux besoins et
                            demandes
                            des marchés africains grâce à un contact quotidien avec
                            les patients, les prescripteurs, les
                            pharmaciens et les grossistes locaux. </p>
                        <a href="#">Voir promotion en détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <p class="fadeUp wow animate__animated animate__fadeIn">
                        Notre expérience de 30 ans sur le marché africain et notre
                        réseau de partenaires fabricants
                        rigoureusement sélectionnés, nous permettent de répondre aux
                        besoins de tous les acteurs publics et
                        privés de la santé avec des produits de qualité reconnue à
                        des prix compétitifs.
                        Notre mission est de contribuer à l'accès à des médicaments
                        de qualité pour tous.
                    </p>
                    <p class="fadeUp wow animate__animated animate__fadeIn">
                        Pharmans dispose d'une vaste gamme de produits. Ceux-ci
                        comprennent aussi bien des médicaments
                        génériques hospitaliers phares tels que Paraceta-M® ,
                        Polyvita-M®, Amoxycla-M® , que des médicaments
                        de
                        pointe anti-cancéreux, des gonadotrophines pour le
                        traitement de l'infertilité ou des produits de
                        contraste pour scanner ou IRM.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <p class="fadeUp wow animate__animated animate__fadeIn">
                        Nous disposons également d'une gamme complète de milieux de
                        culture pour la PMA, de dispositifs
                        médicaux
                        jetables, de réactifs de biologie médicale, de tests
                        rapides, de kits PCR, et de tests rapides
                        antigéniques et sérologiques du Covid-19. Pharmans répond à
                        tous vos besoins pour l'accès du plus
                        grand
                        nombre à des traitements de qualité et abordables.
                    </p>
                    <p class="fadeUp wow animate__animated animate__fadeIn">
                        Sa vision est d’implanter au cœur de l’Afrique un
                        laboratoire
                        pharmaceutique afin de rendre accessible les produits de
                        santé de
                        qualité à des prix compétitifs pour améliorer l’accès aux
                        soins de
                        santé des populations vulnérables et à faible revenu
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="block-team">
        <div class="container">
            <div class="text-center">
                <h2>Notre équipe</h2>
            </div>
            <div class="row">
                <div class="col-lg-4  col-md-6 col-6">
                    <div class="card fadeUp wow animate__animated animate__fadeIn">
                        <div class="card-img">
                            <img src="{{  $images[1]->path }}" alt="img-team">
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Jonathan Tshizubu</h5>
                                <span>Operations manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="card fadeUp wow animate__animated animate__fadeIn">
                        <div class="card-img">
                            <img src="{{  $images[2]->path }}" alt="img-team">
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Joëlle Mbuyi</h5>
                                <span>Responsable administratif et financier</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-6 col-6">-->
                <!--    <div class="card fadeUp wow animate__animated animate__fadeIn">-->
                <!--        <div class="card-img">-->
                <!--            <img src="{{ asset('assets/images/profil/4.jpg') }}" alt="img-team">-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <div class="text-center">-->
                <!--                <h5>John Tshisuka</h5>-->
                <!--                <span>Responsable commercial et marketing</span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="card fadeUp wow animate__animated animate__fadeIn">
                        <div class="card-img">
                            <img src="{{  $images[3]->path }}" alt="img-team">
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Margueritte Lukusa Zawadi</h5>
                                <span>Responsable technique et logistique</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-logo-agency" style="margin-top: -70px;">
        <div class="container">
            <h2 class="text-center fadeUp wow animate__animated animate__fadeIn"
                style="margin-bottom: 70px;">Certifié par
                l'OMS et le Ministère de la Santé Publique de la RDC </h2>
            <div class="row justify-content-center align-items-center g-lg-5 g-3">
                <div class="col-lg-4 d-flex justify-content-center col-6">
                    <img src="{{ asset('assets/images/oms.png') }}" alt="oms-logo"
                        class="w-50 fadeUp wow animate__animated animate__fadeIn"
                        style="filter: grayscale(0);">
                </div>
                <div class="col-lg-4 d-flex justify-content-center col-6">
                    <img src="{{ asset('assets/images/logo_mini.png') }}"
                        alt="minis-santé-logo" style="width: 40%; filter:
                        grayscale(0);"
                        class="fadeUp wow animate__animated animate__fadeIn">
                </div>
                <div class="col-lg-4 d-flex justify-content-center col-6">
                    <img src="{{ asset('assets/images/fec.png') }}"
                        alt="minis-santé-logo" style="width: 40%; filter:
                        grayscale(0);"
                        class="fadeUp wow animate__animated animate__fadeIn">
                </div>
            </div>
        </div>
    </div>
    <div class="block-bande">
        <div class="container">
            <div class="card card-lg">
                <div class="row align-items-center g-lg-5">
                    <div class="col-lg-12">
                        <div class="text-center ms-5">
                            <h2 class="fadeUp wow animate__animated
                                animate__fadeIn">Certifié pour :</h2>
                            <ul>
                                <li class="fadeUp wow animate__animated
                                    animate__fadeIn">
                                    <i class="fas fa-ribbon"></i> les bonnes
                                    pratiques de distribution
                                </li>
                                <li class="fadeUp wow animate__animated
                                    animate__fadeIn">
                                    <i class="fas fa-ribbon"></i> L'assurance de
                                    qualité.
                                </li>
                                <li class="fadeUp wow animate__animated
                                    animate__fadeIn">
                                    <i class="fas fa-ribbon"></i> Le contrôle de
                                    qualité
                                </li>
                                <li class="fadeUp wow animate__animated
                                    animate__fadeIn">
                                    <i class="fas fa-ribbon"></i> Les risques de
                                    management
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

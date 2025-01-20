@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
    <div class="banner-sm" id="home">
        <img src="images/img-pill.png" alt="" class="img-pill">
        <div class="container">
            <h1 class="fadeUp wow animate__animated animate__fadeIn">Contactez-nous</h1>
        </div>
    </div>
    <div class="block-form-contact">
        <div class="container">

            <div class="row align-items-center g-lg-5">
                <div class="col-lg-6">
                    <div class="text-star">
                        <h2>Vous avez besoin de plus d'information sur nos produits ?<br> Vous souhaitez recevoir un devis ? <br>
                            <span>Contactez-nous !</span></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-form-contact">
                        <form method="post" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="form-group row g-lg-3 g-2 g-sm-3 align-items-end">
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="nom" class="form-control" placeholder="Nom" required value="{{ Auth::user() ? Auth::user()->nom : '' }}">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" required value="{{ Auth::user() ? Auth::user()->prenom : '' }}">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="profession" class="form-control" placeholder="Profession" value="{{ Auth::user() ? Auth::user()->clients->first()?->poste : '' }}">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="societe" class="form-control" placeholder="Société" value="{{ Auth::user() ? Auth::user()->clients->first()?->societe : '' }}">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="email" name="email" class="form-control" placeholder="Adresse email" value="{{ Auth::user() ? Auth::user()->email : '' }}">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required value="{{ Auth::user() ? Auth::user()->contacts->first()?->telephone : '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required style="resize: none"></textarea>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-end">
                                    <button class="btn btn-valid">Envoyer</button>
                                    {{-- <div class="block-contact-sm">
                                        <ul>
                                            <li class="fadeUp wow animate__animated animate__fadeIn">
                                                <i class="fas fa-map-marker"></i>
                                                <span>
                                                    40, croisement des av du Commerce et Bakongo, Kinshasa-Gombe
                                                </span>
                                            </li>
                                            <li class="fadeUp wow animate__animated animate__fadeIn">
                                                <i class="fas fa-envelope"></i>
                                                <a href="mailto:contact@pharmans.com">contact@pharmans.com</a>
                                            </li>
                                            <li class="fadeUp wow animate__animated animate__fadeIn">
                                                <i class="fas fa-envelope"></i>
                                                <a href="tel:+243 81 810 1160">+243 81 810 1160</a>
                                            </li>
                                            <li class="fadeUp wow animate__animated animate__fadeIn">
                                                <i class="fas fa-clock"></i>
                                                <span>
                                                    Lun - Ven de 8h à 16h - Sam de 8h à 14h
                                                </span>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Ldy-owfAAAAAM0gBGWQResVOhxrdwlb-M7IB4l6"></div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31828.54334962853!2d15.307424191479502!3d-4.303751505538069!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x15fb8aee4dca8add!2sPharmans%20%2C%20D%C3%A9p%C3%B4t%20Pharmaceutique!5e0!3m2!1sen!2scd!4v1675329335501!5m2!1sen!2scd" class="w-100 h-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

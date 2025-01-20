@extends('layouts.master2')


@section('content')
    <div class="forgotPage">

        <div class="forgotPage--header">

        </div>

        <div class="container-fluid forgotPage--contentBox">

            <div class="row">

                <div class="col-12 d-flex justify-content-center align-items-center ">
                    <div class="row">
                        <div class="col-9 m-auto">
                            <section class="forgotPage--content--formBox">

                                <h2 class="forgotPage--content--formBox--title ">
                                    Reinitialiser votre mot de passe
                                </h2>
                                <p class="forgotPage--content--formBox--subtitle">
                                    Veuillez saisir les informations ci-dessous
                                    pour reinitialiser votre mot de passe

                                </p>

                                <form action="POST" class="forgotPage--content--formBox--form">
                                    {{-- <div class="forgotPage--content--formBox--form--formControl">
                                        <span class="forgotPage--content--formBox--form--formControl--iconBox">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <rect width="18.5" height="17" x="2.682" y="3.5" rx="4" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m2.729 7.59l7.205 4.13a3.96 3.96 0 0 0 3.975 0l7.225-4.13" />
                                                </g>
                                            </svg>
                                        </span>
                                        <input type="text" placeholder="Email"
                                            class="forgotPage--content--formBox--form--formControl--input" />
                                    </div> --}}
                                    <div class="forgotPage--content--formBox--form--formControl">
                                        <span class="forgotPage--content--formBox--form--formControl--iconBox">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path
                                                        d="M14.491 15.5h.009m-5 0h.009m-5.241 3.345c.225 1.67 1.608 2.979 3.292 3.056c1.416.065 2.855.099 4.44.099s3.024-.034 4.44-.1c1.684-.076 3.067-1.385 3.292-3.055c.147-1.09.268-2.207.268-3.345s-.121-2.255-.268-3.345c-.225-1.67-1.608-2.979-3.292-3.056A95 95 0 0 0 12 9c-1.585 0-3.024.034-4.44.1c-1.684.076-3.067 1.385-3.292 3.055C4.12 13.245 4 14.362 4 15.5s.121 2.255.268 3.345" />
                                                    <path d="M7.5 9V6.5a4.5 4.5 0 0 1 9 0V9" />
                                                </g>
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="Ancien mot de passe"
                                            class="forgotPage--content--formBox--form--formControl--input" />

                                    </div>
                                    <div class="forgotPage--content--formBox--form--formControl">
                                        <span class="forgotPage--content--formBox--form--formControl--iconBox">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path
                                                        d="M14.491 15.5h.009m-5 0h.009m-5.241 3.345c.225 1.67 1.608 2.979 3.292 3.056c1.416.065 2.855.099 4.44.099s3.024-.034 4.44-.1c1.684-.076 3.067-1.385 3.292-3.055c.147-1.09.268-2.207.268-3.345s-.121-2.255-.268-3.345c-.225-1.67-1.608-2.979-3.292-3.056A95 95 0 0 0 12 9c-1.585 0-3.024.034-4.44.1c-1.684.076-3.067 1.385-3.292 3.055C4.12 13.245 4 14.362 4 15.5s.121 2.255.268 3.345" />
                                                    <path d="M7.5 9V6.5a4.5 4.5 0 0 1 9 0V9" />
                                                </g>
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="Nouveau mot de passe"
                                            class="forgotPage--content--formBox--form--formControl--input" />

                                    </div>
                                    <div class="forgotPage--content--formBox--form--formControl">
                                        <span class="forgotPage--content--formBox--form--formControl--iconBox">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path
                                                        d="M14.491 15.5h.009m-5 0h.009m-5.241 3.345c.225 1.67 1.608 2.979 3.292 3.056c1.416.065 2.855.099 4.44.099s3.024-.034 4.44-.1c1.684-.076 3.067-1.385 3.292-3.055c.147-1.09.268-2.207.268-3.345s-.121-2.255-.268-3.345c-.225-1.67-1.608-2.979-3.292-3.056A95 95 0 0 0 12 9c-1.585 0-3.024.034-4.44.1c-1.684.076-3.067 1.385-3.292 3.055C4.12 13.245 4 14.362 4 15.5s.121 2.255.268 3.345" />
                                                    <path d="M7.5 9V6.5a4.5 4.5 0 0 1 9 0V9" />
                                                </g>
                                            </svg>
                                        </span>
                                        <input type="password" placeholder="Comfirmer mot de passe"
                                            class="forgotPage--content--formBox--form--formControl--input" />

                                    </div>


                                    {{-- <div class="forgotPage--content--formBox--form--checkBox">
                                        <label for="remember_me" class="forgotPage--content--formBox--form--checkBox--label">
                                            <input type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                id="remember_me" name="remember">
                                            <span class="forgotPage--content--formBox--form--checkBox--text">Se souvenir de
                                                moi
                                            </span>
                                        </label>
                                        <a href="/forgot-password"
                                            class="forgotPage--content--formBox--form--checkBox--link">Mot
                                            passe oublié
                                            ?
                                        </a>
                                    </div> --}}

                                    <div class="forgotPage--content--formBox--form--btnBox">

                                        <input type="button" value="Reinitialiser le mot de passe"
                                            class="forgotPage--content--formBox--form--btnBox--input" />

                                    </div>

                                </form>

                            </section>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

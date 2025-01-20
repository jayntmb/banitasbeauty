    @php
        $users = App\Models\User::whereHas('commandes')->orderBy('id', 'desc')->get();
    @endphp
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="/administratiton/tableau-de-bord">

            </a> --}}
            <div class="mr-auto">
                {{-- <form action="" class="d-flex">
                    <button class="btn btn-primary"><i class="fas
                            fa-search"></i></button>
                    <input type="text" class="form-control"
                        placeholder="Faites votre recherche içi...."
                        style="width: 300px;box-shadow: 0 5px 10px
                        rgba(0,0,0,.1)!important;border-top-left-radius:
                        0;border-bottom-left-radius: 0;">

                </form> --}}
            </div>
            <ul class="navbar-nav ms-auto flex-row">
                {{-- <li class="nav-item nav-message active mr-3">
                    <a class="nav-link nav-link_icon" href="{{ route('admin.chats.index') }}">
                        <i class="fas fa-comment"></i>
                        <span class="active"></span>
                    </a>
                    <div class="notification">
                        <div class="content-notif">
                            <center><h6>Vous avez 4 nouveaux messages</h6></center>
                            <hr>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="avatar">
                                            <img src="{{
                                                asset('assets/admin/images/avatar.jpg')
                                                }}" alt="">
                                        </div>
                                        <div class="notif-content">
                                            <span class="message">
                                                Pedrien
                                            </span>
                                            <br>
                                            <span class="content-mess
                                                badge alert-primary">
                                                Salut !
                                            </span>
                                            <br>
                                            <span class="time">
                                                il ya 2min
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="ml-4 see-all">Voir plus
                                de message</a>
                        </div>
                    </div>
                </li> --}}
                {{-- @php
                    $notifs = Auth::user()->notifications;
                @endphp --}}
                <li class="nav-item mr-3">
                    <a class="nav-link nav-link_icon" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        {{-- <i class="fas fa-bell"></i>
                        <span class="{{ $notifs->count() > 0 ? 'active' : '' }}"></span> --}}
                        {{-- @livewire('notification-bell') --}}
                    </a>

                </li>
                <li class="nav-item ms-3 ms-sm-0">
                    <a class="nav-link" href="#">
                        <div class="block-name">
                            {{ Auth::user()->nom != '' ? Auth::user()->nom[0] . Str::upper(Auth::user()->prenom[0]) : Str::upper(Auth::user()->nom[0]) }}
                        </div>
                        <span class="name">{{ Auth::user()->nom.' '.Auth::user()->prenom }}</span>
                    </a>
                    <div class="drop-menu">
                        <span class="close"><i class="fas fa-times"></i></span>
                        <ul>


                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

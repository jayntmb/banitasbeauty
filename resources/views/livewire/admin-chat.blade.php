<div wire:poll.keep-alive class="d-flex justify-content-center">
    <div class="chat-box" wire:ignore.self>
        <div class="block-coversation" wire:ignore.self>
            <div class="header text-center">
                <h3>Conversations</h3>
                <button class="btn btn-close-chat-box">
                    <i class="fas fa-times"></i>
                </button>
                <div class="block-search d-flex align-items-center">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="recherche">
                </div>
            </div>
            <div class="body" wire:ignore>
                <div class="block-all-message-sm">
                    @foreach ($utilisateurs as $user)
                        @php
                            $nosee = App\Models\Chat::where('client_id', $user->id)
                                ->where('seen', 1)
                                ->get();
                        @endphp
                        <div class="message-sm">
                            <a href="#" wire:click='showUser({{ $user->id }})'>
                                <div class="avatar-user">
                                    <div class="block-name">
                                        {{ $user->user?->nom[0] }}{{ Str::upper(substr($user->user?->postnom, -1)) }}
                                    </div>
                                </div>
                                <div class="content-message-sm">
                                    <div class="d-flex align-items-center">
                                        <h5 class="me-2">{{ $user->user?->nom . ' ' . $user->user?->postnom }}</h5>
                                        <span
                                            class="time">{{ $user->chats?->last()->created_at->diffForHumans() }}</span>
                                    </div>
                                    {{-- <p>{{ $user->chats?->last()->message}}</p> --}}
                                    <div class="d-flex">
                                        <p>{{ Str::substr($user->chats?->last()->message, 0, 100) }}</p>
                                        @if ($nosee->count() > 0)
                                            <div class="notif">
                                                {{ $nosee->count() }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="block-empty">
                    <i class="fas fa-search"></i>
                    <p>Aucun contact, discution ou message trouvé</p>
                </div>
            </div>
            <div class="footer">
                <div class="text-center">
                    <p>Powered by <a href="https://www.newtech-rdc.net" target="_blank">Newtech Consulting</a></p>
                </div>
            </div>
        </div>
        <div class="block-chat-custom" wire:ignore.self>

            <div class="header-box d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <button class="btn p-0 me-4 btn-back"><i class="fas fa-angle-left"></i></button>
                    <div class="avatar-user">
                        <div class="block-name">
                            {{-- {{ $select->client?->user?->nom[0] }}{{ Str::upper(substr($select->client?->user?->postnom, -1)) }} --}}
                        </div>
                    </div>
                    <div class="info-name">
                        {{-- <h6>{{ $select->client?->user?->nom }}</h6> --}}
                        {{-- <span class="function">{{ $select->client?->societe }}</span> --}}
                    </div>
                </div>
                <button class="btn btn-close-chat-box">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="content-chat" id="parentDiv" >
                <div class="btn-scrollTobottom" wire:ignore.self>
                    <i class="fas fa-arrow-down"></i>
                </div>
                <div class="all-conv">
                    {{-- <div class="date-conv">
                        Aujourd'hui
                    </div> --}}
                    @if ($chatUsers != null)
                        @foreach ($chatUsers as $chat)
                            @if ($chat->admin_id == Auth::user()->client?->id && $chat->send_name == 'admin')
                                <div class="conv me">
                                    <div class="card card-conv">
                                        {{-- <div class="delete-message">
                                            <i class="fas fa-trash"></i>
                                        </div> --}}
                                        @if (Str::afterLast($chat->image, '.') == 'jpg' ||
                                                Str::afterLast($chat->image, '.') == 'png' ||
                                                Str::afterLast($chat->image, '.') == 'PNG' || Str::afterLast($chat->image, '.') == 'webp')
                                            <img src="{{ asset('storage/chatsFile/' . $chat->image) }}" alt="" >
                                            {{-- <div class="placeholder-wave">
                                                <span class="placeholder col-12" style="border-radius: 8px; background: rgba(0,0,0,0.5)"></span>
                                            </div> --}}
                                        @elseif($chat->image == null)
                                        @else
                                            <div class="block-file d-flex align-items-center">
                                                <div class="icon">
                                                    <a href="{{ asset('storage/chatsFile/' . $chat->image) }}"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <i class="fas fa-file"></i>
                                                    </a>
                                                </div>
                                                <div class="info-file">
                                                    <div class="name-file">
                                                        {{$chat->image}}
                                                    </div>
                                                    {{-- <div class="taille">
                                                        3k
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <p>{{ $chat->message}}</p>
                                        <span class="date">{{ $chat->created_at->isoFormat('lll') }}</span>
                                        <div class="text-end">
                                            {{-- <i class="fas fa-check" style="font-size: 10px; color: #8f9794"></i> --}}
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="conv">
                                    <div class="avatar-user">
                                        <div class="block-name">
                                            {{-- {{ $select->client?->user?->nom[0] }}{{ Str::upper(substr($select->client?->user?->postnom, -1)) }} --}}
                                        </div>
                                    </div>
                                    <div class="card card-conv">
                                        @if (Str::afterLast($chat->image, '.') == 'jpg' ||
                                                Str::afterLast($chat->image, '.') == 'png' ||
                                                Str::afterLast($chat->image, '.') == 'PNG')
                                            <a href="{{ asset('storage/' . $chat->image) }}" target="_blanck">
                                                <img src="{{ asset('storage/' . $chat->image) }}" alt="">
                                            </a>
                                            <p>{{ $chat->message }}</p>
                                        @elseif($chat->image == null)
                                            <p>{{ $chat->message }}</p>
                                        @else
                                            <div class="block-file">
                                                <div class="icon">
                                                    <a href="{{ asset('storage/chatsFile/' . $chat->image) }}"
                                                        download="" target="_blank" rel="noopener noreferrer">
                                                        <i class="fas fa-file"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <p>{{ $chat->message }}</p>
                                        @endif

                                        <span class="date">{{ $chat->created_at->isoFormat('lll') }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="footer-box" wire:ignore>
                <form wire:submit.prevent="insert">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <textarea name="send" wire:model='message' id="" cols="30" rows="2"
                                class="form-control text-zone" placeholder="Message"></textarea>
                        </div>
                        <div class="col-3 d-flex justify-content-end align-item-center">
                            <div class="btn-upload-file">
                                <input type="file" class="file-uploard" id="file-image" wire:model='image'
                                    accept="image/*">
                                <label for="file-image">
                                    <i class="fas fa-image"></i>
                                </label>
                            </div>
                            <div class="btn-upload-file">
                                <input type="file" class="file-uploard" id="file-doc" wire:model='image'
                                    accept=".pdf">
                                <label for="file-doc">
                                    <i class="fas fa-paperclip"></i>
                                </label>
                            </div>
                            <input type="hidden" value="{{ Auth::user()->id }}" wire:model='getClient'>
                            <button type="submit" class="btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                    {{-- </form> --}}
            </div>
            <div class="block-loader" wire:click="showUser" wire:loading>

                <div class="block-content-loader">
                    <div class="loader">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

            </div>
            {{-- <div class="block-loader " wire:click="showUser" wire:loading.class="fade">
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div> --}}
        </div>
        <div class="block-file-upload" wire:ignore>
            <div class="block-file-header">
                <h6 class="name-file" wire:model='image'>Fichier.png</h6>
                <button class="btn btn-close-block-file">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="block-file-body">
                {{-- <input class="input-name-file" type="text" > --}}
                <div class="img-upload d-none">
                    <div class="block-img-up">
                        <img src="" alt="">
                    </div>

                    <i class="fas fa-file d-none"></i>
                    <div class="d-flex align-items-center mt-2">
                        <p class="size mb-0">10 Ko</p>
                        <span class="d-flex mx-2">-</span>
                        <p class="format mb-0">JPG</p>
                    </div>
                </div>
            </div>
            <div class="block-file-footer">
                {{-- <form action=""> --}}
                <div class="form-group row align-items-center">
                    <div class="col-10">
                        <textarea name="send" wire:model="message" id="" cols="30" rows="2"
                            class="form-control text-zone" placeholder="Laissez un message"></textarea>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-item-center">
                        <button class="btn btn-close-block-file" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>
    <div class="btn-chatbot">
        <span class="notif">{{ $numbers }}</span>
        <i class="fas fa-comment"></i>
    </div>


    <script>
        var objDiv = document.getElementById("parentDiv");
        const btnScroll = document.querySelector('.chat-box .content-chat .btn-scrollTobottom')
        btnScroll.addEventListener('click', () => {
            objDiv.scrollTop = objDiv.scrollHeight;
        })
        window.addEventListener('test-clik', event => {
            beep()
        });
        window.addEventListener('scroll-to-bottom', event => {
            var conversationContainer = document.getElementById('parentDiv');
            conversationContainer.scrollTop = conversationContainer.scrollHeight;
        });

        objDiv.addEventListener('scroll', () => {
            if (objDiv.scrollTop === (objDiv.scrollHeight - objDiv.offsetHeight)) {
                btnScroll.style.display = 'none';
            } else {
                btnScroll.style.display = 'flex';
            }
        });
        // document.addEventListener('livewire:load', function () {
        //     Livewire.on('scroll-to-bottom', function () {
        //         var conversationContainer = document.getElementById('parentDiv');
        //         conversationContainer.scrollTop = conversationContainer.scrollHeight;
        //     });
        // });
    </script>
</div>

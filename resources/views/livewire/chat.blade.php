<div wire:poll.keep-alive>
    <div class="col-lg-12">
        <div class="card card-lg card-chat">
            <div class="header-chat">
                <div class="d-flex align-items-center">
                    <div class="avatar-admin">
                        <img src="{{asset('assets/images/logo-app.jpg')}}" alt="logo de pharmans" class="w-100 h-100" style="object-fit: cover; font-size: 8px;">
                    </div>
                    <div class="block-name-admin">
                        <h5>PHARMANS</h5>
                        {{-- <p>Contecté il y a 3min</p> --}}
                    </div>
                </div>
            </div>
            <div class="content-chat" id="parentDiv">
                @php
                    if ($chats != null) {
                        $date_envoye = $chats ?? $chats->first()?->created_at->format('d-m-Y');
                        $temp = '1';
                        $first = '1';
                    }
                @endphp
                @foreach ($chats as $chat)
                    @php
                        if ($date_envoye != $chat->created_at->format('d-m-Y')) {
                            $date_envoye = $chat->created_at->format('d-m-Y');

                            $temp = '1';
                        } else {
                            if ($first == '1') {
                                $temp = '1';
                            } else {
                                $temp = '0';
                            }
                        }
                    $first = '0';
                    @endphp
                    <div class="date-chat d-flex justify-content-center">
                        @if ($temp == '1')
                            <span>{{ $date_envoye == now()->format('d-m-Y') ? 'Aujourd\'hui' : $date_envoye }}</span>
                        @endif
                    </div>

                    @if ($chat->client_id == Auth::user()->clients->first()->id && $chat->send_name == 'user' )
                        <div class="block-chat-user">
                            <div class="card-chat-sm">
                                @if (Str::Afterlast($chat->image,'.') == 'jpg' || Str::afterLast($chat->image,'.') == 'png' || Str::afterLast($chat->image,'.') == 'PNG' || Str::afterLast($chat->image,'.') == 'webp')
                                <a href="{{asset('storage/chatsFile/'.$chat->image)}}" download="" target="_blank" rel="noopener noreferrer">

                                <img src="{{asset('storage/'.$chat->image)}}" class="w-100" alt="">
                                </a>
                                    <p>{{ $chat->message }}</p>
                                @elseif($chat->image == null)
                                    <p>{{ $chat->message }}</p>
                                @else
                                    <div class="block-file">
                                        <a href="{{asset('storage/chatsFile/'.$chat->image)}}" class="d-flex align-items-center" download="" target="_blank" rel="noopener noreferrer">
                                            <div class="icon bg-primary mx-0">
                                                <i class="fas fa-file"></i>
                                            </div>
                                            <div class="block-info-file">
                                                djdjdj
                                            </div>
                                        </a>
                                    </div>

                                    <p>{{ $chat->message }}</p>
                                @endif
                                <span class="date">{{$chat->created_at->isoFormat('lll')}}</span>
                            </div>
                        </div>
                    @else
                        <div class="block-chat-admin">
                            <div class="card-chat-sm">
                                @if (Str::Afterlast($chat->image,'.') == 'jpg' || Str::afterLast($chat->image,'.') == 'png' || Str::afterLast($chat->image,'.') == 'PNG' || Str::afterLast($chat->image,'.') == 'webp')
                                <a href="{{asset('storage/chatsFile/'.$chat->image)}}" download="" target="_blank" rel="noopener noreferrer">

                                <img src="{{asset('storage/chatsFile/'.$chat->image)}}" class="w-100" alt="">
                                </a>
                                    <p>{{ $chat->message }}</p>
                                @elseif($chat->image == null)
                                    <p>{{ $chat->message }}</p>
                                @else
                                    <div class="icon bg-primary">
                                        <a href="{{asset('storage/chatsFile/'.$chat->image)}}" download="" target="_blank" rel="noopener noreferrer">

                                        <i class="fas fa-file"></i>
                                        </a>
                                    </div>
                                    <p>{{ $chat->message }}</p>
                                @endif
                                <span class="date">{{$chat->created_at->isoFormat('lll')}}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="block-writing d-flex align-items-center ">
                <form wire:submit.prevent="insert">
                    @csrf

                    {{-- <input type="hidden" name="client" wire:model='getClient'>

                    <input type="file" name="image">
                    <button type="submit">send</button> --}}
                    <div class="form-group row" style="position: relative; z-index: 2;">
                        <div class="col-lg-8 col-xl-9 col-textarea col-8" wire:ignore>
                            <textarea class="form-control" name="message" wire:model='message' placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-4 col-xl-3 col-4 d-flex align-items-center justify-content-end col-tools-chat" wire:ignore>
                            <div class="btn-upload-file">
                                <input type="file" class="file-uploard d-none" id="file-doc" wire:model='image' accept=".pdf">
                                <label for="file-doc">
                                    <i class="bi bi-paperclip"></i>
                                </label>
                            </div>
                            <div class="btn-upload-file">
                                <input type="file" class="file-uploard d-none" id="file-image" wire:model='image' accept="image/*">
                                <label for="file-image">
                                    <i class="bi bi-image"></i>
                                </label>
                            </div>
                            <button class="btn btn-close-block-file" type="submit"><i class="bi bi-send-fill "></i> <span>Envoyer</span></button>
                        </div>
                    </div>
                    <div class="block-file-upload" wire:ignore>
                        <div class="block-file-header">
                            <h6 class="name-file"></h6>
                            <div class="btn btn-close-block-file">
                                <i class="bi bi-x-lg"></i>
                            </div>
                        </div>
                        <div class="block-file-body">
                            <div class="img-upload">
                                <div class="block-img-up">
                                    <img src="">
                                </div>

                                <i class="fas fa-file d-none"></i>
                                <div class="d-flex align-items-center mt-2">
                                    <p class="size mb-0">116.31 KB</p>
                                    <span class="d-flex mx-2">-</span>
                                    <p class="format mb-0">webp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('test-clik', event => {
            beep()
        })
        var objDiv = document.getElementById("parentDiv");
        objDiv.scrollTop = objDiv.scrollHeight;
    </script>
</div>

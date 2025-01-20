<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Client;
use App\Models\Panier;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminChat extends Component
{
    use WithFileUploads;
    public $categories, $son = 0, $chatUsers, $chats, $numbers, $users, $select, $paniers, $message, $client, $image, $admin, $getClient, $utilisateurs, $chat, $allchats, $cats;
    public function mount()
    {
        $this->chatUsers = Message::where('client_id', $this->getClient)->get();



    }
    public function insert()
    {
        // Original File name

        //  $this->image->move(public_path('/assets/images/chat/'),$this->image->getClientOriginalName());
        // dd( $this->image->getClientOriginalName());
        $me = User::where('id', $this->getClient)->first();
        if ($this->image) {
            $filename = $this->image->getClientOriginalName();

            // Upload file
            $path = $this->image->storeAs('chatsFile', $filename, 'public');
            // $this->filepath = Storage::url($filename);
            $model = new Message;
            $model->image = Storage::url($path);
            Message::create([
                'image' => basename($path),
                // 'message' => $this->message ?? 'envoie du fichier' . basename($path),
                'message' => $this->message,
                'admin_id' => Auth::user()->admins->first()->id,
                'client_id' => $this->getClient,
                'send_name' => 'admin',
                'statut_id' => '1',
            ]);

        } else {
            Message::create([
                'message' => $this->message,
                'admin_id' => Auth::user()->admins->first()->id,
                'client_id' => $this->getClient,
                'send_name' => 'admin',
                'statut_id' => '1',
            ]);
            // notification::create([
            //     'message' => "Vous avez reçu un nouveau message de l'ADMIN",
            //     'subject' => "Nouveau Message",
            //     'user_id' => $this->getClient
            // ]);

        }
        $me->notify(new NewMessage($me));

        $this->son = 1;
        $this->message = '';
        // $this->dispatchBrowserEvent('scroll-to-bottom');
        // $this->dispatchBrowserEvent('test-clik');
    }

    public function showUser($ids)
    {
        try {
            $this->chatUsers = Message::where('client_id', $ids)->get();
            // dd( $this->chatUsers);
            foreach ($this->chatUsers as $seen) {
                $changeState = Message::where('id', $seen->id)->first()->update([
                    'seen' => '0'
                ]);
            }
            $this->select = Message::where('client_id', $ids)->first();

            $this->getClient = $ids;
        } catch (\Throwable $th) {
            return back();
        }


    }
    public function render()
    {
        $this->users = Message::where('statut_id', '1')->orderBy('id', 'desc')->get();
        // $this->numbers = Message::where('seen', '1')->where('send_name', 'user')->get();
        $this->utilisateurs = Client::whereHas('chats', function ($var) {
            $var->where('statut_id', 1);
        })->get();
        $this->chatUsers = Message::where('client_id', $this->getClient)->get();
        $this->select = Message::where('client_id', $this->getClient)->first();

        foreach ($this->utilisateurs as $user) {
            // $this->utilisateurs = Client::where('id', $user->id)->get();
            $this->chat = Message::where('client_id', $user->id)->where('send_name', 'user')->orderby('id', 'DESC')->first();
            $this->allchats = Message::where('client_id', $user->id)->get();
            // dump( $this->chat );
        }
        if (Auth::user()) {
            $this->paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();
            // session()->put('panier_count', $this->paniers);
        } else {
            session()->pull('panier_count');
        }
        // $this->dispatchBrowserEvent('scroll-to-bottom');
        return view('livewire.admin-chat');
    }
}
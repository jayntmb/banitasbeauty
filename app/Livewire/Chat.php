<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Panier;
use App\Models\Message;
use Livewire\Component;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Chat extends Component
{
    use WithFileUploads;
    public $categories, $chats, $paniers, $message, $client, $son, $image, $admin, $getClient;
    public function mount()
    {
        if (Auth::user() && Auth::user()->clients != null) {
            # code...
            $this->client = Auth::user()->clients?->first()?->id;
        } else {
            $this->admin = $this->getClient;
        }
    }
    public function insert()
    {
        if ($this->image) {
            $filename = $this->image->getClientOriginalName();

            // Upload file
            $path = $this->image->store('chatsFile', 'public');
            // $this->filepath = Storage::url($filename);
            $model = new Message;
            $model->image = Storage::url($path);

            Message::create([
                'image' => $path,
                'message' => $this->message ?? 'envoie du fichier' . basename($path),
                'client_id' => $this->getClient,
                'send_name' => 'user',
                'seen' => '1',
                'statut_id' => '1',
            ]);
            foreach (User::where('role_id', 1)->get() as $key => $user) {
                # code...
                // notification::create([
                //     'message' => "Vous avez reçu un nouveau message de " .Auth::user()->role?->nom,
                //     'subject' => "Nouveau Message",
                //     'user_id' => $user->id
                // ]);
            }



        } else {
            if (Str::length($this->message) > 0) {
                # code...
                Message::create([
                    'message' => $this->message,
                    'client_id' => $this->getClient,
                    'send_name' => 'user',
                    'seen' => '1',
                    'statut_id' => '1',
                ]);


                foreach (User::where('role_id', 1)->get() as $key => $user) {
                    # code...
                    // notification::create([
                    //     'message' => "Vous avez reçu un nouveau message de " .Auth::user()->role?->nom,
                    //     'subject' => "Nouveau Message",
                    //     'user_id' => $user->id
                    // ]);
                }
            }
        }

        $this->son = 1;
        $this->message = '';

        // $this->dispatchBrowserEvent('test-clik');
    }
    public function render()
    {
        $this->categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $this->chats = Message::where('statut_id', '1')->where('client_id', Auth::user()->clients->first()?->id)->get();

        if (Auth::user()) {
            $this->paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $this->paniers);
        } else {
            session()->pull('panier_count');
        }
        return view('livewire.chat');
    }
}
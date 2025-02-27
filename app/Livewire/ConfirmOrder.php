<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Commande;
use Illuminate\Support\Str;
use App\Models\CommandeProduit;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;
use Monarobase\CountryList\CountryListFacade;

class ConfirmOrder extends Component
{
    public $commandes;
    public $total_amount;
    public $countries;
    public $user_data = [
        'noms' => '',
        'email' => '',
        'phone' => '',
        'country' => '',
        'city' => '',
        'delivery_address' => '',
    ];

    protected $rules = [
        'user_data.noms' => 'required|string',
        'user_data.email' => 'nullable|email',
        'user_data.phone' => 'required|string',
        'user_data.country' => 'required|string',
        'user_data.city' => 'required|string',
        'user_data.delivery_address' => 'required|string',
    ];

    public function confirmOrder()
    {
        $this->validate();

        $user = Auth::user();

        $user_names = explode(' ', $this->user_data['noms']);
        $prenom_client = $user_names[0] ?? '';
        $nom_client = $user_names[1] ?? '';

        $this->user_data['prenom'] = $prenom_client;
        $this->user_data['nom'] = $nom_client;

        try {
            $user = User::where('email', $this->user_data['email'])->first();

            if (!$user) {
                $user = User::create([
                    'prenom' => $prenom_client,
                    'nom' => $nom_client ?? $prenom_client,
                    'email' => $this->user_data['email'],
                    'password' => Hash::make(Str::random(8)),
                    'role_id' => 2, // 2 corresond au role : client
                    'phone' => $this->user_data['phone'],
                    'statut_id' => 1
                ]);
            }

            $order = Commande::create([
                'user_id' => $user->id ?? null,
                'status' => 'En attente',
                'prenom_client' => $prenom_client,
                'nom_client' => $nom_client,
                'country_client' => $this->user_data['country'],
                'city_client' => $this->user_data['city'],
                'delivery_address' => $this->user_data['delivery_address'],
                'phone_client' => $this->user_data['phone'],
                'email_client' => $this->user_data['email']
            ]);

            foreach ($this->commandes as $commande) {
                $commadeProduit = CommandeProduit::create([
                    'produit_id' => $commande['id'],
                    'commande_id' => $order->id,
                    'quantite' => $commande['quantite']
                ]);
            }
            $order_details = $this->commandes;

            $this->sendOrderEmail($order_details, $this->total_amount, $this->user_data);

            session()->forget('cart');

            session()->flash('success', "Votre commande a été passée avec succès ! \n Nous vous notifierons lorsque le statut aura changé. Merci !");

            $this->redirectRoute('commandes.index');
        } catch (\Throwable $th) {
            Log::error("Une erreur s\'est produite lors de la creation de la commande ou de l'envoi du mail : $th");
            return redirect()->back()->with('error', "Une erreur s\'est produite lors de la passation de la commande, veuillez réessayer s'il vous plait !");
        }
    }

    public function sendOrderEmail($order_details, $total_amount, $user_data)
    {
        // Admin email or notifiable user
        $adminEmail = 'tshipambavincent80@gmail.com';

        // Send the notification to the admin
        Notification::route('mail', $adminEmail)
            ->notify(new NewOrderNotification($order_details, $total_amount, $user_data));
    }

    public function render()
    {
        if (Auth::check()) {
            $this->user_data['noms'] = Auth::user()->prenom . ' ' . Auth::user()->nom;
            $this->user_data['email'] = Auth::user()->email;
            $this->user_data['phone'] = Auth::user()->phone;
        }
        $this->commandes = session('cart', []);
        $this->total_amount = 0;
        $this->countries = CountryListFacade::getList('fr');

        foreach ($this->commandes as $commande) {
            $this->total_amount += $commande['details']['prix'] * $commande['quantite'];
        }
        return view('livewire.confirm-order');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Client;
use App\Models\Message;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Newsletter;
use App\Models\Partenaire;
use Webklex\PHPIMAP\ClientManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        // Calcul des utilisateurs en ligne
        $online = $this->countOnlineUsers()['online'];
        $offline = $this->countOnlineUsers()['offline'];
        // Calcul des utilisateurs totaux et connectés
        $totalUsers = User::count();

        // Récupération des entités avec des critères spécifiques
        $produits = Produit::where('statut_id', 1)->get();
        $clients = User::where('statut_id', 1) // l'id 1 correspond au statut : active
            ->where('role_id', 2) // l'id 2 correspond au role client
            ->get();
        $partenaires = Partenaire::where('statut_id', 1)->get();
        $newsletters = Newsletter::where('statut_id', 1)->get();
        $commandes = Commande::latest()->with('produits')->get();
        $user = User::whereHas('commandes')->latest()->get();
        $chats = Chat::where('statut_id', 1)->get();

        // Retourne la vue avec les données compactées
        return view('admin.pages.dashboard', compact(
            'produits',
            'user',
            'totalUsers',
            'online',
            'offline',
            'clients',
            'newsletters',
            'commandes',
            'chats',
        ));
    }

    public function countOnlineUsers()
    {
        $onlineUsersCount = 0;
        $offlineUsersCount = 0;

        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has("user-is-online-$user->id")) {
                $onlineUsersCount++;
            } else {
                $offlineUsersCount++;
            }
        }

        return ['online' => $onlineUsersCount, 'offline' => $offlineUsersCount];
    }

    public function email()
    {
        $cm = new ClientManager('path/to/config/imap.php');

        // or use an array of options instead
        $cm = new ClientManager($options = []);

        /** @var \Webklex\PHPIMAP\Client $client */
        $client = $cm->account('account_identifier');

        // or create a new instance manually
        $client = $cm->make([
            'host' => 'somehost.com',
            'port' => 993,
            'encryption' => 'ssl',
            'validate_cert' => true,
            'username' => 'username',
            'password' => 'password',
            'protocol' => 'imap'
        ]);

        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        //Loop through every Mailbox
        /** @var \Webklex\PHPIMAP\Folder $folder */
        foreach ($folders as $folder) {

            //Get all Messages of the current Mailbox $folder
            /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
            $messages = $folder->messages()->all()->get();

            /** @var \Webklex\PHPIMAP\Message $message */
            foreach ($messages as $message) {
                echo $message->getSubject() . '<br />';
                echo 'Attachments: ' . $message->getAttachments()->count() . '<br />';
                echo $message->getHTMLBody();

                //Move the current Message to 'INBOX.read'
                if ($message->move('INBOX.read') == true) {
                    echo 'Message has ben moved';
                } else {
                    echo 'Message could not be moved';
                }
            }
        }
    }
}
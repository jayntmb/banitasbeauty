<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    protected $signature = 'make:admin {firstname} {lastname} {email} {password}';

    protected $description = 'Commande console pour la creation d\'un administrateur.';

    public function handle()
    {
        $prenom = $this->argument('firstname');
        $nom = $this->argument('lastname');
        $email = $this->argument('email');
        $password = bcrypt($this->argument('password'));

        // Créer l'utilisateur
        $user = User::firstOrCreate([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'password' => $password,
            'statut_id' => 1,
            'role_id' => 1
        ]);

        $this->info("Admin créé avec succès : {$user->name} ({$user->email}) ");
    }
}
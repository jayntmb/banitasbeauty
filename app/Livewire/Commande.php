<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande as ModelCommande;

class Commande extends Component
{
    public $add = 0, $commande, $prix = 0, $total = 0, $devise = "";
    public function render()
    {
        $this->add;
        $this->total;
        return view('livewire.commande');
    }
    public function mount($commande)
    {
        $this->commande = $commande;
        $this->add = $commande->quantite;
        $this->prix = $commande->prix;
        $this->devise = $commande->devise->symbole;
        $this->total = (int) $commande->quantite * (int) $commande->prix;
    }


    public function add()
    {
        $this->add += 1;
        // $this->show = 1;

        $this->update($this->commande->id);
    }

    public function moins()
    {
        if ($this->add > 1) {
            $this->add -= 1;
        }
        // $this->total = (int) $this->add() * (int) $this->prix;

        $this->update($this->commande->id);

    }

    public function update($ids)
    {
        $this->total = (int) $this->add * (int) $this->prix;

        $a = ModelCommande::find($ids)
            ->update([
                'quantite' => $this->add,
                'state' => '1',
                'user_id' => Auth::user()->id,
                'produit_id' => $this->commande->produit_id,
            ]);
        // $this->show = 0;
    }

}

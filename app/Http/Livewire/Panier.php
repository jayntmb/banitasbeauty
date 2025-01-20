<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Panier as Pan;

class Panier extends Component
{
    public $add = 0, $panier;
    public function render()
    {
        $this->add;
        return view('livewire.panier');
    }
    public function mount($panier)
    {
        $this->panier = $panier;
        $this->add = $panier->quantite;
    }


    public function add()
    {
        $this->add += 1;
        $this->show = 1;
        $this->update($this->panier->id);
    }

    public function moins()
    {
        if ($this->add > 1) {
            $this->add -= 1;
        }
        $this->update($this->panier->id);

    }

    public function update($ids)
    {
        $a = Pan::find($ids)
            ->update([
                'quantite' => $this->add,
                'state' => '1',
                'user_id' => Auth::user()->id,
                'produit_id' => $this->panier->produit_id,
            ]);
        $this->show = 0;
    }

}
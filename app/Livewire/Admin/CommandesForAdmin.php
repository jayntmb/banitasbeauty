<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Commande;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderPendingNotification;
use App\Notifications\OrderAwaitingNotification;
use App\Notifications\OrderCancelledNotification;
use App\Notifications\OrderDeliveredNotification;

class CommandesForAdmin extends Component
{
    use WithPagination;

    public $pending_orders;
    public $commande_id;
    public $commande_status;
    public $commande;

    public function updateOrderStatus($status, $commandeId)
    {
        $this->commande_status = $status;
        $this->commande_id = $commandeId;

        try {
            $commande = Commande::with('produits')->find($this->commande_id);
            $total_amount = 0;
            foreach ($commande->produits as $produit) {
                $total = (int) $produit->prix * (int) $produit->pivot->quantite;
                $total_amount += $total;
            }

            // Update the status of the commande
            $commande->update([
                'status' => $this->commande_status,
            ]);

            $this->commande = $commande;

            // Send notifications based on the new status
            switch ($this->commande_status) {
                case 'Livrée':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderDeliveredNotification($commande, $total_amount));
                    break;

                case 'En attente':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderAwaitingNotification($commande, $total_amount));
                    break;

                case 'En cours':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderPendingNotification($commande, $total_amount));
                    break;

                case 'Annulée':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderCancelledNotification($commande, $total_amount));
                    break;

                default:
                    // Handle any other cases if needed
                    break;
            }

            session()->flash('success', 'Le statut de la commande a été mis à jour avec succès!');

            $this->dispatch('orderStatusChanged', $this->commande);

            $this->redirectRoute('admin.commande.client');
        } catch (\Throwable $th) {
            Log::error("Une erreur s'est produite lors de la mise à jour du statut : $th");
            session()->flash('error', "Une erreur s'est produite lors de la mise à jour du statut de la commande.");
            $this->redirectRoute('admin.commande.client');
        }
    }

    public function render()
    {
        $this->pending_orders = Commande::whereIn('status', ['En attente', 'En cours', 'pending', 'Annulée'])->get()->count();
        $commandes = Commande::latest()->with('produits')->paginate(12);

        return view('livewire.admin.commandes-for-admin', ['commandes' => $commandes]);
    }
}

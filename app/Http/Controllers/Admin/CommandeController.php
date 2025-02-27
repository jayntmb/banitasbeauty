<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Commande;
use App\Notifications\OrderPendingNotification;
use Illuminate\Http\Request;
use App\Notifications\CommandeDone;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderAwaitingNotification;
use App\Notifications\OrderCancelledNotification;
use App\Notifications\OrderDeliveredNotification;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pending_orders = Commande::whereIn('status', ['En attente', 'En cours', 'pending'])->get()->count();
        $commandes = Commande::latest()->with('produits')->paginate(10);

        return view('admin.pages.comandes', compact('commandes', 'pending_orders'));
    }

    public function update(Request $request)
    {
        try {
            $commande = Commande::where('id', $request->commande_id)->with('produits')->first();
            $commande_status = $request->commande_status;
            $total_amount = 0;
            foreach ($commande->produits as $produit) {
                $total = (int) $produit->prix * (int) $produit->pivot->quantite;
                $total_amount += $total;
            }

            $commande->update([
                'status' => $commande_status
            ]);

            switch ($commande_status) {
                case 'Livrée':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderDeliveredNotification($commande, $total_amount));
                    break;

                case 'En attente':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderAwaitingNotification($commande, $total_amount));

                case 'En cours':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderPendingNotification($commande, $total_amount));

                case 'Annulée':
                    Notification::route('mail', $commande->email_client)
                        ->notify(new OrderCancelledNotification($commande, $total_amount));

                default:
                    # code...
                    break;
            }

            return back()->with('success', 'Le statut de la commande a été mis à jour avec succès !');
        } catch (\Throwable $th) {
            Log::error("Une erreur s'est produite lors de la mise a jour du statut : $th");
            return redirect()->back()->with('error', "Une erreur s'est produite lors de la mise à jour du statut de la commande.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}

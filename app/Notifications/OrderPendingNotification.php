<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPendingNotification extends Notification implements ShouldQueue
{
    use Queueable;


    public $commande, $total_amount;

    public function __construct($commande, $total_amount)
    {
        $this->commande = $commande;
        $this->total_amount = $total_amount;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Commande livrée')
            ->view('emails.order-pending', [
                'order' => $this->commande,
                'total_amount' => $this->total_amount
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

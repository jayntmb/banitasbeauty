<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $orderDetails, $totalAmount, $user_data;

    public function __construct($orderDetails, $totalAmount, $user_data)
    {
        $this->orderDetails = $orderDetails;
        $this->totalAmount = $totalAmount;
        $this->user_data = $user_data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle commande passée')
            ->view('emails.new-order-for-admin', [
                'orderDetails' => $this->orderDetails,
                'total_amount' => $this->totalAmount,
                'user_data' => $this->user_data
            ]);
    }

    public function toArray($notifiable)
    {
        return [
            'order_details' => $this->orderDetails,
            'total_amount' => $this->totalAmount,
            'user_data' => $this->user_data
        ];
    }
}

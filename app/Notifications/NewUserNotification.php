<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class NewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Un nouveau client a été créé.')
                    ->line('Le client est : ' . $this->user->prenom . ' ' . $this->user->nom)
                    ->line('Son adresse mail est : ' . $this->user->email)
                    ->action('Voir les clients', route('admin.clients'))
                    ->line('Vérifiez ses informations en consultant vos clients');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'subject' => 'Nouveau client créé',
            'content' => 'Un nouveau client a été créé : ' . $this->user->prenom . ' ' . $this->user->nom,
            'link' => route('admin.clients')
        ];
    }
}

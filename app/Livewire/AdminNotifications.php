<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminNotifications extends Component
{
    public $user, $notifications;

    public function render()
    {
        $this->user = Auth::user();
        $this->notifications = $this->user->unreadNotifications;

        return view('livewire.admin-notifications');

    }

    public function delete($notif)
    {
        $this->user->unreadNotifications->where('id', $notif['id'])->first()->delete();
    }

    public function deleteall()
    {
        $this->user->notifications()->delete();
    }

    public function gotoNotif($notification)
    {
        $this->user->unreadNotifications->where('id', $notification['id'])->markAsRead();
        return redirect($notification['data']['link']);
    }
}
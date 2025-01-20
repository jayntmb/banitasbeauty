<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationBell extends Component
{
    public $notifs;

    public function render()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $this->notifs = $user->unreadNotifications;

        return view('livewire.notification-bell');
    }

}

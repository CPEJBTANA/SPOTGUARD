<?php

namespace App\Livewire\Resident\Module;

use Livewire\Component;
use App\Models\Notification;

class ResidentNotification extends Component
{
    public $notifications;
    public $count_notif;
    public $show = "";

    public function toggleSeen($notification_id)
    {
        $notification = Notification::find($notification_id);
        $notification->is_seen = true;
        $notification->save();
    }

    public function refreshNotification()
    {
        $this->notifications = Notification::where('receiver_id', auth()->id())
            ->where('is_seen', false)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        if ($this->notifications->count() > 0) {
            $this->show = "show";
        } else {
            $this->show = "";
        }

 
    }


    public function render()
    {
        return view('livewire.resident.module.resident-notification', [
            'notifications' => $this->notifications,
            'show' => $this->notifications,
        ]);
    }
}

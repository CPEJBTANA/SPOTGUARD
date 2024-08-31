<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function index($receiver_id, $message)
    {
        $notif = Notification::create([
            'receiver_id'=>$receiver_id,
            'message'=>$message,

        ]);

        if ($notif) {
            return response()->json([
                'status' => 200,
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => $receiver_id . ' receiver  not found',
        ], 404);
    }

}

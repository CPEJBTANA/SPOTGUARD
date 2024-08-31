<?php

namespace App\Http\Controllers;

use App\Models\Servo;
use Illuminate\Http\Request;

class ServoController extends Controller
{

    public function update($status)
    {
        $servo = Servo::find(1);
        if ($servo) {
            $servo->update([
                'status' => $status,
            ]);

            return response()->json([
                'status' => 200,
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => 'servo_id  not found',
        ], 404);
    }

    public function read()
    {
        $servo = Servo::find(1);
        if ($servo) {
            return response()->json([
                'status' => 200,
                'servo'=>$servo->status,
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => 'servo_id  not found',
        ], 404);
    }

}

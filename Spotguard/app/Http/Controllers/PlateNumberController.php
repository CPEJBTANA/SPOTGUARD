<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use Illuminate\Http\Request;

class PlateNumberController extends Controller
{


    public function index($plate_number)
    {
        $resident = User::where('car_license_plate', $plate_number)->first();

        if ($resident) {
            return response()->json([
                'status' => 200,
                'resident' => $resident,
            ], 200);
        }

        $guest = Guest::where('car_license_plate', $plate_number)->first();
        if ($guest) {
            $guest_old_status='';
            if ($guest->status == null) {
                $guest->status = 'in';

                $guest_old_status='in';
                $guest->save();
            } else if ($guest->status == 'in') {
                $guest_old_status='out';
                $guest->delete();
            }

            $guest->user->first_name;
            return response()->json([
                'status' => 200,
                'guest' => $guest,
                'guest_old_status'=>$guest_old_status,
            ], 200);


        }

        return response()->json([
            'status' => 404,
            'message' => $plate_number . '  not found',
        ], 404);
    }

}

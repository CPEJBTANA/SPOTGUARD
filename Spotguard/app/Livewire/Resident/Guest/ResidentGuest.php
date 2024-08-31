<?php

namespace App\Livewire\Resident\Guest;

use App\Models\BodyType;
use App\Models\Guest;
use Livewire\Component;

class ResidentGuest extends Component
{
    public $data = [
        'name' => '',
        'resident_id' => '',
        'address' => '',
        'car_brand' => '',
        'body_type_id' => 1,
        'car_color' => '',
        'car_license_plate' => '',
    ];

    public function showModal()
    {
        $this->dispatch('show-request');
    }
    public function submitRequest()
    {
        $this->data['resident_id'] = auth()->id();
        try {
            $rules = [
                'data.name' => 'required',
                'data.address' => 'required',
                'data.car_brand' => 'required',
                'data.body_type_id' => 'required',
                'data.car_color' => 'required',
                'data.car_license_plate' => 'required',
            ];

            $validation = $this->validate($rules);

            if ($validation) {
                $this->data['car_license_plate'] = trim($this->data['car_license_plate']);

                Guest::create($this->data);
                $this->dispatch('success', ['message' => 'Guest added successfully.']);
                $this->dispatch('hide-request');
            } else {
                $this->dispatch('error', ['message' => 'Request failed.']);
            }
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => $th->getMessage()]);
        }
    }

    public function deleteGuest($guest_id)
    {
        $this->data['resident_id'] = auth()->id();
        try {
            Guest::destroy($guest_id);
            $this->dispatch('success', ['message' => 'Guest deleted successfully.']);
            $this->dispatch('hide-request');

        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => $th->getMessage()]);
        }
    }
    public function editGuest(Guest $guest)
    {
        $this->data['name'] = $guest->name;
        $this->data['resident_id'] = $guest->resident_id;
        $this->data['address'] = $guest->address;
        $this->data['car_brand'] = $guest->car_brand;
        $this->data['car_color'] = $guest->car_color;
        $this->data['car_license_plate'] = $guest->car_license_plate;
        $this->data['body_type_id'] = $guest->body_type_id;
        $this->dispatch('show-request');
    }

    public function render()
    {
        $this->dispatch('success', ['message' => 'Guest added successfully.']);

        $body_types = BodyType::all();
        $guests = Guest::where('resident_id', auth()->id())->get();

        return view('livewire.resident.guest.resident-guest', [
            'body_types' => $body_types,
            'guests' => $guests,
        ]);
    }
}

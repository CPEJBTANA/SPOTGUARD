<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'resident_id',
        'address',
        'car_brand',
        'body_type_id',
        'car_color',
        'car_license_plate',
        'status',
    ];

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class, 'body_type_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'resident_id', 'id');
    }
}

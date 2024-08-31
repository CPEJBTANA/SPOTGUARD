<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_id',
        'message',
        'guest_id',
        'is_seen',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

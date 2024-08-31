<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Filament\Models\Contracts\HasName;
use Laravel\Jetstream\HasProfilePhoto;
 
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;

use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasName,HasAvatar
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles; // ])->assignRole($adminRole);
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'mobile_number',
        'address',
        'car_brand',
        'body_type_id',
        'car_color',
        'car_license_plate',
        'username',
        'password',
    ];


    public function bodyType(): BelongsTo
    {
        return $this->belongsTo(BodyType::class, 'body_type_id', 'id');
    }



    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];



 


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        //'profile_photo_url',
    ];



    public function canAccessPanel(Panel $panel): bool
    {
       return $this->roles[0]->name == "Admin";
        //return true;
    }
    public function getFilamentName(): string
    {
        return "{$this->username} ";
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return Storage::disk('images')->url('man-2.png');
    }

}

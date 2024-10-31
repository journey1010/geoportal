<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'entidad_id', // Agrega 'entidad_id' para asociar el usuario con una entidad
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relación con la entidad.
     */
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    /**
     *  VerifyStatus of user
     * @return \App\Models\User if the credententials are validate or int (1, user disabled), (2, password wrong)
     */
    public static function verifyCredentials(string $email, string $password): \App\Models\User|int
    {
        $user = self::where('email', $email)->first();
        if ($user->status == 0) {
            return 1;
        }
        if (!Hash::check($password, $user->password)) {
            return 2;
        }
        return $user;
    }
}

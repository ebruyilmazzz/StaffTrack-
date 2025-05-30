<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Toplu atama yapılabilir alanlar.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'role',
    ];

    /**
     * Serialize edildiğinde gizli tutulacak alanlar.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Dönüştürülecek veri türleri (cast).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Rol kontrolü için yardımcı metod (opsiyonel ama önerilir)
     */
    public function Admin(): bool
    {
        return $this->role === 'Admin';
    }

    public function Personnel(): bool
    {
        return $this->role === 'Personnel';
    }
}

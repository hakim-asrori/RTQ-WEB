<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'created_at',
        'updated_at',
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $telepon;

    public function getToken()
    {
        return $this->hasOne(Token::class, "tokenable_id", "id");
    }

    public function getRole()
    {
        return $this->belongsTo("App\Models\Role", "id_role", "id")->withDefault(["keterangan" => "<i><b>NULL</b></i>"]);
    }

    public function getAdminLokasiRt()
    {
        return $this->hasOne(AdminLokasiRt::class, "id", "id");
    }

    public function getWaliSantri()
    {
        return $this->hasOne(WaliSantri::class, 'id', 'id');
    }
}

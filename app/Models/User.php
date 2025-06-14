<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements LaratrustUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'poin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
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

    public function guruProfile()
    {
        return $this->hasOne(guru_profile::class, 'user_id');
    }
    public function alumniProfile()
    {
        return $this->hasOne(alumni_profile::class, 'user_id');
    }

    public function siswaProfile()
    {
        return $this->hasOne(siswa_profile::class, 'user_id');
    }

    public function kelas()
    {
        return $this->hasOneThrough(kelas::class, siswa_profile::class, 'user_id', 'id', 'id', 'kelas_id');
    }

    public function karyaSiswa()
    {
        return $this->hasMany(karya_siswa::class, 'user_id');
    }

    public function nilaiUlangans()
    {
        return $this->hasMany(nilai_ulangan::class);
    }

    public function ulasan()
    {
        return $this->hasMany(ulasan_alumni::class);
    }

    public function jobsheet()
    {
        return $this->hasMany(Jobs::class);
    }

}

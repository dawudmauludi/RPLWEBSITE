<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ulangan extends Model
{
    use HasFactory;

    protected $table = 'ulangans';

    protected $fillable = [
        'created_by',
        'kelas_id',
        'judul',
        'link',
        'deskripsi',
        'mulai',
        'selesai',
        'is_active'
    ];

    protected $casts = [
        'mulai' => 'datetime',
        'selesai' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForKelas($query, $kelasId)
    {
        return $query->where('kelas_id', $kelasId);
    }

    public function getStatusAttribute()
    {
        $mulai = $this->mulai->setTimezone('Asia/Jakarta');
        $selesai = $this->selesai->setTimezone('Asia/Jakarta');
        $now = Carbon::now('Asia/Jakarta');
        if ($now < $mulai) {
            return 'Belum Dimulai';
        } elseif ($now >= $mulai && $now <= $selesai) {
            return 'Sedang Berlangsung';
        } else {
            return 'Selesai';
        }
    }

    public function getIsAvailableAttribute()
    {
        $mulai = $this->mulai->setTimezone('Asia/Jakarta');
        $selesai = $this->selesai->setTimezone('Asia/Jakarta');
        $now = Carbon::now('Asia/Jakarta');
        return $this->is_active && $now >= $mulai && $now <= $selesai;
    }

    protected static function booted()
    {
        static::creating(function ($ulangan) {
            $ulangan->created_by = Auth::user()->id;
        });


        static::saving(function ($ulangan) {
            $mulai = $ulangan->mulai->setTimezone('Asia/Jakarta');
            $selesai = $ulangan->selesai->setTimezone('Asia/Jakarta');
            $now = Carbon::now('Asia/Jakarta');

            if ($now >= $mulai && $now <= $selesai) {
                $ulangan->is_active = true;
            } elseif ($now > $selesai) {
                $ulangan->is_active = false;
            }
        });
    }

    public function nilaiUlangans()
    {
        return $this->hasMany(nilai_ulangan::class);
    }
}

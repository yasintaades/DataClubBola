<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'club_id',
        'transaction_date',
        'type',
        'category',
        'amount',
        'description',
    ];

    /**
     * Casts untuk kolom tanggal.
     */
    protected $casts = [
        'transaction_date' => 'date',
    ];

    /**
     * Enkripsi otomatis untuk kolom 'description'.
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    public function getDescriptionAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value; // fallback jika gagal dekripsi
        }
    }

    /**
     * Relasi ke Club.
     */
    public function club()
    {
         return $this->belongsTo(Klub::class, 'club_id');
    }
}

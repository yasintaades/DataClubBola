<?php

namespace App\Models;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use App\Models\Klub;

class Pemain extends Model
{
    use HasFactory;

    protected $fillable = ['club_id', 'name', 'position', 'number', 'birthdate', 'medical_record'];

    public function club()
    {
        return $this->belongsTo(Klub::class, 'club_id');
    }

     protected $casts = [
        'medical_record' => 'encrypted',
    ];

    
}
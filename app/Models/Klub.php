<?php

namespace App\Models;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Klub extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stadium', 'city', 'bank_account_number'];

    public function pemains()
    {
        return $this->hasMany(Pemain::class);
    }

    protected $casts = [
    'bank_account_number' => 'encrypted',
];

}


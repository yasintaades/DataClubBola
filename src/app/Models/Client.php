<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongTo;

class Client extends Model
{
    protected $tale = 'clients';
    protected $guarded =['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

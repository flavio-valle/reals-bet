<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'affiliate_id',
        'value',
        'date',
        'description',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}

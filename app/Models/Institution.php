<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rector' ,
        'zone',
        'address',
        'phone',
        'email'
    ];

    public function remittances() : HasMany {
        return $this->hasMany(Remittance::class);
    }
}

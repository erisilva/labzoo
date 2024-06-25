<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Porte extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function animals() : HasMany
    {
        return $this->hasMany(Animal::class);
    }
}

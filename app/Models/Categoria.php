<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function amostras() : HasMany
    {
        return $this->hasMany(Amostra::class);
    }
}

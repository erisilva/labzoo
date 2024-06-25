<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Metodo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function exames() : HasMany
    {
        return $this->hasMany(Exame::class);
    }
}

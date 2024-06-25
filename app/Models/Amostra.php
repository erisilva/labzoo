<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Amostra extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrada',
        'coleta',
        'descricao',
        'numero',
        'idade',
        'tipo',
        'categoria_id',
        'animal_id',
    ];

    protected $casts = [
        'created_at' => 'date',
        'entrada' => 'date',
        'coleta' => 'date',
    ];

    public function categoria() : BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function animal() : BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function exames() : HasMany
    {
        return $this->hasMany(Exame::class);
    }
}

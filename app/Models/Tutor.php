<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'rg',
        'orgao_expedidor',
        'nome',
        'nascimento',
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'uf',
        'cep',
        'email',
        'tel',
        'cel',
        'cns',
        'nota',
    ];

    protected $casts = [
        'nascimento' => 'date',
        'created_at' => 'date',
    ];

    public function animals() : HasMany
    {
        return $this->hasMany(Animal::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'rg',
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

    public function scopeFilter($query, array $filters) : void
    {
        // start session values if not yet initialized
        if (!session()->exists('tutor_nome')){
            session(['tutor_nome' => '']);
        }
        if (!session()->exists('tutor_id')){
            session(['tutor_id' => '']);
        }

        // update session values if the request has a value
        if (Arr::exists($filters, 'nome')) {
            session(['tutor_nome' => $filters['nome'] ?? '']);
        }
        
        if (Arr::exists($filters, 'id')) {
            session(['tutor_id' => $filters['id'] ?? '']);
        }
        
        // query if session filters are not empty
        if (trim(session()->get('tutor_nome')) !== '') {
            $query->where('nome', 'like', '%' . session()->get('tutor_nome') . '%');
        }

        if (trim(session()->get('tutor_id')) !== '') {
            $query->where('id', 'like', '%' . session()->get('tutor_id') . '%');
        }
    }    

    
}

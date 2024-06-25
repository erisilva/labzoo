<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'genero',
        'descricao',
        'chip',
        'raca_id',
        'porte_id',
        'cor_id',
        'regional_id',
        'tutor_id',
        'pelo_id',
    ];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function raca(): BelongsTo
    {
        return $this->belongsTo(Raca::class);
    }

    public function porte(): BelongsTo
    {
        return $this->belongsTo(Porte::class);
    }

    public function cor(): BelongsTo
    {
        return $this->belongsTo(Cor::class);
    }

    public function regional(): BelongsTo
    {
        return $this->belongsTo(Regional::class);
    }

    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }

    public function pelo(): BelongsTo
    {
        return $this->belongsTo(Pelo::class);
    }

    public function amostras() : HasMany
    {
        return $this->hasMany(Amostra::class);
    }
}

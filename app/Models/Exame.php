<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exame extends Model
{
    use HasFactory;

    protected $fillable = [
        'validade',
        'conclusao',
        'partida',
        'amostra_id',
        'metodo_id',
        'resultado_id',
    ];

    protected $casts = [
        'created_at' => 'date',
        'validade' => 'date',
        'conclusao' => 'date',
    ];

    public function amostra() : BelongsTo
    {
        return $this->belongsTo(Amostra::class);
    }

    public function metodo() : BelongsTo
    {
        return $this->belongsTo(Metodo::class);
    }

    public function resultado() : BelongsTo
    {
        return $this->belongsTo(Resultado::class);
    }
}

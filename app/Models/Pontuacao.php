<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    public $table = 'pontuacoes';

    use HasFactory;

    protected $fillable = [
        'jogador_id',
        'pontos',
        'inicio',
        'fim',
    ];

    protected $casts = [
        'inicio' => 'datetime',
        'fim' => 'datetime',
    ];

    protected $dates = [
        'inicio', 
        'fim'
    ];

    public function jogador()
    {
        return $this->belongsTo(Jogador::class);
    }

    public function getTempoSegundosAttribute()
    {
        if ($this->fim && $this->inicio) {
            return $this->fim->diffInSeconds($this->inicio);
        }
        return null;
    }

    public function getTempoFormatadoAttribute()
    {
        if ($this->inicio && $this->fim && $this->fim->greaterThan($this->inicio)) {
            $segundos = $this->inicio->diffInSeconds($this->fim);
            $horas = floor($segundos / 3600);
            $minutos = floor(($segundos % 3600) / 60);
            $segundosRestantes = $segundos % 60;

            return sprintf('%02d:%02d:%02d', $horas, $minutos, $segundosRestantes);
        }

        return '00:00:00';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    public $table = 'jogadores';
    
    use HasFactory;

    protected $fillable = [
        'nome',
        'setor_id',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    public $table = 'setores';
    
    use HasFactory;

    protected $fillable = [
        'descricao',
    ];

    public function jogadores()
    {
        return $this->hasMany(Jogador::class);
    }
}

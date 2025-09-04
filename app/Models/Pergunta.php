<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    public $table = 'perguntas';
    
    use HasFactory;

    protected $fillable = [
        'texto',
        'valor',
    ];

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}

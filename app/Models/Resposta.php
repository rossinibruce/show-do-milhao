<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    public $table = 'respostas';
    
    use HasFactory;

    protected $fillable = [
        'pergunta_id',
        'texto',
        'validacao',
    ];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
}

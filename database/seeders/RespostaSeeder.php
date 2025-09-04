<?php

namespace Database\Seeders;

use App\Models\Resposta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RespostaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resposta = [
            // Pergunta 1
            [
                'pergunta_id' => 1,
                'texto' => 'Assédio',
                'validacao' => false
            ],
            [
                'pergunta_id' => 1,
                'texto' => 'Não é assédio',
                'validacao' => true
            ],

            // Pergunta 2
            [
                'pergunta_id' => 2,
                'texto' => 'Assédio',
                'validacao' => true
            ],
            [
                'pergunta_id' => 2,
                'texto' => 'Não é assédio',
                'validacao' => false
            ],

            // Pergunta 3
            [
                'pergunta_id' => 3,
                'texto' => 'Assédio',
                'validacao' => true
            ],
            [
                'pergunta_id' => 3,
                'texto' => 'Não é assédio',
                'validacao' => false
            ],

            // Pergunta 4
            [
                'pergunta_id' => 4,
                'texto' => 'Assédio',
                'validacao' => false
            ],
            [
                'pergunta_id' => 4,
                'texto' => 'Não é assédio',
                'validacao' => true
            ],

            // Pergunta 5
            [
                'pergunta_id' => 5,
                'texto' => 'Assédio',
                'validacao' => false
            ],
            [
                'pergunta_id' => 5,
                'texto' => 'Não é assédio',
                'validacao' => true
            ],

            // Pergunta 6
            [
                'pergunta_id' => 6,
                'texto' => 'Assédio',
                'validacao' => true
            ],
            [
                'pergunta_id' => 6,
                'texto' => 'Não é assédio',
                'validacao' => false
            ],

            // Pergunta 7
            [
                'pergunta_id' => 7,
                'texto' => 'Assédio',
                'validacao' => true
            ],
            [
                'pergunta_id' => 7,
                'texto' => 'Não é assédio',
                'validacao' => false
            ],

            // Pergunta 8
            [
                'pergunta_id' => 8,
                'texto' => 'Assédio',
                'validacao' => false
            ],
            [
                'pergunta_id' => 8,
                'texto' => 'Não é assédio',
                'validacao' => true
            ],
        ];

        foreach ($resposta as $resp) {
            Resposta::create($resp);
        }
    }
}

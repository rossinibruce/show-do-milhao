<?php

namespace Database\Seeders;

use App\Models\Pergunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perguntas = [
            [
                'texto' => 'Um líder orienta um funcionário sobre um erro dizendo: "Esse ajuste da máquina precisa ser feito assim para garantir a qualidade da ração. Vou te mostrar de novo."',
                'valor' => 125
            ],
            [
                'texto' => 'Um funcionário cometeu um erro uma vez e agora todos o chamam de "Mão Podre"',
                'valor' => 125
            ],
            [
                'texto' => 'Um gestor sempre diz ao colaborador: "Se continuar assim, vou dar um jeito de te mandar embora."',
                'valor' => 125
            ],
            [
                'texto' => 'Um colaborador é obrigado a operar uma máquina sozinho, mesmo sabendo que sempre são necessárias duas pessoas.',
                'valor' => 125
            ],
            [
                'texto' => 'Um funcionário mistura os ingredientes na proporção errada, e o supervisor diz: "Isso acontece, mas da próxima vez, consulte a tabela antes de iniciar a produção."',
                'valor' => 125
            ],
            [
                'texto' => 'Sempre que o colaborador se aproxima da máquina, os colegas riem e dizem: "Cuidado para não errar de novo!"',
                'valor' => 125
            ],
            [
                'texto' => 'A equipe ignora um colega nos intervalos e se recusa a trabalhar em dupla com ele.',
                'valor' => 125
            ],
            [
                'texto' => 'O supervisor informa que a produção precisa aumentar e conversa com a equipe sobre como organizar melhor as tarefas.',
                'valor' => 125
            ],
        ];

        foreach ($perguntas as $pergunta) {
            Pergunta::create($pergunta);
        }
    }
}

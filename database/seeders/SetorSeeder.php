<?php

namespace Database\Seeders;

use App\Models\Setor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setores = [
            ['descricao' => 'Administrativo'],
            ['descricao' => 'Industrial'],
        ];

        foreach ($setores as $setor) {
            Setor::create($setor);
        }
    }
}

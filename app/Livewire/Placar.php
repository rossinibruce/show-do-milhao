<?php

namespace App\Livewire;

use App\Models\Pontuacao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Placar extends Component
{
    use WithPagination;

    public function render()
    {
        $pontuacoes = Pontuacao::with('jogador')
            ->select('*', DB::raw('TIMESTAMPDIFF(SECOND, inicio, fim) as tempo'))
            ->whereNotNull('fim')
            ->orderByDesc('pontos')
            ->orderBy('tempo', 'asc')
            ->paginate(15);
        
        return view('livewire.placar', [
            'pontuacoes' => $pontuacoes
        ]);
    }
}

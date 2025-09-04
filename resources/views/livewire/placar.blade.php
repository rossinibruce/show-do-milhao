<div>
    <div class="row mb-4">
        <table class="table table-dark table-striped table-hover table-sm">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Pontuação</th>
                    <th>Tempo</th>
                </tr>
                @if ($pontuacoes->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Nenhum jogador encontrado.</td>
                    </tr>
                @endif
                @foreach ($pontuacoes as $i => $pontuacao)
                    <tr>
                        <td>{{ $loop->iteration + ($pontuacoes->currentPage() - 1) * $pontuacoes->perPage() }}</td>
                        <td>{{ $pontuacao->jogador->nome }}</td>
                        <td>{{ $pontuacao->jogador->setor->descricao }}</td>
                        <td>{{ $pontuacao->pontos }}</td>
                        <td>{{ $pontuacao->tempo_formatado ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pontuacoes->links() }}
    </div>

    <div class="row">
        <a href="{{ route('home') }}" class="btn btn-danger">Voltar</a>
    </div>
</div>

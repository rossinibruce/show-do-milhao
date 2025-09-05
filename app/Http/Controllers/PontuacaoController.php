<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Pontuacao;
use App\Models\Pergunta;
use App\Models\Resposta;
use App\Models\Setor;
use Illuminate\Http\Request;

class PontuacaoController extends Controller
{
    public function placar()
    {
        return view('app.placar.index');
    }

    public function novoJogo()
    {
        $setores = Setor::all();

        return view('app.novo_jogo.index', compact('setores'));
    }

    public function iniciarJogo(Request $request)
    {
        // Invalida a sessão caso haja alguma ativa
        session()->invalidate();

        // Valida os dados do formulário
        $request->validate(
            [
                'nome' => 'required|string|max:255',
            ],
            [
                'nome.required' => 'O campo nome deve ser preenchido.',
                'nome.string'   => 'O nome deve ser um texto.',
                'nome.max'      => 'O nome não pode ter mais que 255 caracteres.',
            ]
        );

        // Cria o jogador
        $jogador = Jogador::create($request->all());

        // Inicia a pontuação/cronometro
        $pontuacao = Pontuacao::create([
            'jogador_id' => $jogador->id,
            'pontos' => 0,
            'inicio' => now(),
        ]);

        // Cria e armazena os dados na sessão
        session([
            'jogador_id' => $jogador->id,
            'pontuacao_id' => $pontuacao->id,
            'pergunta_id' => 1,
        ]);

        return redirect()->route('jogo', ['jogador' => $jogador->id, 'pergunta' => 1]);
    }

    public function jogo(Jogador $jogador, $pergunta)
    {
        if (session('jogador_id') != $jogador->id || session('pergunta_id') != (int) $pergunta) {
            // Invalida a sessão
            session()->invalidate();

            return redirect()->route('novo_jogo')->withErrors('Acesso inválido ao jogo.');
        }

        $pergunta = Pergunta::find($pergunta);
        $respostas = Resposta::where('pergunta_id', $pergunta->id)->get();

        // return view('app.novo_jogo.pergunta', compact('jogador', 'pergunta', 'respostas'));
        return response()
            ->view('app.novo_jogo.pergunta', compact('jogador', 'pergunta', 'respostas'))
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate') // não deixa cachear
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function resposta(Request $request)
    {
        $pergunta = Pergunta::find($request->pergunta_id);
        $resposta = Resposta::find($request->resposta);
        $pontuacao = Pontuacao::find(session('pontuacao_id'));

        // Valida resposta
        if ($resposta->validacao == 1) {
            // Atualiza a pontuação
            $pontuacao->pontos += $pergunta->valor;
            $pontuacao->fim = now();
            $pontuacao->save();

            // Verifica se foi a última pergunta
            if ($pergunta->id > 7) {
                // Finaliza o jogo
                return redirect()->route('finalizado', ['jogador' => $request->jogador_id, 'pergunta' => $pergunta->id, 'resposta' => $resposta->id]);

            } else {
                // Continua o jogo
                // Atualiza a sessão para a próxima pergunta
                session(['pergunta_id' => $pergunta->id + 1]);
                
                return redirect()->route('acertou', ['jogador' => $request->jogador_id, 'pergunta' => $pergunta->id, 'resposta' => $resposta->id]);
            }
        } else {
            // Finaliza o jogo
            // Atualiza o tempo final
            $pontuacao->fim = now();
            $pontuacao->save();
            
            return redirect()->route('errou', ['jogador' => $request->jogador_id, 'pergunta' => $request->pergunta_id, 'resposta' => $resposta->id]);
        }
    }

    public function acertou(Jogador $jogador, Pergunta $pergunta, Resposta $resposta)
    {
        if (session('jogador_id') != $jogador->id) {
            // Invalida a sessão
            session()->invalidate();

            return redirect()->route('novo_jogo')->withErrors('Acesso inválido ao jogo.');
        }

        return view('app.novo_jogo.acertou', compact('jogador', 'pergunta', 'resposta'));
    }

    public function errou(Jogador $jogador, Pergunta $pergunta, Resposta $resposta)
    {
        // Invalida a sessão ao errar a resposta
        session()->invalidate();

        return view('app.novo_jogo.errou', compact('jogador', 'pergunta', 'resposta'));
    }

    public function finalizado(Jogador $jogador, Pergunta $pergunta, Resposta $resposta)
    {
        // Invalida a sessão
        session()->invalidate();

        return view('app.novo_jogo.finalizado', compact('jogador', 'pergunta', 'resposta'));
    }
}

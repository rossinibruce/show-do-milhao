<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PontuacaoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response(204);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/placar', [PontuacaoController::class, 'placar'])->name('placar');
Route::get('/novo_jogo', [PontuacaoController::class, 'novoJogo'])->name('novo_jogo');
Route::post('/iniciar_jogo', [PontuacaoController::class, 'iniciarJogo'])->name('iniciar_jogo');
Route::get('/jogo/{jogador}/pergunta/{pergunta}', [PontuacaoController::class, 'jogo'])->name('jogo');
Route::post('/jogo/{jogador}/pergunta/{pergunta}/resposta', [PontuacaoController::class, 'resposta'])->name('resposta');
// Route::get('/jogo/{jogador}/pergunta/{pergunta}/resposta/{resposta}/acertou', [PontuacaoController::class, 'acertou'])->name('acertou');
Route::get('/jogo/{jogador}/pergunta/{pergunta}/resposta/errou', [PontuacaoController::class, 'errou'])->name('errou');

Route::middleware('auth')->group(function () {});

Auth::routes(['register' => true]);
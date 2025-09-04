<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PontuacaoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Health Check
Route::get('/health', function () {
    return response(204);
});

// Inicio
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Classificações
Route::get('/placar', [PontuacaoController::class, 'placar'])->name('placar');

// Fluxo do jogo
Route::get('/novo_jogo', [PontuacaoController::class, 'novoJogo'])->name('novo_jogo');
Route::post('/iniciar_jogo', [PontuacaoController::class, 'iniciarJogo'])->name('iniciar_jogo');
Route::get('/jogo/{jogador}/pergunta/{pergunta}', [PontuacaoController::class, 'jogo'])->name('jogo');
Route::post('/jogo/{jogador}/pergunta/{pergunta}/resposta', [PontuacaoController::class, 'resposta'])->name('resposta');

// Possiveis rotas ocasionais 
Route::get('/jogo/{jogador}/pergunta/{pergunta}/resposta/{resposta}/acertou', [PontuacaoController::class, 'acertou'])->name('acertou');
Route::get('/jogo/{jogador}/pergunta/{pergunta}/resposta/{resposta}/errou', [PontuacaoController::class, 'errou'])->name('errou');
Route::get('/jogo/{jogador}/pergunta/{pergunta}/resposta/{resposta}/finalizado', [PontuacaoController::class, 'finalizado'])->name('finalizado');

// Caso queria proteger as rotas com autenticação
Route::middleware('auth')->group(function () {});

// Disponibilizar registros (Somente caso queira permitir registros de login e novas contas)
Auth::routes(['register' => true]);
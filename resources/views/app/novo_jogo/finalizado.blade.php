@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="row mb-3">
                <div class="col-md-8 mx-auto">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <h2 class="text-warning">Parabéns {{ $jogador->nome }} você finalizou o jogo!</h2>
                <p class="text-light">Acesse a classificação para ver a sua pontuação/tempo.</p>
            </div>
        </div>

        <div class="col-md-6 mx-auto">
            <div class="row mb-4">
                <a href="{{ route('placar') }}" type="button" 
                    class="btn btn-success rounded-pill shadow-lg d-flex align-items-center justify-content-center w-100 mt-3">
                    <i class="fs-4 bi bi-trophy-fill me-2"></i>
                    Ver Classificação
                </a>
                
                <a href="{{ route('novo_jogo') }}" type="button" 
                    class="btn btn-danger rounded-pill shadow-lg d-flex align-items-center justify-content-center w-100 mt-3">
                    <i class="fs-4 bi bi-play me-2"></i>
                    Jogar Novamente
                </a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickSound = new Audio("{{ asset('sounds/parabens.mp3') }}");
            clickSound.play();
        });
    </script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto mb-4">
            <div class="row mb-3">
                <div class="col-md-8 mx-auto">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <h2 class="text-warning">Fim de jogo, você perdeu.</h2>

                <div class="col-md-8 mx-auto mt-3">
                    <img src="{{ asset('images/errou.gif') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto">
            <div class="row mb-4">
                <a href="{{ route('novo_jogo') }}" type="button" 
                    class="btn btn-success rounded-pill shadow-lg d-flex align-items-center justify-content-center mt-3">
                    <i class="fs-4 bi bi-trophy-fill me-2"></i>
                    Ver classificação
                </a>

                <a href="{{ route('novo_jogo') }}" type="button" 
                    class="btn btn-danger rounded-pill shadow-lg d-flex align-items-center justify-content-center mt-3">
                    <i class="fs-4 bi bi-play me-2"></i>
                    Jogar Novamente
                </a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickSound = new Audio("{{ asset('sounds/errou.mp3') }}");
            clickSound.play();
        });
    </script>
@endsection
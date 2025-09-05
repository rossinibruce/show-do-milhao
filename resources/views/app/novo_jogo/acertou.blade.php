@extends('layouts.app')

@section('content')
    <div class="container">
        <input type="hidden" id="jogador_id" name="jogador_id" value="{{ $jogador->id }}">
        <input type="hidden" id="pergunta_id" name="pergunta_id" value="{{ $pergunta->id + 1 }}">

        <div class="col-md-6 mx-auto mb-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <h2 class="text-warning">Certa resposta!</h2>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickSound = new Audio("{{ asset('sounds/acertou.mp3') }}");
            var jogadorId = $('#jogador_id').val();
            var perguntaId = $('#pergunta_id').val();
            clickSound.play();

            setTimeout(function() {
                window.location.href = "http://10.1.10.3:8000/jogo/" + jogadorId + "/pergunta/" + perguntaId;
            }, 2000);
        });
    </script>
@endsection
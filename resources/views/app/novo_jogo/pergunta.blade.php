@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6">
            <div class="row mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
            </div>

            <form method="POST" action="{{ route('resposta', ['jogador' => $jogador->id, 'pergunta' => $pergunta->id]) }}">
                @csrf

                <input type="hidden" name="jogador_id" value="{{ $jogador->id }}">
                <input type="hidden" name="pergunta_id" value="{{ $pergunta->id }}">
                
                <div class="card bg-danger text-white mb-5">
                    <div class="card-body">
                        <div class="row">
                            <p>{{ $pergunta->texto }}</p>
                        </div>
                    </div>
                </div>

                @foreach ($respostas as $i => $resposta)
                    <div class="col-12 mb-3">
                        <input type="radio" class="btn-check" name="resposta" id="resposta{{ $i+1 }}" autocomplete="off" value="{{ $resposta->id }}">
                        <label class="btn btn-danger d-flex align-items-center justify-content-center w-100 mb-2" for="resposta{{ $i+1 }}">
                            <i class="fs-4 text-light bi bi-{{ $i+1 }}-circle-fill me-2"></i>
                            {{ $resposta->texto }}
                        </label>
                    </div>
                @endforeach
                
                <button type="submit" id="submit" class="btn btn-danger d-none w-100 mt-4">Enviar</button>
            </form>
        </div>

        <div class="col-6">
            <div class="row mb-4">

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickSound = new Audio("{{ asset('sounds/errou.mp3') }}");

            $('input[name="resposta"]').on('change', function() {
                clickSound.play();

                $('#submit').removeClass('d-none');
            });
        });
    </script>
@endsection
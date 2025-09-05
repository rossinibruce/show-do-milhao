@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="row mb-3">
                    <div class="col-md-8 mx-auto">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                    </div>
                </div>

                <form method="POST" action="{{ route('resposta', ['jogador' => $jogador->id, 'pergunta' => $pergunta->id]) }}">
                    @csrf

                    <input type="hidden" id="jogador_id" name="jogador_id" value="{{ $jogador->id }}">
                    <input type="hidden" id="pergunta_id" name="pergunta_id" value="{{ $pergunta->id }}">
                    
                    <div class="card bg-danger text-white mb-5">
                        <div class="card-body">
                            <div class="row">
                                <p>{{ $pergunta->texto }}</p>
                            </div>
                        </div>
                    </div>

                    @foreach ($respostas as $i => $resposta)
                        <div class="col-md-12 mb-3">
                            <input type="radio" class="btn-check" name="resposta" id="resposta{{ $i+1 }}" autocomplete="off" value="{{ $resposta->id }}">
                            <label class="btn btn-danger rounded-pill shadow-lg d-flex align-items-center justify-content-center w-100 mb-2" for="resposta{{ $i+1 }}">
                                <i class="fs-4 text-light bi bi-{{ $i+1 }}-circle-fill me-2"></i>
                                {{ $resposta->texto }}
                            </label>
                        </div>
                    @endforeach
                    
                    <button type="submit" id="submit" class="btn btn-success rounded-pill shadow-lg d-none w-100 mt-4">Enviar</button>
                </form>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <img src="{{ asset('images/pergunta.gif') }}" alt="Pergunta" class="img-fluid" style="max-height: 350px;">
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var perguntaId = $('#pergunta_id').val();
            var perguntaPlay = new Audio("{{ asset('sounds/pergunta" + perguntaId + ".mp3') }}");
            var estaCerto = new Audio("{{ asset('sounds/esta-certo-disso.mp3') }}");

            perguntaPlay.play();

            $('input[name="resposta"]').on('change', function() {
                estaCerto.play();

                $('#submit').removeClass('d-none');
            });
        });
    </script>
@endsection
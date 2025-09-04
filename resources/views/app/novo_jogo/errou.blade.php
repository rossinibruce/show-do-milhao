@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6 mx-auto">
            <div class="row mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
            </div>
            <div class="card bg-danger text-white mb-5">
                <div class="card-body">
                    <div class="row justify-content-center text-center">
                        <h2>Game Over</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 mx-auto">
            <div class="row mb-4">
                <a href="{{ route('novo_jogo') }}" type="button" class="btn btn-warning w-100">Jogar Novamente</a>
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
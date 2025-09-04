@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-8 mx-auto">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('iniciar_jogo') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="name">Digite seu nome completo:</label>
                                    <input type="text" class="form-control" id="name" name="nome">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="exampleFormControlSelect1">Selecione seu setor de trabalho:</label>
                                    <select class="form-control" id="setor_id" name="setor_id">
                                        @foreach ($setores as $setor)
                                            <option value="{{ $setor->id }}">{{ $setor->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <a href="{{ route('home') }}" type="button" class="btn btn-warning">Voltar</a>
                                    <button type="submit" class="btn btn-primary">Iniciar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
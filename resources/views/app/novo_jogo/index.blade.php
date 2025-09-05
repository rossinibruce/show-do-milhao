@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="row mb-4">
                <div class="col-md-8 mx-auto">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
                </div>
            </div>
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('iniciar_jogo') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="name">Digite seu nome completo:</label>
                                    <input type="text" class="form-control" id="name" name="nome">
                                    @if ($errors->has('nome'))
                                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                                    @endif
                                </div>

                                <input type="hidden" name="setor_id" value="1">

                                <div class="form-group d-flex justify-content-center mb-4">
                                    <a href="{{ route('home') }}" type="button" 
                                        class="btn btn-warning rounded-pill shadow-lg d-flex align-items-center justify-content-center">
                                        <i class="fs-4 bi bi-door-open-fill me-2"></i>
                                        Sair
                                    </a>
                                    
                                    <button type="submit" 
                                        class="btn btn-danger rounded-pill shadow-lg d-flex align-items-center justify-content-center ms-4">
                                        <i class="fs-4 bi bi-play-fill me-2"></i>
                                        Iniciar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="row mb-4">
                            <h2 class="text-warning">Classificação dos Jogadores</h2>
                        </div>
                        <div class="col-md-10">
                            @livewire('placar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
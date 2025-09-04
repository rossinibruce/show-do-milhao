<div>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-4">
                <img class="logo-reponsive" src="{{ asset('images/logo.png') }}" alt="Show do Milhão">
            </div>

            <div class="row mt-5">
                <a href="{{ route('placar') }}" type="button" class="btn btn-danger rounded-pill shadow-lg py-2">
                    <i class="bi bi-card-list"></i>
                    Placar
                </a>
            </div>

            <div class="row mt-5">
                <a href="{{ route('novo_jogo') }}" type="button" class="btn btn-danger rounded-pill shadow-lg py-2">
                    <i class="bi bi-controller"></i>
                    Iniciar novo jogo
                </a>
            </div>
        </div>
    </div>
</div>
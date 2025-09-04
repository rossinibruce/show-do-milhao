<div>
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mx-auto d-block" style="max-height: 150px;">
        </div>

        <div class="row mt-5">
            <a href="{{ route('placar') }}" type="button" 
                class="btn btn-success rounded-pill shadow-lg d-flex align-items-center justify-content-center py-2">
                <i class="fs-4 bi bi-trophy-fill me-2"></i>
                Ver classificação
            </a>
        </div>

        <div class="row mt-5">
            <a href="{{ route('novo_jogo') }}" type="button"
                class="btn btn-danger rounded-pill shadow-lg d-flex align-items-center justify-content-center py-2">
                <i class="fs-4 bi bi-controller me-2"></i>
                Iniciar novo jogo
            </a>
        </div>
    </div>
</div>
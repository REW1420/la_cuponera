<!-- Modal -->
<div class="modal fade" id="indexModal{{ $item->id }}" tabindex="-1" aria-labelledby="indexModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    @if ($item->status_id == 1)
                        <span
                            class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Aprovado</span>
                    @elseif($item->status_id == 2)
                        <span
                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">Pendiente</span>
                    @elseif($item->status_id == 3)
                        <span
                            class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">Rechazado</span>
                    @elseif($item->status_id == 4)
                        <span
                            class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">Descartado</span>
                    @elseif($item->status_id == 5)
                        <span
                            class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Activo</span>
                    @elseif($item->status_id == 6)
                        <span
                            class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Vencido</span>
                    @else
                        <span
                            class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Unknown</span>
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-10">
                            <div class="row align-items-start">
                                <h3 class="col mb-2">{{ $item->title }}</h3>

                            </div>
                            <hr>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Precio Regular:</h5>
                                                    <p class="lead">${{ $item->regular_price }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Precio de Oferta:</h5>
                                                    <p class="lead">${{ $item->offer_price }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Fecha de compra:</h5>
                                                    <p class="lead">
                                                        {{ \Carbon\Carbon::parse($item->purchase_date)->format('d/m/Y') }}
                                                    </p>

                                                </div>
                                                <div class="mb-3">
                                                    <h5>Valido hasta:</h5>
                                                    <p class="lead">
                                                        {{ \Carbon\Carbon::parse($item->expiration_date)->format('d/m/Y') }}
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Fecha Límite de Uso del Cupón:</h5>
                                                    <p class="lead">{{ $item->coupon_usage_limit_date }}</p>
                                                </div>


                                                <div class="mb-3">
                                                    <h5>Detalles Adicionales:</h5>
                                                    <p class="lead">{{ $item->other_details }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center my-3">
                                    <div class="card m-2">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="align-self-center me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                                    fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z" />
                                                </svg>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="mb-0">{{ $item->unique_code }}</h3>
                                                <span class="d-block">Codigo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

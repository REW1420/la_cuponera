<!-- Modal -->
<div class="modal fade" id="indexModal{{ $offer->id }}" tabindex="-1" aria-labelledby="indexModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h2 class=" mb-4">{{ $offer->title }}</h2>
                            @if ($offer->status_id == 1)
                                <span
                                    class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Aprovado</span>
                            @elseif($offer->status_id == 2)
                                <span
                                    class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">Pendiente</span>
                            @elseif($offer->status_id == 3)
                                <span
                                    class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">Rechazado</span>
                            @elseif($offer->status_id == 4)
                                <span
                                    class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">Descartado</span>
                            @else
                                <span
                                    class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Unknown</span>
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <h4>Precio Regular:</h4>
                                        <p class="lead">{{ $offer->regular_price }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Precio de Oferta:</h4>
                                        <p class="lead">{{ $offer->offer_price }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Fecha de Inicio:</h4>
                                        <p class="lead">{{ $offer->start_date }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h4>Fecha de Fin:</h4>
                                        <p class="lead">{{ $offer->end_date }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Fecha Límite de Uso del Cupón:</h4>
                                        <p class="lead">{{ $offer->coupon_usage_limit_date }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Cantidad Límite de Cupones:</h4>
                                        <p class="lead">{{ $offer->coupon_limit_quantity }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Descripción:</h4>
                                        <p class="lead">{{ $offer->description }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4>Detalles Adicionales:</h4>
                                        <p class="lead">{{ $offer->other_details }}</p>
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

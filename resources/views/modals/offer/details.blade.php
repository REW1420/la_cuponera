<!-- Modal -->
<div class="modal fade" id="detailsModal{{ $item->id }}" tabindex="-1" aria-labelledby="indexModal" aria-hidden="true">
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
                            <h3 class=" mb-4">{{ $item->title }}</h3>

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
                                                    <h5>Fecha de Inicio:</h5>
                                                    <p class="lead">{{ $item->start_date }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Fecha de Fin:</h5>
                                                    <p class="lead">{{ $item->end_date }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Fecha Límite de Uso del Cupón:</h5>
                                                    <p class="lead">{{ $item->coupon_usage_limit_date }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Cantidad Límite de Cupones:</h5>
                                                    <p class="lead">{{ $item->coupon_limit_quantity }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Descripción:</h5>
                                                    <p class="lead">{{ $item->description }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Detalles Adicionales:</h5>
                                                    <p class="lead">{{ $item->other_details }}</p>
                                                </div>

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
                <a href="{{ route('cart.add', $item->id) }}" class="btn btn-primary " role="button">
                    Agregar al carrito
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                </a>

            </div>
        </div>
    </div>
</div>

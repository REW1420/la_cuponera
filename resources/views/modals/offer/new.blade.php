<!-- Modal -->
<div class="modal fade" id="indexModal{{ $offer->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="indexModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
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
                    @elseif($offer->status_id == 5)
                        <span
                            class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Activo</span>
                    @elseif($offer->status_id == 6)
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
                            <h3 class=" mb-4">{{ $offer->title }}</h3>

                            <hr>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Precio Regular:</h5>
                                                    <p class="lead">${{ $offer->regular_price }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Precio de Oferta:</h5>
                                                    <p class="lead">${{ $offer->offer_price }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Fecha de Inicio:</h5>
                                                    <p class="lead">{{ $offer->start_date }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Fecha de Fin:</h5>
                                                    <p class="lead">{{ $offer->end_date }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Fecha Límite de Uso del Cupón:</h5>
                                                    <p class="lead">{{ $offer->coupon_usage_limit_date }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Cantidad Límite de Cupones:</h5>
                                                    <p class="lead">{{ $offer->coupon_limit_quantity }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Descripción:</h5>
                                                    <p class="lead">{{ $offer->description }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Detalles Adicionales:</h5>
                                                    <p class="lead">{{ $offer->other_details }}</p>
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
                <form action="{{ route('approved.offer') }}" method="post">
                    @csrf
                    <input hidden type="numer" name="id" id="id" value="{{ $offer->id }}">
                    <button type="submit" class="btn btn-success">Aprobar</button>
                </form>
                <button class="btn btn-warning" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Rechazar</button>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Detalle la razon de rechazo de esta oferta </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create.reason') }}" method="post">
                    @csrf
                    <input hidden type="numer" name="id" id="id" value="{{ $offer->id }}">
                    <div class="form-floating">
                        <textarea class="form-control" name="reason" id="reason"></textarea>
                        <label for="reason">Razon de rechazo</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="indexModal{{ $offer->id }}" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
            </div>
            </form>
        </div>
    </div>
</div>

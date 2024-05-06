<!-- Modal -->
<div class="modal fade" id="indexModal{{ $offer->id }}" tabindex="-1" aria-labelledby="indexModal" aria-hidden="true">
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


                            <div class="d-flex align-items-center my-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="align-self-center me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                            </svg>
                                        </div>
                                        <div class="text-right">
                                            <?php $purchase_left_count = 0; ?>

                                            @foreach ($purchases as $purchase)
                                                @if ($purchase->offer_id == $offer->id)
                                                    <?php $purchase_left_count++; ?>
                                                @endif
                                            @endforeach
                                            <h3 class="mb-0">
                                                {{ $offer->coupon_limit_quantity - $purchase_left_count }}</h3>

                                            <span class="d-block">Cupones restantes</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="align-self-center me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                                            </svg>
                                        </div>
                                        <div class="text-right">

                                            <?php $purchaseCount = 0; ?>

                                            @foreach ($purchases as $purchase)
                                                @if ($purchase->offer_id == $offer->id)
                                                    <?php $purchaseCount++; ?>
                                                @endif
                                            @endforeach
                                            <h3 class="mb-0">{{ $purchaseCount }}</h3>




                                            <span class="d-block">Cupones vendidos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center my-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="align-self-center me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                            </svg>
                                        </div>
                                        <div class="text-right">
                                            <?php $purchase_left_count = 0; ?>

                                            @foreach ($purchases as $purchase)
                                                @if ($purchase->offer_id == $offer->id)
                                                    <?php $purchase_left_count++; ?>
                                                @endif
                                            @endforeach
                                            <h3 class="mb-0">
                                                ${{ $company->commission * $purchaseCount }}</h3>

                                            <span class="d-block">Cargo por servicio</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="align-self-center me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                                            </svg>
                                        </div>
                                        <div class="text-right">

                                            <?php $purchaseCount = 0; ?>

                                            @foreach ($purchases as $purchase)
                                                @if ($purchase->offer_id == $offer->id)
                                                    <?php $purchaseCount++; ?>
                                                @endif
                                            @endforeach
                                            <h3 class="mb-0">${{ $purchaseCount * $offer->offer_price }}</h3>




                                            <span class="d-block">Ingresos totales</span>
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

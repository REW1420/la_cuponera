<section>
    @foreach ($offer as $item)
        <div class="container py-5">


            <div class="row justify-content-center">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row justify-content-center">

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{ $item->title }}</h5>
                                    <div class="d-flex flex-row">
                                        <div class=" mb-1 me-2">
                                            Disponibles:
                                        </div>
                                        <span>{{ $item->coupon_limit_quantity }}</span>
                                    </div>
                                    <div class="mt-1 mb-0 text-muted small">
                                        <span>TODO</span>
                                        <span class="text-primary"> </span>
                                        <span></span>
                                        <span class="text-primary"></span>
                                        <span><br /></span>
                                    </div>

                                    <p class=" mb-4 mb-md-0">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">${{ $item->offer_price }}</h4>
                                        <span class="text-danger"><s>${{ $item->regular_price }}</s></span>
                                    </div>
                                    <h6 class="text-success">Disponible hasta {{ $item->end_date }}</h6>
                                    <div class="d-flex flex-column mt-4">
                                        <button data-bs-toggle="modal" data-bs-target="#detailsModal{{ $item->id }}"
                                            data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm"
                                            type="button">Detalles</button>
                                        <a href="{{ route('cart.add', $item->id) }}"
                                            class="btn btn-outline-primary btn-sm my-2" role="button">
                                            Agregar al carrito
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modals.offer.details')
    @endforeach
</section>

<style>
    .coupon .kanan {
        border-left: 1px dashed black;
        width: 40% !important;
        position: relative;
    }

    .coupon .kanan .info::after,
    .coupon .kanan .info::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: gray;
        border-radius: 100%;
    }

    .coupon .kanan .info::before {
        top: -10px;
        left: -10px;
    }

    .coupon .kanan .info::after {
        bottom: -10px;
        left: -10px;
    }

    .coupon .time {
        font-size: 1.6rem;
    }
</style>


<div class="container">

    <div class="row">



        @foreach ($coupons as $item)
            <div class="col-sm-6">
                <div
                    class="coupon bg-white rounded my-2 mb-3  d-flex justify-content-between border border-dashed border-dark">
                    <div class="kiri p-3">
                        <div class="icon-container ">
                            <div class="icon-container_box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor"
                                    class="bi bi-percent" viewBox="0 0 16 16">
                                    <path
                                        d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0M4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5m7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="tengah py-3 d-flex w-100 justify-content-start">
                        <div>
                            @switch($item->status_id)
                                @case(5)
                                    <span class="my-1 badge rounded-pill bg-success">Disponible</span>
                                @break

                                @case(4)
                                    <span class="my-1 badge rounded-pill bg-info">Canjeado</span>
                                @break

                                @case(6)
                                    <span class="my-1 badge rounded-pill bg-danger">Vencido</span>
                                @break

                                @default
                            @endswitch

                            <h3 class="lead">{{ $item->title }} </h3>
                            <p class="text-muted mb-0">{{ $item->description }}</p>
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="info m-3 d-flex align-items-center">
                            <div class="w-100">
                                <div class="block">
                                    <span class="time font-weight-light">
                                        <span id="countdown"><?php
                                        // Obtener la fecha actual
                                        $currentDate = \Carbon\Carbon::now();
                                        
                                        // Obtener la fecha de vencimiento de la base de datos (suponiendo que $item->expiration_date contiene la fecha almacenada)
                                        $expirationDate = \Carbon\Carbon::parse($item->expiration_date);
                                        
                                        // Calcular la diferencia en días entre la fecha de vencimiento y la fecha actual
                                        $daysDifference = $currentDate->diffInDays($expirationDate, false);
                                        
                                        // Si $daysDifference es negativo, establecerlo en 0 para evitar resultados negativos
                                        $daysDifference = max($daysDifference, 0);
                                        ?>

                                            {{ $daysDifference }} días

                                        </span>


                                    </span>
                                </div>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#indexModal{{ $item->id }}"
                                    class="btn my-3 btn-sm btn-outline-primary btn-block">
                                    Detalles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('modals.coupon.index')
        @endforeach

    </div>
</div>

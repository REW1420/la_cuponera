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



        <div class="col-sm-6">
            <div
                class="coupon bg-white rounded my-2 mb-3 d-flex justify-content-between border border-dashed border-dark">
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
                        <span class="my-1 badge rounded-pill bg-success">Disponible</span>
                        <h3 class="lead">Titulo </h3>
                        <p class="text-muted mb-0">detalles</p>
                    </div>
                </div>
                <div class="kanan">
                    <div class="info m-3 d-flex align-items-center">
                        <div class="w-100">
                            <div class="block">
                                <span class="time font-weight-light">
                                    <span>19 days</span>
                                </span>
                            </div>
                            <a target="_blank" class="btn btn-sm btn-outline-primary btn-block">
                                Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="coupon bg-white rounded my-2 mb-3 d-flex justify-content-between border border-dark">
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
                        <span class="my-1 badge rounded-pill bg-danger">Vencido</span>
                        <h3 class="lead">Titulo </h3>
                        <p class="text-muted mb-0">detalles</p>
                    </div>
                </div>
                <div class="kanan">
                    <div class="info m-3 d-flex align-items-center">
                        <div class="w-100">
                            <div class="block">
                                <span class="time font-weight-light">
                                    <span>19 days</span>
                                </span>
                            </div>
                            <a target="_blank" class="btn btn-sm btn-outline-primary btn-block">
                                Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="coupon bg-white rounded my-2 mb-3 d-flex justify-content-between border border-dark">
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
                        <span class="my-1 badge rounded-pill bg-info">Canjeado</span>
                        <h3 class="lead">Titulo </h3>
                        <p class="text-muted mb-0">detalles</p>
                    </div>
                </div>
                <div class="kanan">
                    <div class="info m-3 d-flex align-items-center">
                        <div class="w-100">
                            <div class="block">
                                <span class="time font-weight-light">
                                    <span>19 dias</span>
                                </span>
                            </div>
                            <a target="_blank" class="btn btn-sm btn-outline-primary btn-block">
                                Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infoModal{{ $user->id }}" tabindex="-1" aria-labelledby="infoModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-10">
                            <h3 class=" mb-4">{{ $user->name }}</h3>

                            <hr>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Correo:</h5>
                                                    <p class="lead">{{ $user->name }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Telefono:</h5>
                                                    <p class="lead">{{ $client->phone }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>DUI:</h5>
                                                    <p class="lead">{{ $client->dui }}</p>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <h5>Fecha de Creacion:</h5>
                                                    <p class="lead">{{ $user->created_at }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>Ultima actualizacion:</h5>
                                                    <p class="lead">{{ $user->updated_at }}</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center my-3">
                                @foreach ($coupons as $coupon)
                                    @if ($coupon->owner_id === $client->id)
                                        <div class="card m-2">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="align-self-center me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                        height="36" fill="currentColor" class="bi bi-bag"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <h3 class="mb-0"></h3>
                                                    <span class="d-block">Cupones comprados</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card m-2">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="align-self-center me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                        height="36" fill="currentColor"
                                                        class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <?php $active_count;
                                                    
                                                    ?>
                                                    <h3 class="mb-0">15</h3>
                                                    <span class="d-block">Cupones activos</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card m-2">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="align-self-center me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                        height="36" fill="currentColor" class="bi bi-bag"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <h3 class="mb-0"></h3>
                                                    <span class="d-block">Cupones vencidos</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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

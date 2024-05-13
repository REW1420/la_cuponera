<!-- Modal -->
<div class="modal fade" id="addOfferModal" tabindex="-1" aria-labelledby="addOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una Nueva Oferta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('store.create.offert') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="number" hidden value="{{ $company_id }}" id="company_id" name="company_id">
                        <label for="title" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                        <div id="nombreRubroHelp" class="form-text">Ingrese el titutlo .
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="description" name="description"
                            title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                        <div id="nombreRubroHelp" class="form-text">Ingrese la descripción .
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="other_details" class="form-label">Otros detalles</label>
                        <input type="text" class="form-control" id="other_details" name="other_details"
                            title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                        <div id="nombreRubroHelp" class="form-text">Ingrese si tiene mas detalles .
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="regular_price" class="form-label">Precio Regular</label>
                        <input type="number" class="form-control" id="regular_price" name="regular_price"
                            pattern="^(?!0+(\.0+)?$)\d+(\.\d{2})?$" title="Ingrese un precio válido mayor que cero (por ejemplo, 20.00)"
                            aria-describedby="priceHelp" required min="0.00">
                        <div id="priceHelp" class="form-text">Ingrese el Precio Regular en el formato correcto, por ejemplo, 20.00.</div>
                    </div>


                    <div class="mb-3">
                        <label for="offer_price" class="form-label">Precio en Oferta</label>
                        <input type="number" class="form-control" id="offer_price" name="offer_price"
                            pattern="^(?!0+(\.0+)?$)\d+(\.\d{2})?$" title="Ingrese un precio válido mayor que cero (por ejemplo, 20.00)"
                            aria-describedby="priceHelp" required min="0.00">
                        <div id="priceHelp" class="form-text">Ingrese el Precio de la oferta en el formato correcto, por ejemplo, 20.00.</div>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                            aria-describedby="dateHelp" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                        <div id="dateHelp" class="form-text">Ingrese la fecha de inicio de la oferta.</div>
                    </div>

                    <div class="mb-3">
                        <label for="finish_date" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date"
                            aria-describedby="dateHelp" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                        <div id="dateHelp" class="form-text">Ingrese la fecha maxima para obtener la oferta.</div>
                    </div>

                    <div class="mb-3">
                        <label for="limit_date" class="form-label">Fecha de Limite de Uso.</label>
                        <input type="date" class="form-control" id="limit_date" name="limit_date"
                            aria-describedby="dateHelp" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                        <div id="dateHelp" class="form-text">Ingrese la fecha limite en la que se puede utilizar la oferta.</div>
                    </div>

                    <div class="mb-3">
                        <label for="coupon_quantity" class="form-label">Cantidad Límite de Cupones</label>
                        <input type="number" class="form-control" id="coupon_quantity" name="coupon_quantity"
                            aria-describedby="quantityHelp" required min="0" step="1">
                        <div id="quantityHelp" class="form-text">Ingrese una cantidad límite, desde cero.</div>
                    </div>


            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

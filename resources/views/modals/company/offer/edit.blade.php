<!-- Modal -->
<div class="modal fade" id="editModal{{ $offer->id }}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar oferta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUpdate" action="{{ route('update.offer', $offer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $offer->title }}" required>
                        <div class="invalid-feedback">Por favor, ingresa un título.</div>
                    </div>

                    <div class="mb-3">
                        <label for="regular_price" class="form-label">Precio Regular</label>
                        <input type="number" step="0.1" class="form-control" id="regular_price"
                            name="regular_price" value="{{ $offer->regular_price }}" required pattern="\d+(\.\d{2})?">
                        <div class="invalid-feedback">Por favor, ingresa un precio regular válido (por ejemplo, 10.99).
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="offer_price" class="form-label">Precio de Oferta</label>
                        <input type="number" step="0.1" class="form-control" id="offer_price" name="offer_price"
                            value="{{ $offer->offer_price }}" required pattern="\d+(\.\d{2})?">
                        <div class="invalid-feedback">Por favor, ingresa un precio de oferta válido (por ejemplo, 5.00).
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                            value="{{ $offer->start_date }}" required>
                        <div class="invalid-feedback">Por favor, ingresa una fecha de inicio válida.</div>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                            value="{{ $offer->end_date }}" required>
                        <div class="invalid-feedback">Por favor, ingresa una fecha de fin válida.</div>
                    </div>

                    <div class="mb-3">
                        <label for="coupon_usage_limit_date" class="form-label">Fecha Límite de Uso del Cupón</label>
                        <input type="date" class="form-control" id="coupon_usage_limit_date"
                            name="coupon_usage_limit_date" value="{{ $offer->coupon_usage_limit_date }}" required>
                        <div class="invalid-feedback">Por favor, ingresa una fecha límite de uso del cupón válida.</div>
                    </div>

                    <div class="mb-3">
                        <label for="coupon_limit_quantity" class="form-label">Cantidad Límite de Cupones</label>
                        <input type="number" class="form-control" id="coupon_limit_quantity"
                            name="coupon_limit_quantity" value="{{ $offer->coupon_limit_quantity }}" required
                            min="1">
                        <div class="invalid-feedback">Por favor, ingresa una cantidad válida de cupones (mínimo 1).
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $offer->description }}</textarea>
                        <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                    </div>

                    <div class="mb-3">
                        <label for="other_details" class="form-label">Detalles Adicionales</label>
                        <textarea class="form-control" id="other_details" name="other_details">{{ $offer->other_details }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status_id" class="form-label">ID de Estado</label>
                        <select class="form-select" id="status_id" name="status_id"
                            aria-describedby="categoryIdHelp" required>
                            <option value="1" {{ $offer->status_id == 1 ? 'selected' : '' }}>Aprobado</option>
                            <option value="2" {{ $offer->status_id == 2 ? 'selected' : '' }}>Pendiente</option>
                            <option value="3" {{ $offer->status_id == 3 ? 'selected' : '' }}>Rechazado</option>
                            <option value="4" {{ $offer->status_id == 4 ? 'selected' : '' }}>Descartado</option>
                        </select>
                        <div class="invalid-feedback">Por favor, selecciona un estado.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

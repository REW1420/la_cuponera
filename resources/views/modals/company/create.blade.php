<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar nueva empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('store.company') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                        <div id="nombreRubroHelp" class="form-text">Ingrese el nombre de la empresa.
                        </div>
                    </div>
                    <!--   <div class="mb-3">
                        <label for="code" class="form-label">Código</label>
                        <input type="text" class="form-control" id="code" name="code"
                            aria-describedby="codeHelp" required>
                        <div id="codeHelp" class="form-text">Ingrese el código del rubro.</div>
                    </div>-->
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address"
                            aria-describedby="addressHelp" required>
                        <div id="addressHelp" class="form-text">Ingrese la dirección de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Nombre de contacto</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name"
                            aria-describedby="contactNameHelp" required>
                        <div id="contactNameHelp" class="form-text">Ingrese el nombre de contacto de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            aria-describedby="phoneHelp" required>
                        <div id="phoneHelp" class="form-text">Ingrese el número de teléfono de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Ingrese el correo electrónico de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select class="form-select" id="category_id" name="category_id"
                            aria-describedby="categoryIdHelp" required>
                            <option value="">Seleccionar categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div id="categoryIdHelp" class="form-text">Seleccione la categoría del rubro.</div>
                    </div>


                    <div class="mb-3">
                        <label for="commission" class="form-label">Comisión</label>
                        <input type="number" class="form-control" id="commission" name="commission" step="0.01"
                            min="0" max="999.99" aria-describedby="commissionHelp" required>
                        <div id="commissionHelp" class="form-text">Ingrese el porcentaje de comisión de copro por
                            venta.
                        </div>




                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>

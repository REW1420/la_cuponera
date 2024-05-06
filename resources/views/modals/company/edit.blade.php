<!-- Modal -->
<div class="modal fade" id="editModal{{ $company->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.company', $company->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required
                            value="{{ $company->name }}" />
                        <div id="nombreRubroHelp" class="form-text">Ingrese el nombre de la empresa.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address"
                            aria-describedby="addressHelp" required value="{{ $company->address }}">
                        <div id="addressHelp" class="form-text">Ingrese la dirección de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Nombre de contacto</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name"
                            aria-describedby="contactNameHelp" required value="{{ $company->contact_name }}">
                        <div id="contactNameHelp" class="form-text">Ingrese el nombre de contacto de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            aria-describedby="phoneHelp" required value="{{ $company->phone }}">
                        <div id="phoneHelp" class="form-text">Ingrese el número de teléfono de la empresa (sin codigo de
                            area).</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required value="{{ $company->email }}">
                        <div id="emailHelp" class="form-text">Ingrese el correo electrónico de la empresa.</div>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select class="form-select" id="category_id" name="category_id"
                            aria-describedby="categoryIdHelp" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $company->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <div id="categoryIdHelp" class="form-text">Seleccione la categoría del rubro.</div>
                    </div>


                    <div class="mb-3">
                        <label for="commission" class="form-label">Comisión</label>
                        <input type="number" class="form-control" id="commission" name="commission" step="0.01"
                            min="0" max="999.99" aria-describedby="commissionHelp" required
                            value="{{ $company->commission }}">
                        <div id="commissionHelp" class="form-text">Ingrese el porcentaje de comisión de copro por venta.
                        </div>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

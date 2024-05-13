<!-- Modal -->
<div class="modal fade" id="editModal{{ $clerk->id }}" tabindex="-1" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar nueva empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.clerk', $clerk->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="number" hidden value="{{ $company_id }}" id="company_id" name="company_id">
                        <label for="name" class="form-label">Nombre</label>
                        <input value="{{ $clerk->name }}" type="text" class="form-control" id="name"
                            name="name" title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                        <div id="nombreRubroHelp" class="form-text">Ingrese el nombre .
                        </div>
                    </div>




                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input value="{{ $clerk->email }}" type="email" class="form-control" id="email"
                            name="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Ingrese el correo electrónico .</div>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>

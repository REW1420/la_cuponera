 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Crea nuevp rubro de empresa</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('store.category') }}">
                     @csrf

                     <div class="mb-3">
                         <label for="nombreRubro" class="form-label">Nombre del rubro</label>
                         <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z]+"
                             title="Solo se permiten letras" aria-describedby="nombreRubroHelp" required>
                         <div id="nombreRubroHelp" class="form-text">Ingrese el nombre del rubro utilizando solo letras.
                         </div>
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

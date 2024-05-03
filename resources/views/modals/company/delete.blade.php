 <!-- Modal -->
 <div class="modal fade" id="deleteModal{{ $company->id }}" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de elminar el registro
                     ?</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <p>Los datos de la empresa <strong>{{ $company->name }}</strong> se eliminaran de forma permamente.</p>
                 <form id="formDelete" action="{{ route('destroy.company', $company->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <div class="modal-footer">
                         <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-danger">Aceptar</button>
                     </div>

                 </form>
             </div>

         </div>
     </div>
 </div>

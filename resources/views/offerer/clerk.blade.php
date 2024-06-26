<?php
$a = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
    @include('header.offerer')
    @include('header.background')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <p class="h2 my-4">Gestion de empresas</p>

        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p class="h2 my-4">Empresa: </p>

            <button data-bs-toggle="modal" data-bs-target="#createModal" type="button" class="btn btn-primary">Crear
                nuevo dependiente de
                sucursal</button>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Table -->
        <div class="table-responsive">
            <table id="categoryTable" class="table table-hover" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Admin</th>
                        <th>Creado </th>

                        <th>Ultima actualizacion</th>

                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clerks as $clerk)
                        <tr>
                            <td>{{ $clerk->id }}</td>
                            <td>{{ $clerk->name }}</td>
                            <td>{{ $clerk->email }}</td>
                            @if ($clerk->email === $clerk->adminEmail)
                                <td>Si</td>
                            @else
                                <td>No</td>
                            @endif

                            <td> {{ \Carbon\Carbon::parse($clerk->created_at)->format('d/m/Y') }}</td>
                            <td> {{ \Carbon\Carbon::parse($clerk->updated_at)->format('d/m/Y') }}</td>




                            </td>

                            <td>
                                <div class="d-flex flex-row mb-3">



                                    <div>
                                        <a href="#" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $clerk->id }}">
                                            <i class="material-icons text-warning">Editar</i>
                                        </a>
                                    </div>
                                    @if ($clerk->email === $clerk->adminEmail)
                                    @else
                                        <div>
                                            <a href="#" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $clerk->id }}">
                                                <i class="material-icons text-danger">Eliminar</i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </td>



                        </tr>
                        @include('modals.offer.clerk.delete')
                        @include('modals.offer.clerk.edit')
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>


    @include('modals.offer.clerk.create', ['company_id' => $company_id])









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 2
                }],
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    //customize pagination prev and next buttons: use arrows instead of words
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left">-</span>',
                        'next': '<span class="fa fa-chevron-right">+</span>'
                    },
                    "pageLength": 5, // Mostrar inicialmente solo 5 elementos

                    //customize number of elements to be displayed
                    "lengthMenu": 'Mostrar <select class="form-control input-sm">' +
                        '<option selected value="5">5</option>' +
                        // Nueva opción para mostrar 5 elementos por página
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">All</option>' +
                        '</select> '


                }
            })
        });
    </script>





</body>

</html>

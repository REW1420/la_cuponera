<?php
$a = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
    @include('header.admin')
    @include('header.background')
    <div class="container">
        <p class="h2 my-4">Control de solitudes de ofertas</p>
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
                        <th>Titulo</th>
                        <th>Precio regular</th>
                        <th>Precio en oferta</th>
                        <th>Finaliza</th>
                        <th>Estado</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($new_offers as $offer)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>{{ $offer->title }}</td>
                            <td>{{ $offer->regular_price }}</td>
                            <td>{{ $offer->offer_price }}</td>
                            <td>{{ $offer->end_date }}</td>
                            <td>
                                @if ($offer->status_id == 1)
                                    <span
                                        class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Aprovado</span>
                                @elseif($offer->status_id == 2)
                                    <span
                                        class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">Pendiente</span>
                                @elseif($offer->status_id == 3)
                                    <span
                                        class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">Rechazado</span>
                                @elseif($offer->status_id == 4)
                                    <span
                                        class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">Descartado</span>
                                @elseif($offer->status_id == 5)
                                    <span
                                        class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Activo</span>
                                @elseif($offer->status_id == 6)
                                    <span
                                        class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Vencido</span>
                                @else
                                    <span
                                        class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Desconocido</span>
                                @endif

                            </td>

                            <td>
                                <div class="d-flex flex-row mb-3">
                                    <div>
                                        <a href="#" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#indexModal{{ $offer->id }}">
                                            <i style="color: green" class="material-icons">Ver</i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $offer->id }}">
                                            <i class="material-icons text-warning">Editar</i>
                                        </a>
                                    </div>

                                </div>
                            </td>



                        </tr>

                        @include('modals.offer.new')
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>











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

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
    @include('admin.header')

    <div class="container">

        <button type="button" class="btn btn-info py-2 my-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Agregar nuevo rubro
        </button>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rubro</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category)
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>



                        <td>
                            <div class="d-flex flex-row  mb-3">
                                <div>
                                    <a href="#" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $category->id }}"> <i
                                            class="material-icons text-warning">Editar</i></a>
                                </div>


                                <div>
                                    <a href="#" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $category->id }}"> <i
                                            class="material-icons text-danger">Eliminar</i></a>
                                </div>



                            </div>
                        </td>
                        @include('modals.category.delete')
                        @include('modals.category.edit')
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>



    @include('modals.category.create')






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.deleteBtb').click(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $("#item_id").val(id);
                $('#deleteModal').modal('show')
                console.log('aa')
            });
        });
    </script>



</body>

</html>

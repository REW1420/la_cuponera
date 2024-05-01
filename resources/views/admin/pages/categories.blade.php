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

        <button type="button" class="btn btn-info py-2 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar nuevo rubro
        </button>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Rubro</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category)
                        <tr>

                            <th scope="row">{{ $category->category_id }}</th>
                            <td>{{ $category->name }}</td>



                            <td>
                                <div class="d-flex flex-row  mb-3">
                                    <div><button type="button" class="btn">
                                            <i class="material-icons text-warning">Editar</i>
                                        </button></div>
                                    <div><button type="button" class="btn">
                                            <i class="material-icons text-danger">Eliminar</i>
                                        </button></div>
                                </div>
                            </td>
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

</body>

</html>

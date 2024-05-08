<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @include('header.header')
    @include('header.background')
    <div class="container">
        <p class="h2 my-4">Cupones en oferta</p>
        <div class="table-responsive">
            <table id="categoryTable" class="table my-5 table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Precio Regular</th>
                        <th>Precio de Oferta</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <td>{{ $offer->title }}</td>
                        <td>{{ $offer->regular_price }}</td>
                        <td>{{ $offer->offer_price }}</td>
                        <td>{{ $offer->start_date}}</td>
                        <td>{{ $offer->end_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            
        
        </div>
    </div>
</body>
</html>
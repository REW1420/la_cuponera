<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de Compra</title>
    <style>
        /* Estilos para el cuerpo del correo */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Estilos para el contenedor principal */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para el encabezado */
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        /* Estilos para el contenido */
        .content {
            padding: 20px;
        }

        /* Estilos para la tabla */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        /* Estilos para el botón */
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Detalles de Compra</h1>
        </div>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail['title'] }}</td>
                            <td>{{ $detail['quantity'] }}</td>
                            <td>{{ $detail['price'] }}</td>
                            <td>{{ $total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Esperamos que esta información te sea útil.</p>
        </div>
        <div class="footer">
            <p>Gracias,</p>
            <p>La Cuponera</p>
        </div>
    </div>
</body>

</html>

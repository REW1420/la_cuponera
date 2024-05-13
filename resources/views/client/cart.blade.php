<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('header.client', ['cartLength' => $cartLength])
    @include('header.background')

    <div class="container mt-5">
        <h2>Carrito de Compras</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>expira</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $id => $details)
                        <tr>
                            <td>{{ $details['id'] }}</td>
                            <td>{{ $details['title'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['price'] }}</td>
                            <td>{{ $details['expiration_date'] }}</td>
                            <td>{{ $details['quantity'] * $details['price'] }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Quitar Uno</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">¡Tu carrito está vacío!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($isEmpty)
            <button type="button" class="btn btn-primary" disabled>Carrito Vacío </button>
        @else
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Realizar Pago
            </button>
        @endif


    </div>


    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="indexModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Detalles de Pago</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payment.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                            <input max="16" type="text" class="form-control" id="cardNumber" name="card_number"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="cardHolder" class="form-label">Nombre del Titular</label>
                            <input type="text" class="form-control" id="cardHolder" name="card_holder" required>
                        </div>
                        <div class="mb-3">
                            <label for="expirationDate" class="form-label">Fecha de Expiración</label>
                            <input type="month" class="form-control" id="expirationDate" name="card_expiration"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text" class="form-control" id="cvc" name="card_cvc" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Total a Pagar</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ $total }}" readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirmar Pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

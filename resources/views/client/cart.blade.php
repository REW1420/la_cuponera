<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('header.header')
    @include('header.background')
    
    <div class="container mt-5">
        <h2>Carrito de Compras</h2>
        <a href="{{ route('offers.index') }}" class="btn btn-secondary mb-3">Volver a Ofertas</a>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $id => $details)
                        <tr>
                            <td>{{ $details['title'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['price'] }}</td>
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
        
        <button type="button" class="btn btn-primary" {{ $isEmpty ? 'disabled' : 'data-toggle=modal data-target=#paymentModal' }}>
            {{ $isEmpty ? 'Carrito Vacío' : 'Realizar Pago' }}
        </button>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="cardNumber" name="card_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="cardHolder" class="form-label">Nombre del Titular</label>
                            <input type="text" class="form-control" id="cardHolder" name="card_holder" required>
                        </div>
                        <div class="mb-3">
                            <label for="expirationDate" class="form-label">Fecha de Expiración</label>
                            <input type="month" class="form-control" id="expirationDate" name="card_expiration" required>
                        </div>
                        <div class="mb-3">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text" class="form-control" id="cvc" name="card_cvc" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Total a Pagar</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{ $total }}" readonly>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirmar Pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

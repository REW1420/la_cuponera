<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('header.clerk')
    @include('header.background')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Información del Cupón</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Campo</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Código Único</td>
                                        <td>{{ $coupon->unique_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Propietario</td>
                                        <td>{{ $coupon->owner_dui }}</td>
                                    </tr>
                                    <tr>
                                        <td>Estado</td>
                                        <td>{{ $coupon->is_redeemed ? 'Canjeado' : 'Sin canjear' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('coupons.index') }}" class="btn btn-info">Volver</a>
                            @unless ($coupon->is_redeemed)
                                <form action="{{ route('coupons.redeem') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
                                    <button type="submit" class="btn btn-primary">Canjear Cupón</button>
                                </form>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>

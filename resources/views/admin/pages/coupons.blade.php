<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupons</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @include('header.header')
    @include('header.background')
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Verificar Cupón</div>
                <div class="card-body">
                    <form action="{{ route('coupons.show') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="coupon_code">Ingrese el código del cupón:</label>
                            <input type="text" id="coupon_code" name="coupon_code" class="form-control mb-3">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Verificar Cupón</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


</html>
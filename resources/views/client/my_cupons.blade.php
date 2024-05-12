<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Cupones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .coupon {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            position: relative;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .coupon .kanan {
            border-left: 2px dashed #666;
            padding-left: 20px;
            margin-left: 20px;
            position: relative;
        }

        .coupon .kanan .info::before,
        .coupon .kanan .info::after {
            content: '';
            position: absolute;
            width: 15px;
            height: 15px;
            background: #fff;
            border: 2px solid #666;
            border-radius: 50%;
            left: -8px;
        }

        .coupon .kanan .info::before {
            top: 0;
        }

        .coupon .kanan .info::after {
            bottom: 0;
        }

        .coupon h5 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    @include('header.client')
    @include('header.background')
<div class="container mt-4">
    <h1 class="mb-4">Mis Cupones</h1>
    @if ($myCoupons->isEmpty())
        <div class="alert alert-warning" role="alert">
            No tienes cupones disponibles.
        </div>
    @else
        <div class="row">
            @foreach ($myCoupons as $coupon)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="coupon">
                        <div class="d-flex">
                            <div class="p-3 flex-grow-1">
                                <h5>{{ $coupon->offer->title }}</h5>
                                <p>{{ $coupon->offer->description }}</p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cantidad: {{ $coupon->quantity }}</li>
                            <li class="list-group-item">Precio: ${{ $coupon->offer->offer_price }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

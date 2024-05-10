<!DOCTYPE html>
<html lang="en">

<head>
    <title>La Cuponera</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        display: grid;
        place-items: center;
        gap: 50px;
        margin: 0;
        height: 100vh;
        padding: 0 32px;
        background: #eff9ff;

    }

    @media (width >=500px) {
        body {
            padding: 0;
        }
    }

    .background {
        position: fixed;
        top: -50vmin;
        left: -50vmin;
        width: 100vmin;
        height: 100vmin;
        border-radius: 47% 53% 61% 39% / 45% 51% 49% 55%;
        background: #65c8ff;
    }

    .background::after {
        content: "";
        position: inherit;
        right: -50vmin;
        bottom: -55vmin;
        width: inherit;
        height: inherit;
        border-radius: inherit;
        background: #143d81;
    }

    .card {
        overflow: hidden;
        position: relative;
        z-index: 3;
        width: 94%;
        margin: 0 20px;
        padding: 170px 30px 54px;
        border-radius: 24px;
        background: #ffffff;
        text-align: center;
        box-shadow: 0 100px 100px rgb(0 0 0 / 10%);
    }

    .card::before {
        content: "";
        position: absolute;
        top: -880px;
        left: 50%;
        translate: -50% 0;
        width: 1000px;
        height: 1000px;
        border-radius: 50%;
        background: #216ce7;
    }

    @media (width >=500px) {
        .card {
            margin: 0;
            width: 360px;
        }
    }

    .card .logo {
        position: absolute;
        top: 30px;
        left: 50%;
        translate: -50% 0;
        width: 64px;
        height: 64px;
    }

    .card>h2 {
        font-size: 22px;
        font-weight: 400;
        margin: 0 0 38px;
        color: rgb(0 0 0 / 38%);
    }

    .form {
        margin: 0 0 44px;
        display: grid;
        gap: 12px;
    }

    .form :is(input, button) {
        width: 100%;
        height: 56px;
        border-radius: 28px;
        font-size: 16px;

    }

    .form>input {
        border: 0;
        padding: 0 24px;
        color: #222222;
        background: #ededed;
    }

    .form>input::placeholder {
        color: rgb(0 0 0 / 28%);
    }

    .form>button {
        border: 0;
        color: #f9f9f9;
        background: #226ce7;
        display: grid;
        place-items: center;
        font-weight: 500;
        cursor: pointer;
    }

    .card>footer {
        color: #a1a1a1;
    }

    .card>footer>a {
        color: #216ce7;
    }
</style>

<body>
    <div class="background"></div>

    <div class="card">
        <form class="form" method="POST" action="{{ route('client.settings') }}">
            @csrf
            @method('PUT')


            <h2>Actualiza tu informacion</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Nombre -->
            <input value="{{ $user->name }}" type="text" name="name" id="name" placeholder="Nombre"
                required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Correo electrónico -->
            <input type="email" value="{{ $user->email }}" name="email" id="email" placeholder="Correo"
                required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Teléfono -->
            <input type="text" value="{{ $client->phone }}" name="phone" id="phone" placeholder="Teléfono"
                required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!-- Teléfono -->
            <input type="text" value="{{ $client->address }}" name="address" id="address" placeholder="Dirección"
                required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- DUI -->
            <input type="text" value="{{ $client->dui }}" name="dui" id="dui" placeholder="DUI">
            @error('dui')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <button type="submit">Actualizar</button>


        </form>


        <hr>
        <footer>

            <a href="/settings/password">Cambiar contraseña</a>
        </footer>
    </div>
</body>

</html>

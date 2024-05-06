<!DOCTYPE html>
<html lang="en">

<head>
    <title>La Cuponera</title>

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
        <form class="form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <h2>Recupera la contraseña</h2>
            <input type="text" hidden name="token" id="token" value="{{ $token }}">
            <input type="email" name="email" id="email" placeholder="Correo">
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirmar contraseña">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <button type="submit">Actualizar</button>

        </form>


        <hr>
        <footer>
        </footer>
    </div>
</body>

</html>

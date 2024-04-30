<!-- login.blade.php -->
<form method="POST" >
    offerer
    @csrf
    <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required autofocus>
    </div>

    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recuérdame</label>
    </div>

    <div>
        <button type="submit">Iniciar Sesión</button>
    </div>
</form>

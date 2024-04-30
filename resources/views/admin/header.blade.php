<!-- header.blade.php -->
<style>
    /* Estilos para el encabezado de navegación */
.navbar {
    background-color: #f8f9fa;
    padding: 10px 0;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-brand {
    font-size: 24px;
    text-decoration: none;
    color: #333;
}

.navbar-menu {
    display: none;
}

.navbar-toggler-icon {
    display: block;
    width: 30px;
    height: 2px;
    background-color: #333;
    position: relative;
    transition: background-color 0.3s ease;
}

.navbar-toggler-icon::before, .navbar-toggler-icon::after {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    background-color: #333;
    position: absolute;
    left: 0;
    transition: transform 0.3s ease;
}

.navbar-toggler-icon::before {
    top: -10px;
}

.navbar-toggler-icon::after {
    bottom: -10px;
}

.navbar-toggle:checked + .navbar-toggler-icon {
    background-color: transparent;
}

.navbar-toggle:checked + .navbar-toggler-icon::before {
    transform: rotate(45deg);
    top: 0;
}

.navbar-toggle:checked + .navbar-toggler-icon::after {
    transform: rotate(-45deg);
    bottom: 0;
}

.navbar-toggle:checked + .navbar-toggler-icon + .navbar-menu {
    display: block;
}

.navbar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin-right: 20px;
}

.nav-link {
    text-decoration: none;
    color: #333;
    font-size: 18px;
}

.nav-link:hover {
    color: #666;
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Cuponera</a>


    </div>
</nav>

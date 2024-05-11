<!-- header -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
            aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/home/offers">Ofertas disponibles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/home">Mis cupones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/cart">Mi carrito <span
                            class="badge bg-secondary">{{ $cartLength }}</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown"
                        aria-expanded="false">Mas opciones</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown08">
                        <li><a class="dropdown-item" href="/settings/user">Configurar perfil</a></li>
                        <li><a class="dropdown-item" href="/logout">Cerrar sesion</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

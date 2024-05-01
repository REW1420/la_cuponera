
<!-- welcome.blade.php (o cualquier otra vista) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
    <div class="d-flex align-items-center">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">La Cuponera</span>
    </div>

    
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="/admin/home" class="nav-link px-2 link-dark">Empresas ofertantes</a></li>
    <li><a href="/admin/home/categories" class="nav-link px-2 link-dark">Rubros</a></li>
    <li><a href="/admin/home/client" class="nav-link px-2 link-dark">Clientes</a></li>
</ul>


    <div class="col-md-3 text-end">
      <button type="button" class="btn btn-danger me-2">Cerrar sesion</button>
    </div>
  </header>
</div>

</body>
</html>
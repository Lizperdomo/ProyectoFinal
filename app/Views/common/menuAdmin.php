<nav class="navbar navbar-expand-lg" style="background-color: #3498db;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?= base_url('inicios/inicioAdmin'); ?>"> <!--Inicio del cliente-->
      <img src="<?= base_url('img/logo.png'); ?>" width="200" height="40"> <!--Ruta de la imagen del logo--> 
    </a>
        <!--Se establen en las siguientes lineas el menù del administrador que se encontrarà en la parte superior colocando cada una de las rutas correspondientes-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Clientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/mostrar'); ?>">Administrar clientes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/buscar'); ?>">Buscar clientes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/agregar'); ?>">Agregar clientes</a></li>
          </ul>
        </li>
        <!--  -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Coberturas
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= base_url('index.php/admin/mostrarCoberturas'); ?>">Administrar coberturas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/buscarCobertura'); ?>">Buscar cobertura</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/agregarCobertura'); ?>">Agregar cobertura</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Estadisticas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin/estadisticas'); ?>">Información</a></li>
          </ul>
        </li>
      </ul>
      <form action="<?= base_url('logout'); ?>" method="GET">
    <button class="btn btn-danger" type="submit">Cerrar sesión</button> <!--Este es el botòn para cerrar sesiòn-->
      </form>
    </div>
  </div>
</nav>

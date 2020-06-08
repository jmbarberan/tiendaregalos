		<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-4 mb-3 mb-md-0 text-center">
            </div>
            <div class="col-12 col-md-4 mb-3 mb-md-0 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Bazar y Detalles "M&M"</a>
              </div>
            </div>
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
									<li><a href="../php/salir.php" title="Modificar"><span class="icon icon-exit_to_app" title="Cerrar sesion"></span></a></li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php">Inicio</a>
            </li>
            <li>
              <a href="about.php">Acerca de Nosotros</a>
            </li>
            <?php 
              if(isset($_SESSION['usuario'])) {
                echo '<li><a href="productos.php">Productos</a></li>';
              }
            ?>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Productos</strong></div>
        </div>
      </div>
    </div>
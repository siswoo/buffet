<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block" style="text-transform: capitalize;"><?php echo $_SESSION['usuario']." - <strong>(".$_SESSION['id'].")</strong>"; ?></a>
    </div>
  </div>

  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item <?php if($ubicacion=='index'){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if($ubicacion=='index'){echo "active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas de la Versión</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="menu.php" class="nav-link <?php if($ubicacion=='menu'){echo "active";} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menú Semanal
                <span class="right badge badge-danger">Nuevo</span>
              </p>
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a href="test_pagos1.php" class="nav-link <?php if($ubicacion=='test_pagos1'){echo "active";} ?>">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pruebas de Pagos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="inventario1.php" class="nav-link <?php if($ubicacion=='inventario1'){echo "active";} ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Inventario
                <span class="right badge badge-danger">Nuevo</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sedes1.php" class="nav-link <?php if($ubicacion=='sedes'){echo "active";} ?>">
              <i class="nav-icon fas fa-expand-arrows-alt"></i>
              <p>
                Sedes
                <span class="right badge badge-danger">Nuevo</span>
              </p>
            </a>
          </li>
          -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
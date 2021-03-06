<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php?action=inicio">IZA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrders" data-parent="#exampleAccordion">
            <i class="fa fa-window-restore"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseOrders">
            <li>
              <a href="index.php?action=cotizador">Add Order</a>
            </li>
            <li>
              <a href="index.php?action=ordenes">Orders List</a>
            </li>
            <li>
              <a href="index.php?action=closedOrders">Closed Orders</a>
            </li>
            <li>
              <a href="index.php?action=cambiosOrdenes">Order Alerts</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProductos" data-parent="#exampleAccordion">
            <i class="fa fa-cubes"></i>
            <span class="nav-link-text">Products</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProductos">

            <li>
              <a href="index.php?action=addProducto">Add Product</a>
            </li>
            <li>
              <a href="index.php?action=saddles">Tacks & Saddles</a>
            </li>
            <li>
              <a href="index.php?action=opciones">Trailer Options</a>
            </li>
            <li>
              <a href="index.php?action=vents">Vents</a>
            </li>

          </ul>
        </li>

        <li class ="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a href="#collapseEmpleados" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-parent="#exampleAccordion">
            <i class="fa fa-user-o"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEmpleados">
            <li>
              <a href="index.php?action=addEmpleado">Add User</a>
            </li>
            <li>
              <a href="index.php?action=empleados">Users List</a>
            </li>
          </ul>
        </li>

        <li class ="nav-item" data-toggle="tooltip" data-placement="right" title="reportes">
          <a href="#collapseReportes" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-parent="#exampleAccordion">
            <i class="fa fa-bar-chart"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseReportes">
            <li>
              <a href="index.php?action=logins">User Logins</a>
            </li>
            <li>
              <a href="views/modules/exportaTrailers.php">Trailer Prices .xls</a>
            </li>
            <li>
              <a href="views/modules/exporta.php">Options Prices .xls</a>
            </li>
            <li>
              <a href="views/modules/exportaLonas.php">Tarp Prices .xls</a>
            </li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li>
          <img src="views/img/separador.png">
        </li>

        <li class="nav-item" >
          <a class="nav-link">
            <i ></i><span class="nav-link-text"><?php echo $_SESSION["nombre"]?></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- end navigation -->
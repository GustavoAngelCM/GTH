<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador</title>

    <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
    <link href="../libs/css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../libs/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../libs/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../libs/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../libs/css/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../libs/css/jquery.gritter.css" rel="stylesheet">

    <link href="../libs/css/animate.css" rel="stylesheet">
    <link href="../libs/css/style.css" rel="stylesheet">

    <link href="../libs/css/estiloDatosPersonal.css" rel="stylesheet">

    <link href="../libs/css/alertify.min.css" rel="stylesheet">
    <link href="../libs/css/default.min.css" rel="stylesheet">
    <link href="../libs/css/semantic.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="http://localhost:88/PersonalUAB/view/libs/multimedia/img/design/uab.png">
</head>

<body>
  <input type="hidden" id="fotoPerfil" name="foto" value="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side nav-side-menu" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav " id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                              <img alt="avatar" class="img-circle img-responsive" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
                              <span class="block m-t-xs">
                                <strong class="font-bold "><?php echo ucwords($_SESSION['usuario']); ?></strong>
                              </span>
                              <span class="text-muted text-xs block ">Opciones <b class="caret"></b></span>
                            </span>
                          </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a data-toggle="modal" data-target="#editarUsuarioModal">Editar</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?modo=salir">Salir</a></li>
                          </ul>
                        </div>
                        <div class="logo-element">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <img alt="avatar" class="img-circle img-responsive" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
                          </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a data-toggle="modal" data-target="#editarUsuarioModal">Editar</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?modo=salir">Salir</a></li>
                          </ul>
                        </div>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" href="#"><i class="fa fa-male"></i> <span class="nav-label">Personal</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="efec" href="Personal-Crear.html"><i class="fa fa-plus"></i>Nuevo Personal</a></li>
                            <li ><a class="efec" href="Personal-Lista.html"><i class="fa fa-list"></i>Lista</a></li>
                        </ul>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuario</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="efec" href="Usuario-Crear.html"><i class="fa fa-plus"></i>Nuevo Usuario</a></li>
                            <li ><a class="efec" href="Usuario-Lista.html"><i class="fa fa-list"></i>Lista</a></li>
                        </ul>
                    </li>

                    <li class="menu-efec">
                        <a class="efec" href="#"><i class="fa fa-table"></i> <span class="nav-label">Evaluación</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="efec" href="Meritos-Registrar.html"><i class="fa fa-plus"></i>Nuevo Formulario de Evaluación</a></li>
                            <li><a class="efec" href="Meritos-Lista.html"><i class="fa fa-list"></i>Lista Formularios de Evaluación</a></li>
                        </ul>
                    </li>

                    <li class="menu-efec">
                        <a class="efec" href="Directorio.html">
                          <i class="fa fa-address-book"></i> <span class="nav-label">Directorio</span>
                        </a>
                    </li>

                    <li class="menu-efec">
                        <a class="efec" href="Personal-Birthday.html"><i class="fa fa-birthday-cake"></i> <span class="nav-label">Cumpleañeros</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" href="Documentos.html"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Documentos</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" href="Configuraciones.html"><i class="fa fa-gear"></i> <span class="nav-label">Configuraciones</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" href="Reportes.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reportes</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" data-toggle="modal" data-target=".working"><i class="fa fa-car"></i> <span class="nav-label">Vacaciones</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" data-toggle="modal" data-target=".working"><i class="fa fa-inbox"></i> <span class="nav-label">Buzón de Sugerencias</span></a>
                    </li>
                    <li class="menu-efec">
                        <a class="efec" id="manual-usuario-admin"><i class="fa fa-book"></i> <span class="nav-label">Manual Usuario</span></a>
                    </li>
                </ul>
            </div>
        </nav>


        <div id="page-wrapper" class="gray-bg dashbard-1">
          <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;">
              <div class="navbar-header">
                  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              </div>
              <ul class="nav navbar-top-links navbar-right">
                  <li class="label-primary" >
                    <a href="index.php" style="color: white;">
                      <i class="fa fa-home"></i>Inicio
                    </a>
                  </li>
              </ul>
            </nav>
          </div>

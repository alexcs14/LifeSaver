<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="#"><img src="views/assets/img/Logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <h2>LifeSaver</h2><img src="views/assets/img/Logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul class="ca-menu">
                        <li class="active"><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-home ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Inicio</h2>
                    			</div>
                        </a></li>
                        <li><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-heartbeat ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Donación</h2>
                          </div>
                        <h3 class="ca-sub">Ayuda mutua</h3></a></li>
                        <li><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-location-arrow ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Estatuto</h2>
                          </div>
                        <h3 class="ca-sub">Siempre cerca de ti</h3></a></li>
                        <li><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-inbox ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Contacto</h2>
                          </div>
                        <h3 class="ca-sub">Comunícate</h3></a></li>
                        <li><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-user ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Mi Perfil</h2>
                          </div>
                        <h3 class="ca-sub">Personalizalo</h3></a></li>
                        <li><a href="#"></span>
                          <div class="ca-content">
                            <i class="fa fa-cog ca-icon" aria-hidden="true"></i><span class="hidden-xs hidden-sm">
                            <h2 class="ca-main">Ajustes</h2>
                          </div></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Navegación</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Buscar" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://pixel.nymag.com/imgs/daily/vulture/2015/11/25/25-will-smith.w529.h529.jpg" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>Jhony Oquendo</span>
                                                    <p class="text-muted small">
                                                        jaoquendo9@misena.edu.co
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view2 btn-sm active">Mi Perfil</a>
                                                    <a href="#" class="view3 btn-sm active">Cerrar Sesión</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard col-lg-11">
                    <?php
                      require_once ("legislacion.php");
                     ?>
                </div>
            </div>
        </div>

    </div>





</body>


    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="./"><i class="icon-home"></i>Inicio</a></li>


                <ul class="mobile-menu">
                    <!--<li><a href="./">Exportadores</a></li>
                    <li><a href="importacion">Importadores</a></li> -->
					<li><a href="blog">Blog</a></li>
					<?php if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){ ?>
                    <li><a href="registro">Reg&iacute;strate</a></li>
                    <li><a href="login" class="">Ingresar</a></li>
					<?php }else{ ?>
					<li><a><?=$_SESSION['nombreaza'];?></a></li>
                    <li><a href="salir" class="">Cerrar Sesi&oacute;n</a></li>
					<?php } ?>
                </ul>
            </nav>
            <!-- <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form> -->

            <!--<div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div> -->
        </div>
    </div>
    <!-- End .mobile-menu-container -->
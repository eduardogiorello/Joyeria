<?php
    function navBar(){
        ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(40,40,40); z-index:1; position:sticky; top: 0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width="36" height="33"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a style="color: rgb(198, 168, 125);font-size:18px; font-family:Verdana, sans-serif;" class="nav-link active" aria-current="page"
                        href="index.php"><i>Inicio</i></a>

                </li>
                <li class="nav-item dropdown">
                    <a style="color: rgb(198, 168, 125);font-size: 18px; font-family:Verdana, sans-serif;" class="nav-link dropdown-toggle"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i>Relojeria</i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67,67,67)">
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="cuero.php">Cuero</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="caucho.php">Caucho</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="acero.php">Acero</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="smart.php">Smartwatch</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: rgb(198, 168, 125);font-size: 18px; font-family:Verdana, sans-serif;" class="nav-link dropdown-toggle"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i>Joyeria</i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67,67,67)">
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="anillos.php">Anillos</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="cadenas.php">Cadenas</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light ">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="alhajas.php">Alhajas</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="pulseras.php">Pulseras</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="aros.php">Aros</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: rgb(198, 168, 125);font-size: 18px; font-family:Verdana, sans-serif;" class="nav-link dropdown-toggle"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i>Regalos</i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67,67,67)">
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="cuchillos.php">Cuchillos</a></li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="lapiceros.php">Lapiceros</a></li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="artEscritorio.php">Artículos de
                                escritorio</a></li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="mates.php">Mates</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="placas.php">Placas</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="lapiceras.php">Lapiceras</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a style="color: rgb(198, 168, 125)" class="dropdown-item" href="otros.php">Otros</a>
                        </li>
                      
                    </ul>
                </li>               
                <li class="nav-item">
                    <a style="color: rgb(198, 168, 125);font-size:18px; font-family:Verdana, sans-serif;" class="nav-link active" aria-current="page"
                        href="formulario.php"><i>Pedidos personalizados</i></a>

                </li>
            </ul>
            <form class="d-flex" action="productoBuscado.php" method="post">
                <div class="autocompletar">
                <input class="form-control me-2 buscador" type="text" id="buscador" name="buscador" placeholder="¿Que estas buscando?"
                    aria-label="Search" autocomplete="off">
                </div>
                <div style="display: inline-flex">
                    <a href="carritoItems.php" style=" text-decoration:none;" class="carritologo"><i class="fas fa-shopping-cart" style="font-size:30px; margin-top:6px"></i></a>
                </div>
            </form>
        </div>
    </div>
    
</nav>


<?php
//y esta etiquieta de cierre es para que continue el codigo de forma php    
    }?>
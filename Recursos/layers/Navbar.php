<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand fontwhite" href="Home.php">GeekNews</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="hidden"><a href="Perfil.php">Perfil</a></li>
            <li class=""><a href="Secciones.php">Secciones</a></li>
        </ul>
        <form method="post" action="Controladores/Busqueda.php" class="navbar-form navbar-left">
            <div class="form-group">
            <input type="text" class="form-control" name="filtro" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <?php 
            if(isset($_SESSION["Usuario"]["Id"])){
                echo "  <ul class='nav navbar-nav navbar-right'>
                            <li><a href='CrearNoticia.php'>Crear Noticia</a></li>
                            <li><a href='Perfil.php?id=". $_SESSION["Usuario"]["Id"] ."'><span class='glyphicon glyphicon-user'></span> ". $_SESSION["Usuario"]["Email"] ."</a></li>
                            <li><a href='Controladores/CerrarSeccion_Controlador.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión </a></li>
                        </ul>";
            }
            else{
                echo "  <ul class='nav navbar-nav navbar-right'>
                            <li><a href='CrearCuenta.php'><span class='glyphicon glyphicon-user'></span> Registrarse</a></li>
                            <li><a href='index.php'><span class='glyphicon glyphicon-log-in'></span> Iniciar sesión</a></li>
                        </ul>";
            }
        ?>
    </div>
</nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Perfil</title>
</head>
<body>
<header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" class="nav_logo"></a>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="contactanos.php">Contáctanos</a></li>
            </ul>
                <div class="sec2">
                    <ul>
                    <?php
                        session_start();
                        //Verificar si el usuario ha iniciado sesión
                        if(!isset($_SESSION['login_user'])){

                        //Si no ha iniciado sesion, mostrar el enlace para registrar
                        ?> <li> <?php
                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#registro">Registrarse</a>';
                        ?> </li>
                        <li> 
                            <a href="login.php">Iniciar Sesión</a>
                        </li> 
                        <li>
                            <a href="#" onclick="alerta()"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li><?php
                        } else {
                            // Obtén el nombre de usuario de la sesión
                            $username = htmlspecialchars($_SESSION['login_user']);
                        //Si ha iniciado sesion, mostrar el nombre del usuario
                        // Cambia el enlace de perfil según el usuario
                        if ($username === "Zyanya") {?><li class="nav-item"><?php
                            echo '<a href="admin.php">'.htmlspecialchars($_SESSION['login_user']).'</a>';
                            echo '<a href="admin.php"><i class="fa-solid fa-user"></i></a>';
                        } else {?><li class="nav-item"><?php
                            echo '<a href="perfil.php">'.htmlspecialchars($_SESSION['login_user']).'</a>';
                            echo '<a href="perfil.php"><i class="fa-solid fa-user"></i></a>';
                        }
                    ?>

                    <li class="navs_item">
                        <a href="carrito.php" class="navs_link"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li> <?php
                    } ?>
            </ul>
            </div>
        </nav>
    </header>
<?php include 'registro.php' ?>
<hr>
<div class="perfil">
    <img src="img/img06.png" alt="">
    <div class="user">
        <h3><?php echo '<p>Bienvenid@, '.htmlspecialchars($_SESSION['login_user']). '</p>'; ?></h3>
    </div>
</div>
<div class="aperfil">
    <div class="pedido">
        <i class="fa-solid fa-cart-shopping"></i>
        <a href="carrito.php" class="textos">Ir a mi pedido > </a>
    </div>
    <div class="pedido">
        <i class="fa-solid fa-right-to-bracket"></i>
        <a class="textos aaa" data-bs-toggle="modal" data-bs-target="#cerrar" style="cursor:pointer;">Cerrar sesion > </a>
    </div>
</div>

<!--Cerrar sesion-->
<!-- The Modal -->
<div class="modal fade" id="cerrar">
<div class="modal-dialog ">
<div class="modal-content">

  <!-- Modal Header -->
  <div class="modal-header">
    <h4 class="modal-title">Finalizamiento de sesion</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <!-- Modal body -->
  <div class="modal-body" style="font-size:20px;">
    Desea cerrar sesion?
  </div>

  <!--Modal footer-->
  <div class="modal-footer">
      <button type="button" class="btn btn-danger btonn" data-dismiss="modal"><a href="cerrarsesion.php" style="text-decoration:none; color:white;">Confirmar</a></button>
    </div>
</div>
</div>
</div>
    <footer>
        <div class="img04">
            <img src="img04.png" alt="">
        </div>
        <div class="datos">
        Zyanya Tajani Mireles Gaspar <br>
        No. Control 22308051281080
        </div>
    </footer>
</body>
</html>
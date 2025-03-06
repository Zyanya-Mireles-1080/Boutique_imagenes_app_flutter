<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
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
                            <a href="login.php" class="navs_link">Iniciar Sesión</a>
                        </li> 
                        <li>
                            <a href="#" onclick="alerta()"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li><?php
                        } else {
                        //Si ha iniciado sesion, mostrar el nombre del usuario
                        echo '<a href="perfil.php" class="navs_link"><i class="fa-solid fa-user"></i></a>';
                    ?>

                    <li class="navs_item">
                        <a href="carrito.php" class="navs_link"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li> <?php
                    } ?>
            </ul>
            </div>
        </nav>
    </header>
    <hr>
<div class="is container-fluid">
        <div class="login-box2 container-fluid">
        <h2>Iniciar Sesión</h2>
        <h4>¡Bienvenido!</h4>
        <hr>
        <form action="" method="POST">
            <div class="textbox">
                <input type="text" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="contrasena" required> 
            </div>
            <input type = "submit" class="bton" value="Continuar">
        </form>
        </div>
    </div>
    <script src="script.js"></script>

<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"] == 
"POST"){
    $username = $_POST['nombre'];
    $password = $_POST['contrasena'];

    //Prevenir SQL Injection
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);

    $sql = "SELECT id_cliente, nombre, contrasena FROM clientes WHERE nombre='$username'";
    $result = $db -> query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo " Usuario encontrado. Verificando contraseña...<br>";
            if (password_verify($password, $row['contrasena'])) {
                if ($username=="Zyanya") {
            
                    $_SESSION['login_user'] = $row['nombre'];
                    header("location: admin.php");
                    exit();
                }
                else {
                    $_SESSION['login_user'] = $row['nombre'];
                    header("location:perfil.php");
                } 
        } else {
            echo "Usuario no encontrado.";
        }
        
}
}
?>

    <footer>
        <div class="img04">
            <img src="img/img04.png" alt="">
        </div>
        <div class="datos">
        Zyanya Tajani Mireles Gaspar <br>
        No. Control 22308051281080
        </div>
    </footer>
</body>
</html>
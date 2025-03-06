<?php
// Conexión a la base de datos y lógica para insertar los datos...
if (isset($_POST['btnregistrar'])) {
    // Recibir los datos del formulario
        $idCategoria = $_POST['idCategoria'];
        $idProveedor = $_POST['idProveedor'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $tallas = $_POST['tallas'];
        $color = $_POST['color'];
        $imagen = $_POST['imagen'];

    // Conexión a la base de datos
    include("db.php");

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO productos (id_categoria, id_proveedor, nombre, precio, tallas, color, imagen) 
            VALUES ('$idCategoria', '$idProveedor', '$nombre', '$precio', '$tallas', '$color', '$imagen')";
    
    // Ejecuta la consulta
    if ($db->query($sql) === TRUE) {
        // Redirige a la página de administración después de insertar el producto
        header("Location: admin.php"); 
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Agregar Producto</title>
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
    <hr>
    <div class="container">
        <h1 class="my-4">Agregar Producto</h1>

        <form action="agregar.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="idCategoria" class="form-label">idCategoria</label>
                <input type="text" class="form-control" name="idCategoria" placeholder="idCategoria" required>
            </div>  
            <div class="mb-3">
                <label for="idProveedor" class="form-label">idProveedor</label>
                <input type="text" class="form-control" name="idProveedor" placeholder="idProveedor" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" placeholder="Precio" required>
            </div>

            <div class="mb-3">
                <label for="tallas" class="form-label">Tallas</label>
                <input type="text" class="form-control" name="tallas" placeholder="Tallas" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" name="color" placeholder="Color" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" class="form-control" name="imagen" placeholder="Imagen" required>
            </div>

            <button type="submit" name="btnregistrar" class="btn btn-primary" style="margin-bottom:30px; background-color:black; color:white; border:none;">Agregar Producto</button>
        </form>
    </div>

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
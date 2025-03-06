<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Catálogo</title>
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

    <script>
      function alerta(){
      alert("Inicia Sesión o Registrate para continuar");
      }
    </script>
    <?php include 'registro.php' ?>
    <hr>
    <div class="cat_principal">
        <img src="img/img05.png" alt="">
        <h1>Todos los productos</h1>
        <div class="cat_categoria">
            <div class="prod">
                <p>60 productos</p>
            </div>
            <div class="ordenar dropdown">
                <button id="dropdownButton" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    Ordenar por: Todos ↓
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#todos" onclick="mostrar(); updateDropdown('Todos')">Todos</a></li>
                    <li><a class="dropdown-item" href="#mujer" onclick="mostrar1(); updateDropdown('Mujer')">Mujer</a></li>
                    <li><a class="dropdown-item" href="#hombre" onclick="mostrar2(); updateDropdown('Hombre')">Hombre</a></li>
                    <li><a class="dropdown-item" href="#niños" onclick="mostrar3(); updateDropdown('Niños')">Niños</a></li>
                    <li><a class="dropdown-item" href="#bebes" onclick="mostrar4(); updateDropdown('Bebés')">Bebés</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <div class="vendido" id="todos">
        <div class="vendido_productos" id="mujer">
        <?php
            $audiencia = "mujer";
            if($audiencia==="mujer"){
                $query = $db->query("SELECT p.*
                                    FROM productos p
                                    INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                                    WHERE c.audiencia = '$audiencia'");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
        ?>
        <div class="vend_producto">
            <div class="vend_img">
                <img src="mujer/<?php echo $row['imagen']; ?>" alt="Imagen no encontrada" />
            </div>
            <div class="vend_info">
                <h3><?php echo $row['nombre']; ?></h3>
                <h4>$<?php echo $row['precio']; ?></h2>
                <button> <?php
                if(!isset($_SESSION['login_user'])){
                    //Si no ha iniciado sesion, mostrar el enlace para registrar
                ?> <a onclick="alerta()">Agregar</a> <?php
                } else {
                    ?> <a href="carrito.php?id_producto=<?php echo $row["id_producto"]; ?>">Agregar</a> <?php
                } ?> </button>
            </div>
        </div>
        <?php } }
        } else {
            echo "Productos no encontrados";
        }
        ?>
        </div>

        <div class="vendido_productos" id="hombre">
        <?php
            $audiencia = "hombre";
            if($audiencia==="hombre"){
                $query = $db->query("SELECT p.*
                                    FROM productos p
                                    INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                                    WHERE c.audiencia = '$audiencia'");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
        ?>
        <div class="vend_producto">
            <div class="vend_img">
                <img src="Hombre/<?php echo $row['imagen']; ?>" alt="Imagen no encontrada" />
            </div>
            <div class="vend_info">
                <h3><?php echo $row['nombre']; ?></h3>
                <h4>$<?php echo $row['precio']; ?></h2>
                <button> <?php
                if(!isset($_SESSION['login_user'])){
                    //Si no ha iniciado sesion, mostrar el enlace para registrar
                ?> <a data-bs-toggle="modal" data-bs-target="#ventana">Agregar</a> <?php
                } else {
                    ?> <a href="carrito.php?id_producto=<?php echo $row["id_producto"]; ?>'">Agregar</a> <?php
                } ?> </button>
            </div>
        </div>
        <?php } }
        } else {
            echo "Productos no encontrados";
        }
        ?>
        </div>

        <div class="vendido_productos" id="niños">
        <?php
            $audiencia = "niños";
            if($audiencia==="niños"){
                $query = $db->query("SELECT p.*
                                    FROM productos p
                                    INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                                    WHERE c.audiencia = '$audiencia'");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
        ?>
        <div class="vend_producto">
            <div class="vend_img">
                <img src="Niños/<?php echo $row['imagen']; ?>" alt="Imagen no encontrada" />
            </div>
            <div class="vend_info">
                <h3><?php echo $row['nombre']; ?></h3>
                <h4>$<?php echo $row['precio']; ?></h2>
                <button> <?php
                if(!isset($_SESSION['login_user'])){
                    //Si no ha iniciado sesion, mostrar el enlace para registrar
                ?> <a data-bs-toggle="modal" data-bs-target="#ventana">Agregar</a> <?php
                } else {
                    ?> <a href="carrito.php?id_producto=<?php echo $row["id_producto"]; ?>'">Agregar</a> <?php
                } ?> </button>
            </div>
        </div>
        <?php } }
        } else {
            echo "Productos no encontrados";
        }
        ?>
        </div>

        <div class="vendido_productos" id="bebes">
        <?php
            $audiencia = "bebes";
            if($audiencia==="bebes"){
                $query = $db->query("SELECT p.*
                                    FROM productos p
                                    INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                                    WHERE c.audiencia = '$audiencia'");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
        ?>
        <div class="vend_producto">
            <div class="vend_img">
                <img src="Bebés/<?php echo $row['imagen']; ?>" alt="Imagen no encontrada" />
            </div>
            <div class="vend_info">
                <h3><?php echo $row['nombre']; ?></h3>
                <h4>$<?php echo $row['precio']; ?></h2>
                <button> <?php
                if(!isset($_SESSION['login_user'])){
                    //Si no ha iniciado sesion, mostrar el enlace para registrar
                ?> <a data-bs-toggle="modal" data-bs-target="#ventana">Agregar</a> <?php
                } else {
                    ?> <a href="carrito.php?id_producto=<?php echo $row["id_producto"]; ?>'">Agregar</a> <?php
                } ?> </button>
            </div>
        </div>
        <?php } }
        } else {
            echo "Productos no encontrados";
        }
        ?>
        </div>        
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
<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css?ver=<?time();?>" />
    <title>Zyanya´s Clothes</title>
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
    <div class="principal">
        <img src="img/img01.png" alt="">
        <div class="sec3">
            <h1>Bienvenidos a Zyanya´s <br>Clothes</h1>
            <h3>Descrubre la moda perfecta para ti</h3>
            <button><a href="catalogo.php">Explorar</a></button>
        </div>
    </div>

    <div class="vendido">
        <h1>Lo más vendido</h1>
        <div class="vendido_productos">
        <?php
            $precio = 200;
            if($precio===200){
                $query = $db->query("SELECT * FROM productos WHERE precio < '$precio'LIMIT 5");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
        ?>
        <div class="vend_producto">
            <div class="vend_img">
                <img src="img/<?php echo $row['imagen']; ?>" alt="Imagen no encontrada" />
            </div>
            <div class="vend_info">
                <h3><?php echo $row['nombre']; ?></h3>
                <h4>$<?php echo $row['precio']; ?></h2>
                <button> <?php
                if(!isset($_SESSION['login_user'])){
                    //Si no ha iniciado sesion, mostrar el enlace para registrar
                ?> <a onclick="alerta()">Agregar</a> <?php
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
        <button><a href="catalogo.php">Cargar más</a></button>
    </div>
    <hr>
    <div class="nosotros">
        <h1>Nosotros</h1>
        <h3>Nuestra pasión por la moda</h3>
        <p>En Zyanya´s Clothes nos dedicamos a ofrecerte lo último en moda para toda la familia. 
            Nuestro objetivo es brindarte un experiencia de compra única  donde encuentres prendas 
            de calidad y a la moda para toda ocasión . ¡Únete a nuestra comunidad de amantes de la 
            moda hoy!</p>
        <button><a href="#" data-bs-toggle="modal" data-bs-target="#registro">Registrarse</a></button>
        <img src="img/img02.png" alt="">
    </div>
    <hr>
    <div class="horarios">
        <div class="img03">
            <img src="img/img03.png" alt="">
        </div>
        <div class="horario">
            <h1>Horarios</h1>
            <p>Visita nuestras tiendas en un horario de: <br>
                Lunes a Viernes: 9:00 am - 8:00pm
            </p>
            <p>En nuestra tienda en línea estamos siempre disponibles para ti</p>
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
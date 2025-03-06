<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css?ver=<?time();?>" />
    <title>Administrador</title>
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
<div class="perfil">
    <img src="img/img06.png" alt="">
    <div class="user">
        <h3><?php echo '<p>Bienvenid@, '.htmlspecialchars($_SESSION['login_user']). '</p>'; ?></h3>
    </div>
</div>
<div class="cat_categoria">
        <div class="ordenar dropdown">
                <button id="dropdownButton2" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    Ver por: Productos ↓
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#productos" onclick="mostrar5(); updateDropdown2('Productos')">Productos</a></li>
                    <li><a class="dropdown-item" href="#categoria" onclick="mostrar6(); updateDropdown2('Categoria')">Categoría</a></li>
                    <li><a class="dropdown-item" href="#clientes" onclick="mostrar7(); updateDropdown2('Clientes')">Clientes</a></li>
                    <li><a class="dropdown-item" href="#pedidos" onclick="mostrar8(); updateDropdown2('Pedidos')">Pedidos</a></li>
                    <li><a class="dropdown-item" href="#empleados" onclick="mostrar9(); updateDropdown2('Empleados')">Empleados</a></li>
                    <li><a class="dropdown-item" href="#proveedores" onclick="mostrar10 (); updateDropdow2('Proveedores')">Proveedores</a></li>
                </ul>
        </div>
        <div class="pedido">
            <i class="fa-solid fa-right-to-bracket"></i>
            <a class="textos" data-bs-toggle="modal" data-bs-target="#cerrar" style="cursor:pointer;">Cerrar sesion > </a>
        </div>
</div>
<script src="script2.js"></script>
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
      <button type="button" class="btn btn-danger btonn" data-dismiss="modal"><a href="cerrarsesion.php" style="text-decoration:none; color:black;">Confirmar</a></button>
    </div>
</div>
</div>
</div>
<?php
include('db.php'); // Conexión a la base de datos

// Consulta para obtener los datos de la tabla Productos
$sql = "SELECT * FROM productos"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<center><div class="tabla_productos" id="productos">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_producto</th>';
    echo '<th>id_categoría</th>';
    echo '<th>id_proveedor</th>';
    echo '<th>Nombre</th>';
    echo '<th>Precio</th>';
    echo '<th>Tallas</th>';
    echo '<th>Color</th>';
    echo '<th>Imagen</th>'; 
    echo '<th>Editar</th>'; 
    echo '<th>Borrar</th0>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_producto'] . '</td>'; 
        echo '<td>' . $row['id_categoria'] . '</td>'; 
        echo '<td>' . $row['id_proveedor'] . '</td>'; 
        echo '<td>' . $row['nombre'] . '</td>'; 
        echo '<td>$' . number_format($row['precio'], 2) . '</td>'; 
        echo '<td>' . $row['tallas'] . '</td>'; 
        echo '<td>' . $row['color'] . '</td>'; 
        echo '<td>' . $row['imagen'] . '</td>';
        echo '<td><button><a href="editarp.php?id='.$row['id_producto'].'">Editar</a></button></td>';
        echo '<td><button><a href="borrarp.php?id='.$row['id_producto'].'">Borrar</a></button></td>';
        echo '</tr>';
    }
    echo '<td><button><a href="agregar.php">Agregar</a></button></td>';
    echo '</tbody>';
    echo '</table>';
    echo '</div></center>';
    
} else {
    echo 'No se encontraron productos en la base de datos.';
}

// Consulta para obtener los datos de la tabla Categoria
$sql = "SELECT * FROM categoria"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="vendido_productos" id="categoria">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_categoría</th>';
    echo '<th>id_proveedor</th>';
    echo '<th>Nombre</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Promoción</th>';
    echo '<th>Audiencia</th>';
    echo '<th>Descripción</th>'; 
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_categoria'] . '</td>'; 
        echo '<td>' . $row['id_proveedor'] . '</td>'; 
        echo '<td>' . $row['nombre'] . '</td>'; 
        echo '<td>' . $row['cantidad'] . '</td>';
        echo '<td>' . $row['promocion'] . '</td>'; 
        echo '<td>' . $row['audiencia'] . '</td>'; 
        echo '<td>' . $row['descripcion'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No se encontraron productos en la base de datos.';
}

// Consulta para obtener los datos de la tabla Clientes
$sql = "SELECT * FROM clientes"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="vendido_productos" id="clientes">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_cliente</th>';
    echo '<th>Nombre</th>';
    echo '<th>Teléfono</th>';
    echo '<th>Dirección</th>';
    echo '<th>Correo</th>';
    echo '<th>Contraseña</th>'; 
    echo '<th>Fecha de registro</th>'; 
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_cliente'] . '</td>'; 
        echo '<td>' . $row['nombre'] . '</td>'; 
        echo '<td>' . $row['telefono'] . '</td>'; 
        echo '<td>' . $row['direccion'] . '</td>'; 
        echo '<td>' . $row['correo'] . '</td>'; 
        echo '<td>' . $row['contrasena'] . '</td>';
        echo '<td>' . $row['fecha_registro'] . '</td>'; 
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No se encontraron productos en la base de datos.';
}

// Consulta para obtener los datos de la tabla Pedidos
$sql = "SELECT * FROM pedidos"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="vendido_productos" id="pedidos">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_pedido</th>';
    echo '<th>id_cliente</th>';
    echo '<th>Total</th>';
    echo '<th>Cantidad</th>';
    echo '<th>id_producto</th>';
    echo '<th>Fecha</th>';
    echo '<th>Fecha_entrega</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_pedido'] . '</td>'; 
        echo '<td>' . $row['id_cliente'] . '</td>'; 
        echo '<td>' . $row['total'] . '</td>'; 
        echo '<td>' . $row['cantidad'] . '</td>'; 
        echo '<td>' . $row['id_producto'] . '</td>'; 
        echo '<td>' . $row['fecha'] . '</td>'; 
        echo '<td>' . $row['fecha_entrega'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No se encontraron productos en la base de datos.';
}

// Consulta para obtener los datos de la tabla Empleados
$sql = "SELECT * FROM empleados"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="vendido_productos" id="empleados">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_empleado</th>';
    echo '<th>nombre</th>';
    echo '<th>telefono</th>';
    echo '<th>direccion</th>';
    echo '<th>correo</th>';
    echo '<th>turno</th>';
    echo '<th>sueldo</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_empleado'] . '</td>'; 
        echo '<td>' . $row['nombre'] . '</td>'; 
        echo '<td>' . $row['telefono'] . '</td>'; 
        echo '<td>' . $row['direccion'] . '</td>'; 
        echo '<td>' . $row['correo'] . '</td>'; 
        echo '<td>' . $row['turno'] . '</td>'; 
        echo '<td>' . $row['sueldo'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No se encontraron productos en la base de datos.';
}

// Consulta para obtener los datos de la tabla Proveedores
$sql = "SELECT * FROM proveedores"; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="vendido_productos" id="proveedores">';
    echo '<table border="1" style="width: 95%; border-collapse: collapse;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id_proveedor</th>';
    echo '<th>Nombre</th>';
    echo '<th>Teléfono</th>';
    echo '<th>Correo</th>';
    echo '<th>Dirección</th>';
    echo '<th>Tipo de producto</th>'; 
    echo '<th>Referencia de pago</th>'; 
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer cada fila y mostrarla en la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_proveedor'] . '</td>'; 
        echo '<td>' . $row['nombre'] . '</td>'; 
        echo '<td>' . $row['telefono'] . '</td>'; 
        echo '<td>' . $row['correo'] . '</td>'; 
        echo '<td>' . $row['direccion'] . '</td>';
        echo '<td>' . $row['tipo_producto'] . '</td>';
        echo '<td>' . $row['ref_pago'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No se encontraron productos en la base de datos.';
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
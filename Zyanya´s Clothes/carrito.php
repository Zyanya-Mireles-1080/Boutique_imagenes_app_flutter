<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css?ver=<?time();?>" />
    <title>Carrito</title>
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
    <?php
    include("db.php");

    $usuario = $_SESSION['login_user'];

    if (isset($_POST['finalizar_compra'])) {
        // Solo actualiza la bandera para cambiar la vista del carrito
        $carrito_finalizado = true;
        $totalg = 0; // Reiniciar el total general solo para la vista
        $mensaje_finalizado = "¡Compra finalizada! Gracias por comprar en Zyanya's Clothes.";
    }
    

    // Obtener el ID del usuario desde la base de datos
    $sql_user = "SELECT id_cliente FROM clientes WHERE nombre = '$usuario'";
    $result_user = $db->query($sql_user);
    
    if ($result_user->num_rows > 0) {
        $user_data = $result_user->fetch_assoc();
        $id_usuario = $user_data['id_cliente'];
    } else {
        //si no a iniciado sesion
        echo "No se encontró el usuario.";
        //no permite que se ejecute lo demas
        exit();
    }

    // Verificar si se ha pasado un ID de producto para añadir al carrito
    if (isset($_GET['id_producto'])) {
        $productoID = intval($_GET['id_producto']);
        $sql = "SELECT * FROM productos WHERE id_producto = '$productoID'";
        $resultado = $db->query($sql);
        //si existe el producto y(&&) el resultado es mayor a 0
        if ($resultado && $resultado->num_rows > 0) {
            $sqlCarrito = "SELECT cantidad FROM pedidos WHERE id_producto = '$productoID' AND id_cliente = '$id_usuario'";
            $resultadoCarrito = $db->query($sqlCarrito);
            //si el producto existe en la cuenta del usuario y(&&) la cantidad es mayor a 0
            if ($resultadoCarrito && $resultadoCarrito->num_rows > 0) {
                $carrito = $resultadoCarrito->fetch_assoc();
                $cantidad = $carrito['cantidad'] + 1;
                $sql_update = "UPDATE pedidos SET cantidad = $cantidad WHERE id_producto = '$productoID' AND id_cliente = '$id_usuario'";
                $db->query($sql_update);
            } else {
                //si aun no existe se agrega con una cantidad con valor 1
                $sqlInsert = "INSERT INTO pedidos (id_cliente, id_producto, cantidad, id_empleado) VALUES ('$id_usuario', '$productoID', 1, 2)";
                $db->query($sqlInsert);
            }
            //regresa para que puedas seguir agregando productos
            header("location:carrito.php");
        }
    }

    $totalg = 0;

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM pedidos WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
        $db->query($sql);
    }

    // si se dio click en el boton con nombre 'incrementar'
    if (isset($_POST['incrementar'])) {
        $id = $_POST['id'];
        $sqlc = "SELECT cantidad FROM pedidos WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
        $result = $db->query($sqlc);
        if ($result) {
            $row = $result->fetch_assoc();
            $cantidad = $row['cantidad'] + 1;
            $sql_update = "UPDATE pedidos SET cantidad = '$cantidad' WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
            $db->query($sql_update);
        }
    }

    // si se dio click en el boton con nombre 'decrementar'
    if (isset($_POST['decrementar'])) {
        $id = $_POST['id'];
        $sqlc = "SELECT cantidad FROM pedidos WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
        $result = $db->query($sqlc);
        if ($result) {
            $row = $result->fetch_assoc();
            $cantidad = $row['cantidad'] - 1;
            $sql_update = "UPDATE pedidos SET cantidad = '$cantidad' WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
            $db->query($sql_update);
            //si la cantidad es menor a 1 se elimina
            if ($cantidad < 1) {
                $sql = "DELETE FROM pedidos WHERE id_producto = '$id' AND id_cliente = '$id_usuario'";
                $db->query($sql);
            }
        }
    }

    //conexion con la tabla carrito que se encuentra relacionada con la tabla productos
    $sql_compras = "SELECT c.*, p.nombre AS productos_nombre, p.precio AS productos_precio, p.imagen AS productos_img
                    FROM pedidos c
                    JOIN productos p ON c.id_producto = p.id_producto
                    WHERE c.id_cliente = '$id_usuario'";
    $result_compras = $db->query($sql_compras);
    if (!$result_compras) {
        echo "Error en la consulta: " . $db->error;
        exit();
    }

    // Recalcular y actualizar el total en la tabla pedidos
    while ($row = $result_compras->fetch_assoc()) {
        $id_producto = $row['id_producto'];
        $cantidad = $row['cantidad'];
        $precio = $row['productos_precio'];

        $nuevo_total = $cantidad * $precio;

        // Actualizar el total en la tabla pedidos
        $sql_update_total = "UPDATE pedidos SET total = '$nuevo_total' WHERE id_producto = '$id_producto' AND id_cliente = '$id_usuario'";
        $db->query($sql_update_total);
    }

    // Volver a ejecutar la consulta para reflejar los cambios
    $result_compras = $db->query($sql_compras);

    if (isset($carrito_finalizado) && $carrito_finalizado) {
    ?>
    <div class="container text-center final">
        <img src="img/panda2.gif" width="500px" class="img-fluid">
        <p class="text-center">¡Gracias por tu compra! Tu carrito está vacío por ahora.</p>
    </div>
    <?php
} else {
    // Mostrar el carrito normalmente si no se ha finalizado la compra
    if ($result_compras->num_rows > 0) {
        echo "<div class='cont_carrito'>";
        echo "<div class='carrito'>";
        echo "<h2>Mi carrito</h2>";
        echo "<hr>";
        echo "<table class='table table-hover container text-center'>";
        echo "<tr class='encabezadoss'>";
        echo "<th>Nombre</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio Individual</th>";
        echo "<th>Total</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        while ($pcarrito = $result_compras->fetch_assoc()) {
            $total = $pcarrito['cantidad'] * $pcarrito['productos_precio'];
            $totalg += $total;
            ?>
            <tr>
                <td><?= htmlspecialchars($pcarrito['productos_nombre']) ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $pcarrito['id_producto'] ?>">
                        <button type="submit" name="decrementar">-</button>
                    </form>
                    <center><?= htmlspecialchars($pcarrito['cantidad']) ?></center>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $pcarrito['id_producto'] ?>">
                        <button type="submit" name="incrementar">+</button>
                    </form>
                </td>
                <td>$<?= number_format($pcarrito['productos_precio'], 2) ?></td>
                <td>$<?= number_format($total, 2) ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $pcarrito['id_producto'] ?>">
                        <button type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php
        }
        echo "</table>";
        echo "</div>";

        echo "<div class='resumen'>";
        echo "<h2>Resumen del pedido</h2>";
        echo "<hr>";
        echo "<table class='table table-hover container text-center'>";
        echo "<tr>";
        echo "<td><strong>Subtotal:</strong></td>";
        echo "<td>$" . number_format($totalg, 2) . "</td>";
        echo "</tr>";
        $iva = $totalg * 0.16;
        $precioiva = $totalg + $iva;
        echo "<tr>";
        echo "<td><strong>Precio de envío:</strong></td>";
        echo "<td>$" . number_format($iva, 2) . "</td>";
        echo "</tr>";
        echo "<hr>";
        echo "<tr>";
        echo "<td><strong>Total:</strong></td>";
        echo "<td>$" . number_format($precioiva, 2) . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<hr>";
        ?>
        <button type="submit"><a href="#" data-bs-toggle="modal" data-bs-target="#ticket">Pagar</a></button>
        <?php
        echo "</div>";
        echo "</div>";
    } else {
        ?>
        <div class="container text-center final">
            <img src="img/panda.gif" width="500px" class="img-fluid">
            <p class="text-center">Aún no tienes pedido, corre al menú ahora!</p>
        </div>
        <?php
    }
}

    $sql_empleado = " SELECT e.nombre AS empleado_nombre
                        FROM empleados e
                        JOIN pedidos c ON e.id_empleado = c.id_empleado
                        WHERE c.id_cliente = '$id_usuario'
                        LIMIT 1
                    ";

                    $result_empleado = $db->query($sql_empleado);
                    $empleado_nombre = $result_empleado->num_rows > 0 
                        ? $result_empleado->fetch_assoc()['empleado_nombre'] 
                        : 'Empleado no asignado';

    ?>
    <!-- Modal -->
<div class="modal fade" id="ticket" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel">Ticket de Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                <div class="ticket-container">
                <form action="" method="POST">
                    <h3 class="text-center">Zyanya´s Clothes</h3>
                    <p class="text-center">Gracias por su compra</p>
                    <p><strong>Atendido por:</strong> <?= htmlspecialchars($empleado_nombre) ?></p>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result_compras as $pcarrito): ?>
                                <tr>
                                    <td><?= htmlspecialchars($pcarrito['productos_nombre']) ?></td>
                                    <td><?= htmlspecialchars($pcarrito['cantidad']) ?></td>
                                    <td>$<?= number_format($pcarrito['cantidad'] * $pcarrito['productos_precio'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                    <p><strong>Subtotal:</strong> $<?= number_format($totalg, 2) ?></p>
                    <p><strong>IVA (16%):</strong> $<?= number_format($iva, 2) ?></p>
                    <p><strong>Total:</strong> $<?= number_format($precioiva, 2) ?></p>
                </div>
            </div>

            <!-- Footer del Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="finalizar_compra" class="btn btn-success">Finalizar Compra</button>
            </div>
            </form>
        </div>
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
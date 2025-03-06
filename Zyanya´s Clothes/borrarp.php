<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el producto
    $sql = "DELETE FROM productos WHERE id_producto = $id";

    if ($db->query($sql) === TRUE) {
        // Redirigir a la página de administración con un mensaje de éxito
        header("Location: admin.php?status=deleted");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $db->error;
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: admin.php");
    exit();
}
?>
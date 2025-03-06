<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];

    //Prevenir SQL Injection
    $username = $db ->real_escape_string($username);
    $password = $db ->real_escape_string($password);

    //Hash de la contraseña
    $password_hashed = password_hash($password,PASSWORD_BCRYPT);

    $sql = "INSERT INTO clientes (nombre,telefono,direccion,correo,contrasena) VALUES ('$username','$telefono','$direccion','$correo','$password_hashed')";

    if($db -> query($sql) === TRUE){
      header("location:login.php");
    } else {
        echo "Error: ".$sql. "<br>". $db->error;
    }
}
?>

<!-- The Modal -->
<div class="modal fade vent" id="registro">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="login-box">
        <h2 class="modal-title" id="registroLabel">Registrarse</h2>
        <h4>¡Bienvenido!</h4>
        <hr>
        <form action="" method="POST">
            <div class="textbox">
                <input type="text" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Telefono" name="telefono" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Dirección" name="direccion" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Correo" name="correo" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="contrasena" required> 
            </div>
            <input type = "submit" class="bton" value="Continuar">
            <p>¿Ya te has registrado antes? <a href="login.php"> Inicia Sesion</a></p>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
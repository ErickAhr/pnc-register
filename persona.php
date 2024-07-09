<?php
//conexion a la bdd
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro";

//crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//verificar conexion
if($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

//RECOGER DATOS DEL FORMULARIO
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$dui = $_POST['dui'];
$licencia = $_POST['licencia'];
$telefono = $_POST['telefono'];
$persona_id = $_POST['persona_id'];

//PREPARAR LA CONSULTA SQL PARA LA INSERCCIÓN
$sql = "INSERT INTO persona (nombre, edad, dui, licencia, telefono, persona_id)
        VALUES ('$nombre', '$edad', '$dui', '$licencia', '$telefono', persona_id)";

$resultado = mysqli_query($conn, $sql);

if($resultado) {
    ?>
        <h3 class="success">Tu registro se a completado</h3>
    <?php
}  else {
    ?>
        <h3 class="error">Ocurrio un error</h3>
    <?php
}  


//cerrar la conexion
$conn->close();
?>


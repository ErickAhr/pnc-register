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
$oni = $_POST['oni'];
$rango = $_POST['rango'];
$base = $_POST['base'];
$policia_id = $_POST['policia_id'];

//PREPARAR LA CONSULTA SQL PARA LA INSERCCIÓN
$sql = "INSERT INTO policia (nombre, edad, oni, rango, base, policia_id)
        VALUES ('$nombre', '$edad', '$oni', '$rango', '$base', '$policia_id')";

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


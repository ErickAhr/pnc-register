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
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$año = $_POST['año'];
$transmision = $_POST['transmision'];
$color = $_POST['color'];
$vehiculo_id = $_POST['vehiculo_id'];

//PREPARAR LA CONSULTA SQL PARA LA INSERCCIÓN
$sql = "INSERT INTO vehiculo (placa, modelo, año, transmision, color, vehiculo_id)
        VALUES ('$placa', '$modelo', '$año', '$transmision', '$color', '$vehiculo_id')";

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


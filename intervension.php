<?php
// Conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro";

// Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexion
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// RECOGER DATOS DEL FORMULARIO
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$motivo = $_POST['motivo'];
$persona_id = $_POST['persona_id'];
$policia_id = $_POST['policia_id'];
$vehiculo_id = $_POST['vehiculo_id'];

// Función para verificar existencia de ID en una tabla
function verificar_existencia($conn, $tabla, $id) {
    $stmt = $conn->prepare("SELECT id FROM $tabla WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

// Verificar existencia de persona_id, policia_id y vehiculo_id
if (!verificar_existencia($conn, 'persona', $persona_id)) {
    die('<h3 class="error">El ID de la persona no existe</h3>');
}
if (!verificar_existencia($conn, 'policia', $policia_id)) {
    die('<h3 class="error">El ID del policía no existe</h3>');
}
if (!verificar_existencia($conn, 'vehiculo', $vehiculo_id)) {
    die('<h3 class="error">El ID del vehículo no existe</h3>');
}

// PREPARAR LA CONSULTA SQL PARA LA INSERCIÓN
$sql = "INSERT INTO intervension (fecha, hora, lugar, motivo, persona_id, policia_id, vehiculo_id)
        VALUES ('$fecha', '$hora', '$lugar', '$motivo', '$persona_id', '$policia_id', '$vehiculo_id')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo '<h3 class="success">Tu registro se ha completado</h3>';
} else {
    echo '<h3 class="error">Ocurrió un error: ' . $conn->error . '</h3>';
}

// Cerrar la conexion
$conn->close();
?>

<?php
// Conexión a la base de datos utilizando PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Opciones";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$Opciones", $username, $password);
  // Configuración de modo de errores para lanzar excepciones
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}

// Recuperación de los datos del formulario
$opciones = $_POST["opciones"];
$extra1 = $_POST["extra1"];
$extra2 = $_POST["extra2"];
$extra3 = $_POST["extra3"];
$extra4 = $_POST["extra4"];
$extra5 = $_POST["extra5"];
$extra6 = $_POST["extra6"];
$extra7 = $_POST["extra7"];

// Inserción de los datos en la tabla correspondiente utilizando prepared statements
$stmt = $conn->prepare("INSERT INTO Opciones (opciones, extra1, extra2) VALUES (:opciones, :extra1, :extra2, :extra3");
$stmt->bindParam(':opciones', $opciones);
$stmt->bindParam(':extra1', $extra1);
$stmt->bindParam(':extra2', $extra2);
$stmt->bindParam(':extra3', $extra3);


if ($stmt->execute()) {
  echo "Datos guardados correctamente.";
} else {
  echo "Error al guardar los datos.";
}

$conn = null; // Cierre de la conexión
?>
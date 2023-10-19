<?php
include('../conexion.php');
include('../admin.php');
?>

<?php
session_start();
$nombre = $_SESSION ['nombre'];
$apellido= $_SESSION ['apellido'];
echo"<script>alert('Bienvenido $nombre  $apellido'); </script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo1.css">
</head>
<body>

<center>
<form name="Mantenimiento" action="mantenimiento.php" method="post">
<table border="1">

<tr>
<td colspan="4"><label>Registro Asistencia</label></td>
<?php

$profesor_id = $_SESSION ['profesor_id'];

$profesor_sql = "SELECT profesores. *, personas.Nombre AS nombre_profesor, personas.Apellido AS apellido_profesor, profesores.curso AS curso_profesor, profesores.materia AS materia_profesor FROM profesores
INNER JOIN personas ON profesores.id_persona = personas.id_persona WHERE profesores.id_profesor = '$profesor_id'";

$profesor_result = $conn->query($profesor_sql);


if ($profesor_data = $profesor_result->fetch_assoc()) {

 $profesor = new Profesor(
        $profesor_data['nombre_profesor'],
        $profesor_data['apellido_profesor'],
        $profesor_data['curso_profesor'],
        $profesor_data['materia_profesor']
    );

}

?>
<tr>
<td><label>Profesor: <?php echo $profesor->nombre. ' ' . $profesor->apellido; ?></label></td>
<td><label>Curso: <?php echo $profesor->curso ?></label></td>
<td><label>Curso: <?php if (isset($profesor)) echo $profesor->curso ?></label></td>

<td><label>Fecha:  </label></td>
<td><label>Materia: <?php echo $profesor->materia; ?> </label></td>
</tr>
    
</body>
</html>

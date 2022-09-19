<?php
require("../../../db/conetion.php");
$sql = 'SELECT * FROM asignatura INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura
        INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno
          INNER JOIN curso  ON alumno.id_curso = curso.id_curso 
          INNER JOIN docente  ON curso.id_docente = docente.id_docente 
          INNER JOIN tarea  ON asignatura.id_asignatura = tarea.id_asignatura   ';
$resultado = mysqli_query($conn, $sql);

$docu = "Tareas.xls";

header('content-type: aplication/vnd.ms-excel');
header('content-Disposition: attachment; filename = ' . $docu);
header('pragma: no-cache');
header('Expires: 0');
echo "<table class=table' border=1>";
echo '<tr>';
echo '<th colspan=7><h1>Reporte de Notas Institucion educativa Lorenzo de Alcantuz</h1></th>'; //numero de columnas que quiero crear la tabla
echo '</tr>';

/* emcabezado tabla */
echo '<tr>
<th class="serial cabecera">ID TAREA</th>
            <th class="avatar">FOTO PROFESOR</th>
            <th>NOMBRS Y APELLIDO PROFESOR</th>
            <th>MATERIA</th>
            <th>TRABAJO</th>
            <th>NOTA</th>
            <th>OBSERVACIONES DEL TRABAJO</th>
</tr>';
//CICLO QUE RECORRE LA TABLA
//_fectch_array = para convertir el row en un arreglo
while ($row = mysqli_fetch_array($resultado)) {
    echo '<tr>';
    echo '<td>' . $row['id_tarea'] . '</td>';
    echo '<td>' . $row['apellidos_docente'] . $row['nombres_docente'] . '</td>';
    echo '<td>' . $row['nombre_asignatura'] . '</td>';
    echo '<td>' . $row['nombre_tarea'] . '</td>';
    echo '<td>' . $row['estado_tarea'] . '</td>';
    echo '<td>' . $row['valor_nota'] . '</td>';
    echo '<td>' . $row['descripcion_tarea'] . '</td>';
    echo '</tr>';
}

echo '</table>';

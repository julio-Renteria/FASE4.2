<?php

require("../../../db/conetion.php");



/* $sql = "SELECT id_nota,valor_nota,periodo_nota,id_alumno,id_asignatura,estado FROM nota"; */
$sql = 'SELECT * FROM asignatura INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura

        INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno

          INNER JOIN curso  ON alumno.id_curso = curso.id_curso 

          INNER JOIN docente  ON curso.id_docente = docente.id_docente 
 
           INNER JOIN tarea  ON asignatura.id_asignatura = tarea.id_asignatura   ';


$resultado = mysqli_query($conn, $sql); //ejecucion de consulta de arriba sql
$docu = "Notas.xls"; // nombre del docuemnto a exportar

header('content-type: aplication/vnd.ms-excel'); // le digo que no se muetsre en pantalla sino que se va a descargar
header('content-Disposition: attachment; filename = ' . $docu); // aqui digo que se genere como archivo de descaraga attachement
header('pragma: no-cache');
header('Expires: 0');


// apartir de aqui todo lo que muestre con echo se me generar en excel 

echo "<table class=table' border=1>";

echo '<tr>';
echo '<th colspan=7><h1>Reporte de Notas Institucion educativa Lorenzo de Alcantuz</h1></th>'; //numero de columnas que quiero crear la tabla
echo '</tr>';

/* echo '<tr>';
echo '<th></th>';
echo '</tr>'; */

//emcabezados de tabla a exportar
echo '<tr>
<th class="serial cabecera">ID AREA</th>
            <th class="avatar">FOTO PROFESOR</th>
            <th>NOMBRS PROFESOR</th>
            <th>MATERIA</th>
            <th>TRABAJO</th>
            <th>NOTA</th>
            <th>ESTADO DE MATERIA</th>
</tr>';

//CICLO QUE RECORRE LA TABLA
//_fectch_array = para convertir el row en un arreglo

while ($row = mysqli_fetch_array($resultado)) {
    echo '<tr>';
    echo '<td>' . $row['id_area'] . '</td>';
    echo '<td>' . $row['apellidos_docente'] . '</td>';
    echo '<td>' . $row['nombres_docente'] . '</td>';
    echo '<td>' . $row['nombre_asignatura'] . '</td>';
    echo '<td>' . $row['nombre_tarea'] . '</td>';
    echo '<td>' . $row['valor_nota'] . '</td>';
    echo '<td>' . $row['estado'] . '</td>';
    echo '</tr>';
}

echo '</table>';//cierro la etiqueda table fuera del ciclo
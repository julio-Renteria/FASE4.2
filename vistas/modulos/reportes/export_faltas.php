<?php
require("../../../db/conetion.php");
/* $sql = 'SELECT * FROM asignatura INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura
        INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno
          INNER JOIN curso  ON alumno.id_curso = curso.id_curso 
          INNER JOIN docente  ON curso.id_docente = docente.id_docente 
          INNER JOIN tarea  ON asignatura.id_asignatura = tarea.id_asignatura   ';
$resultado = mysqli_query($conn, $sql); */

$data_consult_faltas_alumno = mysqli_query($conn, ("SELECT * FROM ACUDIENTE
    INNER JOIN ALUMNO ON ACUDIENTE.ID_ALUMNO = ALUMNO.ID_ALUMNO
    INNER JOIN FALLA ON ALUMNO.ID_ALUMNO = FALLA.ID_ALUMNO
    INNER JOIN ASIGNATURA ON FALLA.ID_ASIGNATURA = ASIGNATURA.ID_ASIGNATURA
    INNER JOIN AREA ON ASIGNATURA.ID_AREA_ASIGNATURA = AREA.ID_AREA
    WHERE ACUDIENTE.ID_ACUDIENTE = AREA.ID_AREA"
));









$docu = "Faltas.xls";

header('content-type: aplication/vnd.ms-excel');
header('content-Disposition: attachment; filename = ' . $docu);
header('pragma: no-cache');
header('Expires: 0');
echo "<table class=table' border=1>";
echo '<tr>';
echo '<th colspan=6 h1>Reporte de Notas Institucion educativa Lorenzo de Alcantuz</h1></th>'; //numero de columnas que quiero crear la tabla
echo '</tr>';

/* emcabezado tabla */
echo '<tr>
<th class="serial cabecera">ID ALUMNO</th>
<th class="avatar">PERIODO DE FALTA</th>

<th>CANTIDAD FALTAS</th>
<th>NOMBRE ALUMNO</th>
<th>ASIGNATURA</th>
<th>AREA</th>
</tr>';
//CICLO QUE RECORRE LA TABLA
//_fectch_array = para convertir el row en un arreglo



while ($row = mysqli_fetch_row($data_consult_faltas_alumno)) {
    echo '<tr>';
    echo '<td>' . $id_alumno = ($row[9]) . '</td>';
    echo '<td>' .  $periodo_falta = ($row[25]) . '</td>';
    echo '<td>' . $cantidad_falta = ($row[26]) . '</td>';
    echo '<td>' . $nombre_alumno = ($row[14]) . $apellido_alumno = ($row[15]) . '</td>';
    echo '<td>' .  $nombre_asignatura = ($row[30]) . '</td>';
    echo '<td>' .   $area_asignatura = ($row[33]) . '</td>';
    echo '</tr>';
}


echo '</table>';

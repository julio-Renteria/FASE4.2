<?php

include('consulta_exp.php');


// apartir de aqui todo lo que muestre con echo se me generar en excel 

echo "<table class=table' border=1>";

echo '<tr>';
echo '<th colspan=5><h1>Reporte de Notas Institucion educativa Lorenzo de Alcantuz</h1></th>'; //numero de columnas que quiero crear la tabla
echo '</tr>';



//emcabezados de tabla a exportar
echo '<tr>
<th class="serial cabecera">NOMBRE DEL EVENTO</th>
            <th>MATERIA</th>
            <th>NOMBRE Y APELLIDO PROFESOR</th>
            <th>FEHCA DE INICIO </th>
            <th>FECHA FINAL </th>
</tr>';

//CICLO QUE RECORRE LA TABLA
//_fectch_array = para convertir el row en un arreglo

while ($row = mysqli_fetch_array($resultado)) {
    echo '<tr>';
    echo '<td>' . $row['evento'] . '</td>';
    echo '<td>' . $row['apellidos_docente'] .  $row['nombres_docente'] . '</td>';
    echo '<td>' . $row['nombre_asignatura'] . '</td>';
    echo '<td>' . $row['fecha_inicio'] . '</td>';
    echo '<td>' . $row['fecha_fin'] . '</td>';
    echo '</tr>';
}

echo '</table>';//cierro la etiqueda table fuera del ciclo

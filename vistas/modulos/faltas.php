<?php


require('../templete/header.php');
require('../templete/navegation.php');

require("../../db/conetion.php");


$data_consult_acudiente = mysqli_query($conn, ("SELECT * FROM USUARIO 
    INNER JOIN ACUDIENTE ON USUARIO.ID_USUARIO = ACUDIENTE.ID_ACUDIENTE
    WHERE ACUDIENTE.ID_ACUDIENTE = '$id'"
));
while ($row = mysqli_fetch_row($data_consult_acudiente)) {
    $documento = ($row[8]);
    $direccion = ($row[12]);
    $celular = ($row[14]);
    $apellido = ($row[10]);
}
#Query para extraer informacion del acudiente del alumno

$id = (int)$_GET["id"];
$nombre = $_GET["nb"];



$data_consult_acudiente = mysqli_query($conn, ("SELECT * FROM USUARIO 
    INNER JOIN ACUDIENTE ON USUARIO.ID_USUARIO = ACUDIENTE.ID_ACUDIENTE
    WHERE ACUDIENTE.ID_ACUDIENTE = '$id'"
));
while ($row = mysqli_fetch_row($data_consult_acudiente)) {
    $documento = ($row[8]);
    $direccion = ($row[12]);
    $celular = ($row[14]);
    $apellido = ($row[10]);
}

#Query para extraer informacion de las faltas del alumno

$data_consult_faltas_alumno = mysqli_query($conn, ("SELECT * FROM ACUDIENTE
    INNER JOIN ALUMNO ON ACUDIENTE.ID_ALUMNO = ALUMNO.ID_ALUMNO
    INNER JOIN FALLA ON ALUMNO.ID_ALUMNO = FALLA.ID_ALUMNO
    INNER JOIN ASIGNATURA ON FALLA.ID_ASIGNATURA = ASIGNATURA.ID_ASIGNATURA
    INNER JOIN AREA ON ASIGNATURA.ID_AREA_ASIGNATURA = AREA.ID_AREA
    WHERE ACUDIENTE.ID_ACUDIENTE = '$id'"
));

$num_rows = (int) mysqli_num_rows($data_consult_faltas_alumno);


if ($num_rows == 0) {
    /*  echo 'El usuario' . $nombre . ' no tiene faltas registradas hasta el momento '; */
    /* echo '<body style="display: none;"></body>'; */



    echo '
    
    <div class="col-md-12 text-center">
    <hr class="my-4">
    <h1 class="display-1">

    <div class="alert alert-success" role="alert">
        
        <h5 class="mb-5">Oh! Felicidades  </h5>
        <p class="lead">' . $nombre . '</p>
        <p>No cuantas con ninguna falta registrada hasta el momento.</p>
        <hr>
        <p class="mb-0">Recuerda que en el futuro esta en la educaciòn.</p>
        </div>
        </div> 

        


    ';



    die();
} else {
    while ($row = mysqli_fetch_row($data_consult_faltas_alumno)) {
        $id_alumno = ($row[9]);
        $nombre_alumno = ($row[14]);
        $apellido_alumno = ($row[15]);
        $id_falta = ($row[24]);
        $periodo_falta = ($row[25]);
        $cantidad_falta = ($row[26]);
        $nombre_asignatura = ($row[30]);
        $area_asignatura = ($row[33]);
    }
}










?>




<body>




    <div class="container_table_tasks">
        <h1>Consultar Faltas</h1>

        <table>
            <tr>
                <th>Id Alumno</th>
                <td><?php echo $id_alumno ?></td>
                <th>Periodo Falta</th>
                <td><?php echo $periodo_falta ?></td>
            </tr>
            <tr>
                <th>Nombres Acudiente</th>
                <td><?php echo strtoupper($nombre) . " " . $apellido ?></td>
                <th>Cantidad Faltas</th>
                <td><?php echo $cantidad_falta ?></td>
            </tr>

            <tr>
                <th>Nombres Alumno</th>
                <td><?php echo $nombre_alumno . " " . $apellido_alumno ?></td>
                <th>Asignatura</th>
                <td><?php echo $nombre_asignatura ?></td>
            </tr>
            <tr>
                <th>Id falta</td>
                <td><?php echo $id_falta ?></td>
                <th>Area</th>
                <td><?php echo $area_asignatura ?></td>
            </tr>
        </table>
    </div>
</body>

</html>





<!-- 
<


/* require('../templete/footer.php'); */
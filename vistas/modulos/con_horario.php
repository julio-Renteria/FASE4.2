<?php


require('../templete/header.php');
require('../templete/navegation.php');

require("../../db/conetion.php");

?>






<!-- /* tabla */ -->

<div class="container_info">
    <div class="info_education">
        <h1>Institucion educativa Lorenzo de Alcantuz</h1>
    </div>
</div>

<table class="table ">
    <thead>
        <tr>
            <th class="serial cabecera">NOMBRE DEL EVENTO</th>
            <th class="avatar">MATERIA</th>
            <th>NOMBRE Y APELLIDO PROFESOR</th>
            <th>FEHCA DE INICIO </th>
            <th>FECHA FINAL </th>
        </tr>
    </thead>
    <tbody>


        <?php


        $query = 'SELECT * FROM asignatura INNER JOIN eventoscalendar ON  asignatura.id_asignatura = eventoscalendar.id
    INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura

INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno

  INNER JOIN curso  ON alumno.id_curso = curso.id_curso 

  INNER JOIN docente  ON curso.id_docente = docente.id_docente 

  

      
      
      
      ';



        /* $query = 'SELECT * FROM docente,area WHERE docente.id_area = area.id_area'; */
        $resultado = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($resultado)) { ?>



            <tr>

                </td>
                <td> <?php echo $row['evento'] ?></td>

                <td> <span class="name"><?php echo $row['nombre_asignatura'] ?></span> </td>


                <td> <span class="materia"><?php echo $row['nombres_docente'] . $row['apellidos_docente'] ?></span> </td>

                <td> <span class="materia"><?php echo $row['fecha_inicio'] ?></span> </td>

                <td> <span class="materia"><?php echo $row['fecha_inicio'] ?></span> </td>

            </tr>

        <?php } ?>
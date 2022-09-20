<?php

require("../../db/conetion.php");


require('../templete/header.php');

require('../templete/navegation.php');
?>





<div class="container_info">
    <div class="info_education">
        <h1>Institucion educativa Lorenzo de Alcantuz</h1>
    </div>
</div>

<table class="table ">
    <thead>
        <tr>
            <th class="serial cabecera">ID AREA</th>
            <th class="avatar">FOTO PROFESOR</th>
            <th>APELLIDOS PROFESOR</th>
            <th>NOMBRS PROFESOR</th>
            <th>MATERIA</th>
            <th>TRABAJO</th>
            <th>NOTA</th>
            <th>ESTADO DE MATERIA</th>
        </tr>
    </thead>
    <tbody>





        <!--consulta para mostrar datos en la tabla-->

        <?php
        //$query = 'SELECT * FROM docente JOIN area ON doncente.id_area = area.id_area';
        //$query = "SELECT * FROM docente,area";


        //PRUEBAS DE LLAMADO DE DATOS desde BD A LA TABLA FUNCIOANDO 


        $query = 'SELECT * FROM asignatura INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura

        INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno

          INNER JOIN curso  ON alumno.id_curso = curso.id_curso 

          INNER JOIN docente  ON curso.id_docente = docente.id_docente 
 
           INNER JOIN tarea  ON asignatura.id_asignatura = tarea.id_asignatura   ';



        /* $query = 'SELECT * FROM docente,area WHERE docente.id_area = area.id_area'; */
        $resultado = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($resultado)) { ?>



            <tr>
                <td> <?php echo '# ' . $row['id_area'] ?> </td>
                <td class="avatar">
                    <div class="round-img">
                        <a href="#"><img class="rounded-circle" src="../images/avatar/imagen_profesor.jpg" alt=""></a>
                    </div>

                </td>
                <td> <?php echo $row['apellidos_docente'] ?></td>
                <td> <span class="name"><?php echo $row['nombres_docente'] ?></span> </td>
                <td> <span class="materia"><?php echo $row['nombre_asignatura'] ?></span> </td>
                <td><span class="name"><?php echo $row['nombre_tarea'] ?></span></td>
                <td><span class="materia"><?php echo $row['valor_nota'] ?></span></td>
                <td>
                    <span class="badge badge-complete"><?php echo $row['estado'] ?></span>
                </td>
            </tr>

        <?php } ?>


        <?php include('../../vistas/templete/footer.php'); ?>
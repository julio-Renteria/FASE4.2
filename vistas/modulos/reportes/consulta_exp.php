<?php

require("../../../db/conetion.php");

/* $sql = "SELECT id_nota,valor_nota,periodo_nota,id_alumno,id_asignatura,estado FROM nota"; */
$sql = 'SELECT * FROM asignatura INNER JOIN nota ON  asignatura.id_asignatura = nota.id_asignatura
        INNER JOIN alumno ON nota.id_alumno = alumno.id_alumno
          INNER JOIN curso  ON alumno.id_curso = curso.id_curso 
          INNER JOIN docente  ON curso.id_docente = docente.id_docente 
           INNER JOIN eventoscalendar ON  asignatura.id_asignatura = eventoscalendar.id  '; /* se agrega para consulta de calendar */


$resultado = mysqli_query($conn, $sql); //ejecucion de consulta de arriba sql
$docu = "Horarios.xls"; // nombre del docuemnto a exportar

header('content-type: aplication/vnd.ms-excel'); // le digo que no se muetsre en pantalla sino que se va a descargar
header('content-Disposition: attachment; filename = ' . $docu); // aqui digo que se genere como archivo de descaraga attachement
header('pragma: no-cache');
header('Expires: 0');

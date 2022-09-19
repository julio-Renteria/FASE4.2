<?php
require dirname(__DIR__) . "../../db/conetion.php ";
$id            = $_REQUEST['id'];

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='" . $id . "'");
$resultProd = mysqli_query($conn, $sqlDeleteEvento);

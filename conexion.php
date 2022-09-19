<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/stylesAlert.css" />

<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="#modalTitle"></h4>
                </div>
                <div class="modal-body">
                    <img id="image_modal" style="width:150px" src="">
                    <label id="label1"> </label>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="boton_redirec" href="">OK</a>
                </div>
            </div>

        </div>
    </div>

</div>

<?php

$imagen = "";
$mensaje = "";
$redireccion = "";

function MensajeAlerta($opcion, $mensaje, $redireccion)
{

    if ($opcion == 'correcto') {
        $imagen = "../vistas/images/correcto.png";
    }
    if ($opcion == 'error') {
        $imagen = "../vistas/images/error.png";
    }
    echo '<button type="button" id="verModal" style="display: none;" 
            class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" 
            data-imagen="' . $imagen . '" data-mensaje="' . $mensaje .
        '"data-redireccion="' . $redireccion . '">Open Modal
        </button>';
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        LlamarModal();
        $("#verModal").click();
    });

    function LlamarModal() {
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var dato_i = button.data('imagen')
            var dato_m = button.data('mensaje')
            var dato_r = button.data('redireccion')
            var modal = $(this)
            $('#image_modal').attr('src', dato_i);
            document.getElementById('label1').innerHTML = dato_m;
            $('#boton_redirec').attr('href', dato_r);

        });
    }
</script>







<?php
//empieza la conexion a bd

/* include('../db/alerta_modal.php');
 */

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "Miva2020*";
$dbName = "db_sistema_sena";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Error connecting " . mysqli_connect_error());
}

/* if ($conn) {
    echo "conectado a sistemas ";
}
 */


//LOGIN 

if (!empty($_POST)) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $password_encriptada = sha1($password);
    $query = mysqli_query($conn, ("SELECT * FROM usuario WHERE usuario.nombre_usuario = '$user' 
                                        AND usuario.password_usuario = '$password'"));
    $result = mysqli_num_rows($query);

    /* mia */
    /*   $rows = $result->num_rows; */




    if ($result == 1) {
        while ($row = mysqli_fetch_row($query)) {
            $id = $row[5];
        }
        $data = mysqli_query($conn, ("SELECT * FROM USUARIO 
                                            INNER JOIN ACUDIENTE ON USUARIO.ID_USUARIO = ACUDIENTE.ID_ACUDIENTE
                                            WHERE ACUDIENTE.ID_ACUDIENTE = '$id'"));
        $nombre = ' ';
        while ($row = mysqli_fetch_row($data)) {
            $nombre = ($row['1']) . ' ';
        }

        $words = explode(' ', $nombre);
        $result = '';
        foreach ($words as $w) {
            if (strlen($w) > 2) {
                $result .= ucwords(strtolower($w)) . ' ';
            } else {
                $result .= strtolower($w) . ' ';
            }
        }
        if ($user == 'ADMIN' and $password == 'ADMIN') {
            MensajeAlerta("correcto", "Bienvenido", "./hola.php");
        } else {
            MensajeAlerta("correcto", "Bienvenido $result ", "../vistas/usuarios/ingAcudiente.php");
        }
    } else if ($result == 0) {
        MensajeAlerta("error", "Los datos ingresados son incorrectos", "../index.php");
    }
}

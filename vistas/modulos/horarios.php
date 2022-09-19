<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Insertar descripción aquí." />

    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="../calendar/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../calendar/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../calendar/css/home.css">

    <link rel="shortcut icon" href="./img/favicon.ico" />
    <link rel="icon" type="image/gif" href="/assets/img/animated_favicon1.gif" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/stylesAccesUser.css" />
    <script src="../js/accesUser.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link rel="shortcut icon" href="../images/lolo1.png">


    <!-- ok -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- ok -->
    <link rel="stylesheet" href="../assets/css/stylesAccesUser.css" />

    <!-- /#right-panel -->
    <!-- scrip PARA OCULTAR BARRA LATERAL -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> -->
    <!-- PRESENTA CONFLICTO Y NO DEJA DESPLEGAR EL MENU LATERAL  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Alerta para cerrar la sesion  -->
    <!-- ok -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ok -->
    <script src="../../vistas/assets/js/alertarSesion.js"></script>

    <!-- <title>Acceso a Usuarios</title> -->
</head>





<?php

/* require('../templete/header.php'); */
require('../templete/navegation.php');
require("../../db/conetion.php");


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

$SqlEventos   = ("SELECT * FROM eventoscalendar");
$resulEventos = mysqli_query($conn, $SqlEventos);


?>

<div class="mt-5"></div>

<div class="container">
    <div class="rowSchedule">
        <div class="col msjs">
            <?php
            include('../calendar/msjs.php');

            ?>
        </div>
    </div>
</div>



<div id="calendar"></div>


<?php
include('../calendar/modalNuevoEvento.php');
include('../calendar/modalUpdateEvento.php');
?>



<script src="../calendar/js/jquery-3.0.0.min.js"> </script>
<script src="../calendar/js/popper.min.js"></script>
<script src="../calendar/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../calendar/js/moment.min.js"></script>
<script type="text/javascript" src="../calendar/js/fullcalendar.min.js"></script>
<script src='../calendar/locales/es.js'></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#calendar").fullCalendar({
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },

            locale: 'es',

            defaultView: "month",
            navLinks: true,
            editable: true,
            eventLimit: true,
            selectable: true,
            selectHelper: false,

            //Nuevo Evento
            select: function(start, end) {
                $("#exampleModal").modal();
                $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

                var valorFechaFin = end.format("DD-MM-YYYY");
                var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
                $('input[name=fecha_fin').val(F_final);

            },

            events: [
                <?php
                while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
                        _id: '<?php echo $dataEvento['id']; ?>',
                        title: '<?php echo $dataEvento['evento']; ?>',
                        start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                        end: '<?php echo $dataEvento['fecha_fin']; ?>',
                        color: '<?php echo $dataEvento['color_evento']; ?>'
                    },
                <?php } ?>
            ],


            //Eliminar Evento
            eventRender: function(event, element) {
                element
                    .find(".fc-content")
                    .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

                //Eliminar evento
                element.find(".closeon").on("click", function() {
                    Swal.fire({
                        title: '¿Deseas eliminar el evento?',
                        text: "No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, borralo'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Eliminado!',
                                'El evento ha sido eliminado correctamente',
                                'success'
                            )
                            $("#calendar").fullCalendar("removeEvents", event._id);

                            $.ajax({
                                type: "POST",
                                url: '../calendar/deleteEvento.php',
                                data: {
                                    id: event._id
                                },
                                success: function(datos) {
                                    $(".alert-danger").show();

                                    setTimeout(function() {
                                        $(".alert-danger").slideUp(500);
                                    }, 3000);

                                }
                            });

                        }
                    })

                });
                //Modificar Evento del Calendario 
                element.find(".fc-title").on('click', function() {
                    var idEvento = event._id;
                    $('input[name=idEvento').val(idEvento);
                    $('input[name=evento').val(event.title);
                    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
                    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

                    $("#modalUpdateEvento").modal();
                })
            },


            //Moviendo Evento Drag - Drop
            eventDrop: function(event, delta) {
                var idEvento = event._id;
                var start = (event.start.format('DD-MM-YYYY'));
                var end = (event.end.format("DD-MM-YYYY"));

                $.ajax({
                    url: '../calendar/drag_drop_evento.php',
                    data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
                    type: "POST",
                    success: function(response) {
                        // $("#respuesta").html(response);
                    }
                });
            },




        });


        //Oculta mensajes de Notificacion
        setTimeout(function() {
            $(".alert").slideUp(300);
        }, 3000);


    });
</script>
<?php require('../templete/footer.php'); ?>
</body>

</html>

window.onload = function () {
    let log_out = document.querySelector(".btn_log_out");
    log_out.addEventListener('click', (e) => {
        Swal.fire({
            title: '¿Quieres cerrar la sesión?',
            text: "¿Estas seguro de cerrar la sesión?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy seguro'
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function () { window.location.href = "../../../FASE4.2"; }, 5);
            }
        })
    })
}


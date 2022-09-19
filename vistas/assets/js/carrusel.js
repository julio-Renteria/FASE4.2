
window.onload = function () {
    const grande = document.querySelector('.grande')
    const punto = document.querySelectorAll('.punto')

    punto.forEach((unPunto, i) => {
        punto[i].addEventListener('click', () => {
            let posicion = i
            let operacion = posicion * -17
            grande.style.transform = `translateX(${operacion}%)`
            punto.forEach((unPunto, i) => {
                punto[i].classList.remove('activo')
            })
            punto[i].classList.add('activo')
        })
    })
}

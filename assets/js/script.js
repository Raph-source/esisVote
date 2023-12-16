function errorApparaite() {
    if (document.querySelector('.error')) {
       let error =  document.querySelector('.error')
       error.classList.toggle('error-apparaite')
    }
}
window.addEventListener('DOMContentLoaded',errorApparaite)


let buttons = document.querySelectorAll('button')

buttons.forEach(element =>
    element.addEventListener('click',function () {
        if (element.getAttribute('class') == 'boutonNonValide') {
            alert("Desolé cette option n'est pas disponible pour l'instant ")
            console.log(element.getAttribute('class'))
        }   
    })
)
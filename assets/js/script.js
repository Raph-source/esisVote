function errorApparaite() {
    if (document.querySelector('.error')) {
       let error =  document.querySelector('.error')
       error.classList.toggle('error-apparaite')
    }
}
window.addEventListener('DOMContentLoaded',errorApparaite)
let spanNotif = document.querySelector('.error')
window.addEventListener('DOMContentLoaded',function () {
    if (spanNotif.textContent!='') {
        alert(spanNotif.textContent)
    }
})
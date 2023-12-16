let fileinput = document.querySelectorAll('.fileInput')
let pClick = document.querySelector('form').querySelectorAll('p')

pClick[0].addEventListener("click",function () {
    fileinput[0].click()
})
fileinput[0].addEventListener('change',function () {
    if (fileinput[0].files.length > 0) {
        pClick[0].textContent = fileinput[0].files[0].name
    }
})

pClick[1].addEventListener("click",function () {
    fileinput[1].click()
})
fileinput[1].addEventListener('change',function () {
    if (fileinput[1].files.length > 0) {
        pClick[1].textContent = fileinput[1].files[0].name
    }
})

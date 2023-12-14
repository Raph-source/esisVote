let links = document.querySelector('.aside-bar-desktop').querySelectorAll('a')
/*
links[0].addEventListener('mouseover',function () {
    links[0].querySelector('span').classList.add('infobulle')
})*/

links.forEach(element =>
    element.addEventListener('mouseover',function () {
        element.querySelector('span').classList.toggle('infobulle')
    })
)

links.forEach(element =>
    element.addEventListener('mouseout',function () {
        element.querySelector('span').classList.remove('infobulle')
    })
)

let menu = document.querySelector('.barre')
let aside = document.querySelector('.aside-bar')
menu.addEventListener('click',function () {
    aside.classList.add('aside-visible')
})
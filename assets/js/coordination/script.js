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
let spanNotif = document.querySelector('.error')
window.addEventListener('DOMContentLoaded',function () {
    if (spanNotif.textContent!='') {
        alert(spanNotif.textContent)
    }
})
let cont = document.querySelector('.container')
cont.addEventListener('click',function () {
    aside.classList.remove('aside-visible')
})
let closes = document.querySelector('.close')
closes.addEventListener('click',function () {
    aside.classList.remove('aside-visible')
})

let lancerVote = document.getElementById('card-option1');
let publierResultat = document.getElementById('card-option2');
let lancerCandidature = document.getElementById('card-option3');
let relancerVote = document.querySelectorAll('.relancerVote');

lancerVote.addEventListener('click', function(){
    window.location.href = 'lancer-les-votes';
});

publierResultat.addEventListener('click', function(){
    window.location.href = 'publier-les-resultat';
});

lancerCandidature.addEventListener('click', function(){
    window.location.href = 'lancer-les-candidatures';
});

relancerVote.forEach(element =>
    element.addEventListener('click', function(){
        if(confirm('Être sur de vouloir relancer les élections? ')){
            console.log('teste');
            window.location.href = 'relancer-les-votes';
        }
    })
);


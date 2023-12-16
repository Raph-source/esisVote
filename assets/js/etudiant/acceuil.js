// let boutonNonValides = document.querySelectorAll('.boutonNonValide');

// for(let i = 0; i < boutonNonValides.length; i++){
//     boutonNonValides[i].disabled = true;
// }

let postuler = document.getElementById("postuler");
let voter = document.getElementById("voter");
let voirResultat = document.getElementById("voirResultat");

if(postuler !== null){
    postuler.addEventListener('click', function(){
        window.location.href = "postuler";
    });
}

if(voter !== null){
    voter.addEventListener('click', function(){
        window.location.href = "voter";
    });
}

if(voirResultat !== null){
    voirResultat.addEventListener('click', function(){
        window.location.href = "voirResultat";
    });
}


let btnSee = document.querySelector(".see")
btnSee.forEach(element =>
    element.addEventListener('click',function () {
        element.classList.add('visible')
    })
)

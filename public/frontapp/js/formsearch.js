/* price */
let prixmaximum = document.getElementById('prixmaximum');
let Rangeprixmaximum = document.getElementById('Rangeprixmaximum');

let prixminimum = document.getElementById('prixminimum');
let Rangeprixminimum = document.getElementById('Rangeprixminimum');
/* KLM   */
let minklm = document.getElementById('minklm');
let Rangeminklm = document.getElementById('Rangeminklm');

let maxklm = document.getElementById('maxklm');
let Rangemaxklm = document.getElementById('Rangemaxklm');



rabgechange( Rangeprixminimum ,prixminimum ,'K (DH)');
rabgechange(Rangeprixmaximum ,prixmaximum ,'K (DH)');

rabgechange( Rangeminklm ,minklm ,'K (KM)');
rabgechange(Rangemaxklm ,maxklm ,'K (KM)');

function rabgechange(inputRange , resultRange , textValue){
    resultRange.innerText = inputRange.value+''+textValue;
    inputRange.addEventListener('input',function (){
        resultRange.innerText = inputRange.value + textValue;
    });
}

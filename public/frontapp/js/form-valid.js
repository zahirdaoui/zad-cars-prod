var subject = document.getElementById('subject');
var namee = document.getElementById('name');
let email = document.getElementById('email');
let message = document.getElementById('message');
let btn = document.getElementById("sendmessage");
let aller = document.getElementById("messsagesend");

btn.addEventListener('click',function (e){
    e.preventDefault();
   var targeter = [];
    var patternReg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    subjectCl = subject.value.toLowerCase();
    nameCl =namee.value.toLowerCase();
    emailCl = email.value.toLowerCase();
    messageCl = message.value.toLowerCase();
    if(subjectCl.length <= 2 || subjectCl ==""){
        styler(subject);
        targeter = [1];
    }else{
        valid(subject,"message");
    };
    if(nameCl.length <= 2 || nameCl ==""){
        styler(namee);
        targeter = [2];
    }else{
        valid(namee,"message");
    };
    if(emailCl.length == 0 || !patternReg.test(emailCl)){
        styler(email);
        targeter = [3];
    }else{
        valid(email,"message");
    };
    if(messageCl.length <=10 ){
        styler(message);
        targeter = [4];
    }else{
        valid(message,"message");
    };
    if(targeter.length == 0){
        valid(message,"message");
        messsageenvoi();
        send();
         subject.value = "";
         namee.value = "";
         email.value = "";
         message.value = "";

    }
    console.log(message.value);
})
function styler(style){
    style.parentElement.classList.add('parentdiv')
};
function valid(tester,elem){
    console.log("form "+elem+" valid");
    tester.parentElement.classList.remove('parentdiv')
};

function messsageenvoi(){
    aller.classList.remove("d-none");
    aller.classList.add("d-block");

}

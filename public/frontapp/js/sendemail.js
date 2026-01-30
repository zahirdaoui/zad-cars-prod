function send(param){
    var tempparam = {
        Subject:document.getElementById('subject').value,
        name:document.getElementById('name').value,
        email: document.getElementById('email').value,
        message:document.getElementById('message').value
    }

    emailjs.send('service_k4pgx1w' , 'template_m7b1lxf',tempparam)
    .then(function (res){
        console.log(res.status);
    })

}
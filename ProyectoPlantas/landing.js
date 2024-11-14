let botones = document.querySelectorAll('.empresaPDF');

botones.forEach(boton => {

    boton.addEventListener('click', () => {

        window.open("../1er Sprint Empresa.pdf", '_blank').focus();
    });
});




let hablarBtn = document.getElementById('hablemos');

hablarBtn.addEventListener('click', () => {

    window.open("https://github.com/Fifthexpert9", '_blank').focus();
});



let formularioContenedor = document.getElementById('contenedor');
let botonLog = document.getElementById('Login');

botonLog.addEventListener('click', (event) => {
					
    event.preventDefault();
    formularioContenedor.style.display = "flex";

});


let IniciarSesion = document.querySelector('.login-btn');

IniciarSesion.addEventListener('click', () => {
						
    formularioContenedor.style.display = "none";

});
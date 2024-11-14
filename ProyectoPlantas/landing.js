let botones = document.querySelectorAll('.empresaPDF');

botones.forEach(boton => {
    
    boton.addEventListener('click', () => {

        window.open("../1er Sprint Empresa.pdf", '_blank').focus();
    });
});
    
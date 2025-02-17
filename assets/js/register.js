document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    // Seleccionamos los campos del formulario
    const firstName = document.getElementById("first-name");
    const lastName = document.getElementById("last-name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    // Función para mostrar mensajes de error
    function showError(input, message) {
        let errorSpan = input.nextElementSibling;
        if (!errorSpan || !errorSpan.classList.contains("error-message")) {
            errorSpan = document.createElement("span");
            errorSpan.classList.add("error-message");
            input.parentNode.appendChild(errorSpan);
        }
        errorSpan.textContent = message;
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
    }

    // Función para mostrar éxito
    function showSuccess(input) {
        let errorSpan = input.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains("error-message")) {
            errorSpan.remove();
        }
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }

    // Validaciones individuales
    function validateFirstName() {
        const value = firstName.value.trim();
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
            showError(firstName, "El nombre solo puede contener letras y espacios.");
        } else {
            showSuccess(firstName);
        }
    }

    function validateLastName() {
        const value = lastName.value.trim();
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
            showError(lastName, "Los apellidos solo pueden contener letras y espacios.");
        } else {
            showSuccess(lastName);
        }
    }

    function validateEmail() {
        const value = email.value.trim();
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            showError(email, "El correo electrónico no es válido.");
        } else {
            showSuccess(email);
        }
    }

    function validatePassword() {
        const value = password.value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (!passwordRegex.test(value)) {
            showError(password, "Debe tener 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.");
        } else {
            showSuccess(password);
        }
    }

    // Agregamos eventos de entrada para validar en tiempo real
    firstName.addEventListener("input", validateFirstName);
    lastName.addEventListener("input", validateLastName);
    email.addEventListener("input", validateEmail);
    password.addEventListener("input", validatePassword);

    // Validar el formulario antes de enviarlo
    form.addEventListener("submit", function (event) {
        validateFirstName();
        validateLastName();
        validateEmail();
        validatePassword();

        // Si hay errores, prevenir el envío del formulario
        if (document.querySelector(".is-invalid")) {
            event.preventDefault();
        }
    });
});

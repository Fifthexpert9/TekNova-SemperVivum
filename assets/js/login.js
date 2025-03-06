document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const email = document.getElementById("email");

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

    function showSuccess(input) {
        let errorSpan = input.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains("error-message")) {
            errorSpan.remove();
        }
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }

    function validateEmail() {
        const value = email.value.trim();
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            showError(email, "El correo electrónico no es válido.");
        } else {
            showSuccess(email);
        }
    }

    email.addEventListener("input", validateEmail);

    form.addEventListener("submit", function (event) {
        validateEmail();

        if (document.querySelector(".is-invalid")) {
            event.preventDefault();
        }
    });
});

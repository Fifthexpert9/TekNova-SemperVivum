document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const submitButton = form.querySelector("button[type='submit']");
    const nameInput = document.getElementById("name");
    const descriptionInput = document.getElementById("description");
    const priceInput = document.getElementById("price");
    const imageInput = document.getElementById("image");

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

    function notShowError(input) {
        let errorSpan = input.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains("error-message")) {
            errorSpan.remove();
        }
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
    }

    function validateName() {
        const name = nameInput.value.trim();
        if (name.length < 3 || name.length > 50) {
            showError(nameInput, "El nombre debe tener entre 3 y 50 caracteres.");
            return false;
        }
        notShowError(nameInput);
        return true;
    }

    function validateDescription() {
        if (descriptionInput.value.trim() === "") {
            showError(descriptionInput, "La descripción no puede estar vacía.");
            return false;
        }
        notShowError(descriptionInput);
        return true;
    }

    function validatePrice() {
        const price = parseFloat(priceInput.value.replace(",", ".")); // admite puntos y comas para el precio; reemplaza comas por puntos para ingresar el valor correcto en la bbdd
        if (isNaN(price) || price < 1) {
            showError(priceInput, "El precio debe ser un número mayor o igual a 1.");
            return false;
        }
        notShowError(priceInput);
        return true;
    }

    function validateImage() {
        const file = imageInput.files[0];
        if (file) {
            const allowedExtensions = ["webp"];
            const fileExtension = file.name.split(".").pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                showError(imageInput, "La imagen debe ser en formato .webp");
                return false;
            }
        } else {
            showError(imageInput, "Debes seleccionar una imagen.");
            return false;
        }
        notShowError(imageInput);
        return true;
    }

    nameInput.addEventListener("input", validateName);
    descriptionInput.addEventListener("input", validateDescription);
    priceInput.addEventListener("input", validatePrice);
    imageInput.addEventListener("change", validateImage);

    form.addEventListener("submit", function (event) {
        if (!validateName() || !validateDescription() || !validatePrice() || !validateImage()) {
            event.preventDefault();
        }
    });
});
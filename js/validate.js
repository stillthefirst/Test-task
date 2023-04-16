const form = document.getElementById("popup-form");
const emailInput = form.querySelector("input[name='email']");


window.addEventListener("DOMContentLoaded", function() {
        [].forEach.call( document.querySelectorAll('.phone'), function(input) {
        var keyCode;
        function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                var pos = this.selectionStart;
                if (pos < 3) event.preventDefault();
                var matrix = "+7 (___) ___-__-__",
                        i = 0,
                        def = matrix.replace(/\D/g, ""),
                        val = this.value.replace(/\D/g, ""),
                        new_value = matrix.replace(/[_\d]/g, function(a) {
                                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                        });
                i = new_value.indexOf("_");
                if (i != -1) {
                        i < 5 && (i = 3);
                        new_value = new_value.slice(0, i)
                }
                var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                        function(a) {
                                return "\\d{1," + a.length + "}"
                        }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
                if (event.type == "blur" && this.value.length < 5)  this.value = ""
        }

        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
        input.addEventListener("keydown", mask, false)

    });

});

form.addEventListener("submit", function(event) {
    let hasError = false;

    if (!validateEmail(emailInput.value)) {
        showErrorMessage(emailInput, "Введите корректный email");
        hasError = true;
    }

    if (hasError) {
        event.preventDefault();
    }
    else{
        alert("Форма успешно отправлена!");
    }
});

function validateEmail(email) {
    // регулярное выражение для проверки email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}


function showErrorMessage(input, message) {
    const errorElement = document.createElement("div");
    errorElement.classList.add("error-message");
    errorElement.innerText = message;
    // добавляем сообщение об ошибке над полем ввода
    input.parentNode.insertBefore(errorElement, input);

    // добавляем класс с ошибкой для стилизации поля ввода
    input.classList.add("input-error");
}

// убираем сообщение об ошибке и класс с ошибкой при изменении поля ввода
emailInput.addEventListener("input", function() {
    clearErrorMessage(emailInput);
});


function clearErrorMessage(input) {
    const errorElement = input.parentNode.querySelector(".error-message");
    if (errorElement) {
        input.parentNode.removeChild(errorElement);
        input.classList.remove("input-error");
    }
}




$(document).ready(function() {
  
    


function validateEmail(email) {
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    var phoneRegex = /^\d{4}-\d{7}$/;
    return phoneRegex.test(phone);
}

function validateName(name) {
    var nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+)?$/;
    return nameRegex.test(name);
}

function validatePassword(password) {
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
    return passwordRegex.test(password);
}

function updatePasswordStrength(password) {
    var passwordStrengthElement = document.getElementById("passwordStrength");
    var passwordInput = document.getElementById("inputPassword");
    var passwordError = document.getElementById("passwordError");
    if (!validatePassword(password)) {

        passwordInput.classList.add("password-weak");
        passwordInput.classList.remove("password-medium");
        passwordInput.classList.remove("password-strong");


        passwordStrengthElement.textContent = "Password Strength: Weak";
        passwordStrengthElement.style.color = "red";



    } else if (password.length >= 8 && password.length <= 12) {
        passwordInput.classList.remove("password-weak");
        passwordInput.classList.add("password-medium");
        passwordInput.classList.remove("password-strong");
        passwordStrengthElement.textContent = "Password Strength: Medium";
        passwordStrengthElement.style.color = "orange";


    } else if (password.length > 12) {
        passwordInput.classList.remove("password-weak");
        passwordInput.classList.remove("password-medium");
        passwordInput.classList.add("password-strong");
        passwordStrengthElement.textContent = "Password Strength: Strong";
        passwordStrengthElement.style.color = "green"

    }
}

document.getElementById("inputName").addEventListener("blur", function (event) {
    const nameInput = event.target;
    const nameError = document.getElementById("nameError");

    if (!validateName(nameInput.value.trim())) {
        nameError.textContent = "Invalid name";
        nameError.style.display = "block";
        nameInput.classList.add("is-invalid");
    } else {
        nameError.style.display = "none";
        nameInput.classList.remove("is-invalid");
    }
});

document.getElementById("inputEmail").addEventListener("blur", function (event) {
    const emailInput = event.target;
    const emailError = document.getElementById("emailError");

    if (!validateEmail(emailInput.value)) {
        emailError.textContent = "Invalid email address";
        emailError.style.display = "block";
        emailInput.classList.add("is-invalid");
    } else {
        emailError.style.display = "none";
        emailInput.classList.remove("is-invalid");
    }
});

document.getElementById("phone").addEventListener("blur", function (event) {
    const phoneInput = event.target;
    const phoneError = document.getElementById("phoneError");

    if (!validatePhone(phoneInput.value)) {
        phoneError.textContent = "Invalid phone number";
        phoneError.style.display = "block";
        phoneInput.classList.add("is-invalid");
    } else {
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");
    }
});



document.getElementById("inputPassword").addEventListener("keyup", function (event) {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(function () {
        updatePasswordStrength(event.target.value);
    }, doneTypingInterval);
});
document.getElementById("inputConfirmPassword").addEventListener("input", function () {
    const passwordInput = document.getElementById("inputPassword");
    const confirmPasswordInput = document.getElementById("inputConfirmPassword");
    const confirmPasswordError = document.getElementById("confirmPasswordError");

    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = "Passwords do not match";
        confirmPasswordError.style.display = "block";
        confirmPasswordInput.classList.add("is-invalid");
    } else {
        confirmPasswordError.style.display = "none";
        confirmPasswordInput.classList.remove("is-invalid");
    }
});
document.getElementById("signupForm").addEventListener("submit", function (event) {
    const nameInput = document.getElementById("inputName");
    const nameError = document.getElementById("nameError");
    const emailInput = document.getElementById("inputEmail");
    const emailError = document.getElementById("emailError");
    const phoneInput = document.getElementById("phone");
    const phoneError = document.getElementById("phoneError");
    const passwordInput = document.getElementById("inputPassword");
    const confirmPasswordInput = document.getElementById("inputConfirmPassword");
    const confirmPasswordError = document.getElementById("confirmPasswordError");

    if (!validateName(nameInput.value.trim())) {
        nameError.textContent = "Invalid name";
        nameError.style.display = "block";
        nameInput.classList.add("is-invalid");
        event.preventDefault();
    } else {
        nameError.style.display = "none";
        nameInput.classList.remove("is-invalid");
    }

    if (!validateEmail(emailInput.value.trim())) {
        emailError.textContent = "Invalid email";
        emailError.style.display = "block";
        emailInput.classList.add("is-invalid");
        event.preventDefault();
    } else {
        emailError.style.display = "none";
        emailInput.classList.remove("is-invalid");
    }

    if (!validatePhone(phoneInput.value.trim())) {
        phoneError.textContent = "Invalid phone number";
        phoneError.style.display = "block";
        phoneInput.classList.add("is-invalid");
        event.preventDefault();
    } else {
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");
    }

    if (!validatePassword(passwordInput.value)) {
        passwordInput.classList.add("is-invalid");
        event.preventDefault();
    } else {
        passwordInput.classList.remove("is-invalid");
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = "Passwords do not match";
        confirmPasswordError.style.display = "block";
        confirmPasswordInput.classList.add("is-invalid");
        event.preventDefault();
    } else {
        confirmPasswordError.style.display = "none";
        confirmPasswordInput.classList.remove("is-invalid");
    }
});

document.getElementById("inputPassword").addEventListener("input", function (event) {
    updatePasswordStrength(event.target.value);
});
});
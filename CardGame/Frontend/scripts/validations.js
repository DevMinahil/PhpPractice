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
        var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        return passwordRegex.test(password);
    }

    function updatePasswordStrength(password) {
        var passwordStrengthElement = $("#passwordStrength");
        var passwordInput = $("#inputPassword");
        var passwordError = $("#passwordError");

        if (!validatePassword(password)) {
            passwordInput.removeClass("password-medium password-strong").addClass("password-weak");
            passwordStrengthElement.text("Password Strength: Weak").css("color", "red");
        } else if (password.length >= 8 && password.length <= 12) {
            passwordInput.removeClass("password-weak password-strong").addClass("password-medium");
            passwordStrengthElement.text("Password Strength: Medium").css("color", "orange");
        } else if (password.length > 12) {
            passwordInput.removeClass("password-weak password-medium").addClass("password-strong");
            passwordStrengthElement.text("Password Strength: Strong").css("color", "green");
        }
    }

    $("#inputName").blur(function() {
        var nameInput = $(this);
        var nameError = $("#nameError");

        if (!validateName(nameInput.val().trim())) {
            nameError.text("Invalid name").show();
            nameInput.addClass("is-invalid");
        } else {
            nameError.hide();
            nameInput.removeClass("is-invalid");
        }
    });
    $("#inputEmail").blur(function() {
        var emailInput = $(this);
        var emailError = $("#emailError");

        if (!validateEmail(emailInput.val())) {
            emailError.text("Invalid email address").show();
            emailInput.addClass("is-invalid");
        } else {
            emailError.hide();
            emailInput.removeClass("is-invalid");
        }
    })
    $("#phone").blur(function() {
        var phoneInput = $(this);
        var phoneError = $("#phoneError");

        if (!validatePhone(phoneInput.val())) {
            phoneError.text("Invalid phone number").show();
            phoneInput.addClass("is-invalid");
        } else {
            phoneError.hide();
            phoneInput.removeClass("is-invalid");
        }
    });

    var typingTimer;
    var doneTypingInterval = 1000;
    $("#inputPassword").keyup(function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function() {
            updatePasswordStrength($("#inputPassword").val());
        }, doneTypingInterval);
    });

    $("#inputConfirmPassword").on("input", function() {
        var passwordInput = $("#inputPassword");
        var confirmPasswordInput = $(this);
        var confirmPasswordError = $("#confirmPasswordError");

        if (passwordInput.val() !== confirmPasswordInput.val()) {
            confirmPasswordError.text("Passwords do not match").show();
            confirmPasswordInput.addClass("is-invalid");
        } else {
            confirmPasswordError.hide();
            confirmPasswordInput.removeClass("is-invalid");
        }
    });
    $("#signupForm").submit(function(event) {
        var nameInput = $("#inputName");
        var nameError = $("#nameError");
        var emailInput = $("#inputEmail");
        var emailError = $("#emailError");
        var phoneInput = $("#phone");
        var phoneError = $("#phoneError");
        var passwordInput = $("#inputPassword");
        var confirmPasswordInput = $("#inputConfirmPassword");
        var confirmPasswordError = $("#confirmPasswordError");

        if (!validateName(nameInput.val().trim())) {
            nameError.text("Invalid name").show();
            nameInput.addClass("is-invalid");
            event.preventDefault();
        } else {
            nameError.hide();
            nameInput.removeClass("is-invalid");
        }

        if (!validateEmail(emailInput.val().trim())) {
            emailError.text("Invalid email").show();
            emailInput.addClass("is-invalid");
            event.preventDefault();
        } else {
            emailError.hide();
            emailInput.removeClass("is-invalid");
        }

        if (!validatePhone(phoneInput.val().trim())) {
            phoneError.text("Invalid phone number").show();
            phoneInput.addClass("is-invalid");
            event.preventDefault();
        } else {
            phoneError.hide();
            phoneInput.removeClass("is-invalid");
        }

        if (!validatePassword(passwordInput.val())) {
            passwordInput.addClass("is-invalid");
            event.preventDefault();
        } else {
            passwordInput.removeClass("is-invalid");
        }

        if (passwordInput.val() !== confirmPasswordInput.val()) {
            confirmPasswordError.text("Passwords do not match").show();
            confirmPasswordInput.addClass("is-invalid");
            event.preventDefault();
        } else {
            confirmPasswordError.hide();
            confirmPasswordInput.removeClass("is-invalid");
        }
    });

    $("#inputPassword").on("input", function() {
        updatePasswordStrength($(this).val());
    });
});

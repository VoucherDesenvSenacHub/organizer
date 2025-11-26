const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

if (togglePassword && password) {
    togglePassword.addEventListener("click", function () {
        const type = password.type === "password" ? "text" : "password";
        password.type = type;
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
}

const togglePasswordConfirm = document.querySelector("#togglePasswordConfirm");
const passwordConfirm = document.querySelector("#password_confirmation");

if (togglePasswordConfirm && passwordConfirm) {
    togglePasswordConfirm.addEventListener("click", function () {
        const type = passwordConfirm.type === "password" ? "text" : "password";
        passwordConfirm.type = type;
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
}
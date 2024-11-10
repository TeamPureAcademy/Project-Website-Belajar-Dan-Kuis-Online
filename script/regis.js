const password = document.getElementById('password');
const confirmPassword = document.querySelector('input[name="password_confirm"]');
const form = document.querySelector('form');

const errorMessage = document.createElement('div');
errorMessage.className = 'error-message';
errorMessage.style.color = 'red';
errorMessage.style.fontSize = '12px';
errorMessage.style.textAlign = 'center';

confirmPassword.parentNode.appendChild(errorMessage);

function validatePasswords() {
    if (confirmPassword.value !== '') {
        if (confirmPassword.value !== password.value) {
            errorMessage.textContent = 'Kata sandi tidak cocok!';
            confirmPassword.style.borderColor = 'red';
            return false;
        } else {
            errorMessage.textContent = '';
            confirmPassword.style.borderColor = '#49688d';
            return true;
        }
    } else {
        errorMessage.textContent = '';
        confirmPassword.style.borderColor = '#49688d';
        return true;
    }
}

confirmPassword.addEventListener('input', validatePasswords);
password.addEventListener('input', function() {
    if (confirmPassword.value !== '') {
        validatePasswords();
    }
});

form.addEventListener('submit', function(e) {
    if (!validatePasswords()) {
        e.preventDefault();
    }
});

const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');
const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
const passwordConfirmField = document.getElementById('password_confirm');

togglePassword.addEventListener('click', function () {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

togglePasswordConfirm.addEventListener('click', function () {
    const type = passwordConfirmField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirmField.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});


const fileUpload = document.getElementById('file-upload');
const fileChosen = document.getElementById('file-chosen');
    
    fileUpload.addEventListener('change', function() {
        if (fileUpload.files.length > 0) {
            fileChosen.textContent = fileUpload.files[0].name;
        } else {
            fileChosen.textContent = "No File Chosen";
        }
    });
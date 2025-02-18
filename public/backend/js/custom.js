function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('show-password');
    const type = showPasswordCheckbox.checked ? 'text' : 'password';
    passwordField.setAttribute('type', type);
}

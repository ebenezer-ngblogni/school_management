// Afficher ou masquer le mot de passe
const togglePassword = document.querySelector('.toggle-password i');
const passwordInput = document.getElementById('password');

togglePassword.parentElement.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    togglePassword.classList.remove('fa-eye');
    togglePassword.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    togglePassword.classList.remove('fa-eye-slash');
    togglePassword.classList.add('fa-eye');
  }
});

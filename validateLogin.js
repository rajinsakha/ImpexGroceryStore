
const form = document.querySelector('form');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const emailError = document.querySelector('.email-error');
const passwordError = document.querySelector('.password-error');

// Event listener for form submission
form.addEventListener('submit', function (event) {
  let isValid = true;

  // Clear previous error messages
  emailError.textContent = '';
  passwordError.textContent = '';

  // Validate Email
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(emailInput.value)) {
    emailError.textContent = 'Invalid Email';
    isValid = false;
  }

  // Validate Password
  if (passwordInput.value.trim() === '') {
    passwordError.textContent = 'Password is required';
    isValid = false;
  }

  // Prevent form submission if validation fails
  if (!isValid) {
    event.preventDefault();
  }
});
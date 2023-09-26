
const form = document.querySelector('form');
const fullnameInput = document.querySelector('input[name="fullname"]');
const emailInput = document.querySelector('input[name="email"]');
const contactInput = document.querySelector('input[name="contact"]');
const passwordInput = document.querySelector('input[name="password"]');
const cpasswordInput = document.querySelector('input[name="cpassword"]');
const nameError = document.querySelector('.name-error');
const emailError = document.querySelector('.email-error');
const contactError = document.querySelector('.contact-error');
const passwordError = document.querySelector('.password-error');
const cpasswordError = document.querySelector('.cpassword-error');

// Event listener for form submission
form.addEventListener('submit', function (event) {
  let isValid = true;

  // Clear previous error messages
  nameError.textContent = '';
  emailError.textContent = '';
  contactError.textContent = '';
  passwordError.textContent = '';
  cpasswordError.textContent = '';

  // Validate Full Name
  if (fullnameInput.value.trim() === '') {
    nameError.textContent = 'Full Name is required';
    isValid = false;
  }

  // Validate Email
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(emailInput.value)) {
    emailError.textContent = 'Invalid Email';
    isValid = false;
  }

  // Validate Mobile Number (Assuming a 10-digit number)
  const mobilePattern = /^[0-9]{10}$/;
  if (!mobilePattern.test(contactInput.value)) {
    contactError.textContent = 'Invalid Mobile Number (10 digits required)';
    isValid = false;
  }

  // Validate Password
  if (passwordInput.value.trim() === '') {
    passwordError.textContent = 'Password is required';
    isValid = false;
  }

  // Validate Confirm Password
  if (cpasswordInput.value.trim() === '') {
    cpasswordError.textContent = 'Confirm Password is required';
    isValid = false;
  } else if (passwordInput.value !== cpasswordInput.value) {
    cpasswordError.textContent = 'Passwords do not match';
    isValid = false;
  }

  // Prevent form submission if validation fails
  if (!isValid) {
    event.preventDefault();
  }
});
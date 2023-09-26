document.addEventListener("DOMContentLoaded", function () {
  let signupForm = document.querySelector("form");

  signupForm.addEventListener("submit", function (event) {
    let fullname = document
      .querySelector('input[name="fullname"]')
      .value.trim();
    let email = document.querySelector('input[name="email"]').value.trim();
    let contact = document.querySelector('input[name="contact"]').value.trim();
    let password = document
      .querySelector('input[name="password"]')
      .value.trim();
    let cpassword = document
      .querySelector('input[name="cpassword"]')
      .value.trim();

    // Reset error messages
    document.querySelector(".name-error").textContent = "";
    document.querySelector(".email-error").textContent = "";
    document.querySelector(".message-error").textContent = "";
    document.querySelector(".contact-error").textContent = "";
    document.querySelector(".password-error").textContent = "";
    document.querySelector(".cpassword-error").textContent = "";

    // Validate fullname
    if (!fullname) {
      document.querySelector(".name-error").textContent =
        "Full name is required.";
      event.preventDefault();
      return;
    }

    // Validate email
    if (!email) {
      document.querySelector(".email-error").textContent = "Email is required.";
      event.preventDefault();
      return;
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
      document.querySelector(".email-error").textContent =
        "Please enter a valid email address.";
      event.preventDefault();
      return;
    }

    // Validate contact
    if (!contact) {
      document.querySelector(".contact-error").textContent =
        "Mobile Number is required";
      event.preventDefault();
      return;
    } else if (!/^\d{10}$/.test(contact)) {
      document.querySelector(".contact-error").textContent =
         "Please enter a valid 10-digit mobile number.";
      event.preventDefault();
      return;
    }

    // Validate password
    if (!password) {
      document.querySelector(".password-error").textContent =
        "Password is required.";
      event.preventDefault();
      return;
    } else if (password.length < 8) {
      document.querySelector(".password-error").textContent =
        "Password should be at least 8 characters long.";
      event.preventDefault();
      return;
    }

    // Validate confirm password
    if (password !== cpassword) {
      document.querySelector(".cpassword-error").textContent =
        "Passwords do not match.";
      event.preventDefault();
    }
  });
});

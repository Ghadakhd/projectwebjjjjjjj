// Function to validate form data
document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    // Reset all error messages
    resetErrors();

    let isValid = true;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let firstName = document.getElementById('first_name').value;
    let lastName = document.getElementById('last_name').value;
    let dateOfBirth = document.getElementById('date_of_birth').value;

    // Validate inputs
    if (username.trim() === "") {
        showError('usernameError', 'Username is required');
        isValid = false;
    }

    if (email.trim() === "") {
        showError('emailError', 'Email is required');
        isValid = false;
    } else if (!validateEmail(email)) {
        showError('emailError', 'Please enter a valid email address');
        isValid = false;
    }

    if (password.trim() === "") {
        showError('passwordError', 'Password is required');
        isValid = false;
    } else if (password.length < 6) {
        showError('passwordError', 'Password must be at least 6 characters long');
        isValid = false;
    }

    if (confirmPassword.trim() === "") {
        showError('confirmPasswordError', 'Confirm Password is required');
        isValid = false;
    } else if (password !== confirmPassword) {
        showError('confirmPasswordError', 'Passwords do not match');
        isValid = false;
    }

    if (firstName.trim() === "") {
        showError('firstNameError', 'First name is required');
        isValid = false;
    }

    if (lastName.trim() === "") {
        showError('lastNameError', 'Last name is required');
        isValid = false;
    }

    if (dateOfBirth.trim() === "") {
        showError('dateOfBirthError', 'Date of birth is required');
        isValid = false;
    }

    // If all inputs are valid, submit the form
    if (isValid) {
        document.getElementById('signupForm').submit();
    }
});

// Function to display error messages
function showError(elementId, message) {
    let errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

// Function to reset error messages
function resetErrors() {
    let errorElements = document.querySelectorAll('span');
    errorElements.forEach(function(element) {
        element.style.display = 'none';
    });
}

// Email validation function
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}

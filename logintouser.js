const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const profileBtn = document.getElementById('profile-btn');

// Initialize the login state to false
let isLoggedIn = false;

// Add event listeners to the login and signup buttons
loginBtn.addEventListener('click', () => {
    // Simulate the login process
    isLoggedIn = true;
    localStorage.setItem('isLoggedIn', isLoggedIn);
    updateNavbar();
});

signupBtn.addEventListener('click', () => {
    // Redirect to the signup page
    window.location.href = 'register.php';
});

// Check the login state from localStorage
if (localStorage.getItem('isLoggedIn')) {
    isLoggedIn = JSON.parse(localStorage.getItem('isLoggedIn'));
    updateNavbar();
}

// Function to update the navbar based on the login state
function updateNavbar() {
    if (isLoggedIn) {
        // Remove the login and signup buttons
        loginBtn.style.display = 'none';
        signupBtn.style.display = 'none';

        // Add the profile button
        const profileBtn = document.createElement('button');
        profileBtn.id = 'profile-btn';
        profileBtn.className = 'nav-link';
        profileBtn.textContent = 'Profile';
        document.querySelector('nav .navbar-nav .nav-item .login-signup-btn-container').appendChild(profileBtn);

        // Update the profile button click event listener
        profileBtn.addEventListener('click', () => {
            // Redirect to the profile page
            window.location.href = 'update_profile.php';
        });
    } else {
        // Remove the profile button
        const profileBtn = document.getElementById('profile-btn');
        if (profileBtn) {
            profileBtn.remove();
        }
    }
}
// VARIABLES
let submit_Btn = document.getElementById('submit-login');

// EVENT LISTENER

submit_Btn.addEventListener('click', async (e) => {
    e.preventDefault();
    console.log('Login button clicked');

    // Handle login logic here
    const loginForm = document.getElementById('login-form');
    const formData = new FormData(loginForm);

    const response = await fetch("/api/login/user", {
        method: "POST",
        body: formData
    });

    if (response.ok) {
        const data = await response.json();
        console.log('User logged in successfully:', data);
        // Redirect to dashboard after successful login
        window.location.href = '/dashboard'; 
    } else {
        const errorData = await response.json();
        console.error('Error logging in user:', errorData);
        // Handle error (e.g., display error message to the user)
    }   
    

});
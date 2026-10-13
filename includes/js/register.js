//VARIABLES 
let submit_Btn = document.getElementById('submit-register');
const registerForm = document.getElementById('register-form');



//Event Listeners
submit_Btn.addEventListener('click', async (e) => {
    e.preventDefault();
    console.log('Register button clicked');
    // Handle registration logic here
    const formData = new FormData(registerForm);

    const response = await fetch("/api/register/user", {
        method: "POST",
        body: formData
    });

    if (response.ok) {
        const data = await response.json();
        console.log('User registered successfully:', data);
        // Redirect to login page after successful registration
        window.location.href = '/login'; 
    } else {
        const errorData = await response.json();
        console.error('Error registering user:', errorData);
        // Handle error (e.g., display error message to the user)
    }

});
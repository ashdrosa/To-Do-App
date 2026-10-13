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
});
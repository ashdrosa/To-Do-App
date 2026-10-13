//Variables
let createUserBtn = document.getElementById('create-user');

//Event Listeners
createUserBtn.addEventListener('click', (e) => {
    e.preventDefault();
    console.log('Create User button clicked');
    window.location.href = '/register';
});
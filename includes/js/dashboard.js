//VARIABLES
let createNewListBtn = document.getElementById('create-list');
let createNewListForm = document.getElementById('create-list-form');
let submitNewListBtn = document.getElementById('submit-list');
let newListNameInput = document.getElementById('new-list-name');

//Event Listeners
// Show the create new list form when the button is clicked
createNewListBtn.addEventListener('click', () => {
    createNewListForm.style.display = 'block';
    console.log('Clicked Create New List Button --- it popped out!');
});
// Handle the form submission when the submit button is clicked
submitNewListBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    console.log('Clicked Submit and Created New To Do List');
    console.log(newListNameInput.value);    
    // Handle form submission logic here
    const formData = new FormData(createNewListForm);

    const response = await fetch("/api/create/to-do-list", {
        method: "POST",
        body: formData
    });
    const result = await response.json();
    console.log(result.success);
    console.log(result.message);
    if (result.success) {
        // Redirect to the dashboard after successful list creation
        window.location.href = '/dashboard'; 
    } else {
        // Handle error (e.g., display error message to the user)
        console.error('Error creating new list:', result.message);
    }
});
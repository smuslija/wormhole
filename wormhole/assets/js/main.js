const createUserForm =document.querySelector('#create-user-form');
const createUserEmail =document.querySelector('#create-email');
const createUserPassword =document.querySelector('#create-password');
const createUserFName =document.querySelector('#create-first-name');
const createUserLName =document.querySelector('#create-last-name');
const createUserRole =document.querySelector('#create-role');

const formInputs = [
    createUserEmail,
    createUserPassword,
    createUserFName,
    createUserLName,
    createUserRole,
]

createUserForm.addEventListener('submit', (e) => {      
    let errorMessages = [];
    let emptyInputsMsg = emptyInputs(formInputs);
    if(emptyInputsMsg !== '') errorMessages.push(emptyInputsMsg);
    if(errorMessages.length>0){
        e.preventDefault();
        errorMessages.forEach(msg => {
            alert(msg)
        })
    }
    alert('user added correctly');
}) 

const emptyInputs = (inputs) => {
    let err = '';
    inputs.forEach(input => {
        if(input.value === '' || input.value === null || input.value ===undefined) {
            err += `Fill in ${input.getAttribute('placeholder')}. </br>` 
        }
    });
    return err
}
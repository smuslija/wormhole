/* import FormValidator from "./formValidator"; */



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
const errMessageTemplate = document.querySelector('.error-msg')

for(let i = 0; i<formInputs.length; i++){
    let err = false
    let count = 0
    let prevInput = '';
    if(i>0){
        prevInput = formInputs[i - 1]
    }
    formInputs[i].addEventListener('blur', e=>{
        let inputName = e.target.getAttribute('name')
        let inputValue = e.target.value
        if(inputValue.length < 1){
            e.preventDefault() 
            alert('Must fill in all the fields')
            formInputs[i].style.border = "2px solid red"
        }

        if(inputName === 'create-email'){
            const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if(!inputValue.match(pattern)){
                errMessageTemplate.innerText = 'invalid email'
                errMessageTemplate.classList.remove('hidden')
                 err = true
             }
            if(inputValue.match(pattern)) err = false;
        }
            
        
        if(inputName === 'create-password' && inputValue.length < 6){
            errMessageTemplate.innerText = 'Password must be at least 6 char long'
            errMessageTemplate.classList.remove('hidden')
        }

        if(inputValue.length > 0 && !err){
            formInputs[i].style.border = "none"
        }
    })
}

  createUserForm.addEventListener('submit', (e) => {      
    let errorMessages = []

    let emptyInputsMsg = emptyInputs(formInputs)
    if(emptyInputsMsg.length>0) errorMessages.push(emptyInputsMsg)

    let weakPasswordMsg = weakPassword(createUserPassword.value)
    if(weakPasswordMsg.length>0) errorMessages.push(weakPasswordMsg)

    if(errorMessages.length>0){
        e.preventDefault();
        errorMessages.forEach(msg => {
            errMessageTemplate.innerText = msg
            errMessageTemplate.classList.remove('hidden')
        })
    }

    if(errorMessages.length === 0){
        errMessageTemplate.innerText = 'user added correctly'
        errMessageTemplate.classList.remove('hidden')
    }
    
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

const weakPassword = (password) => {
    
    const minLength = 6;
    let err = ''

    if(password.length < minLength){
        err += 'Password must be at least 6 characters long. '
    }
    return err;
}  
 

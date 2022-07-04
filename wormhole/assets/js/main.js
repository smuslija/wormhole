/* const createUserForm =document.querySelector('#create-user-form');
const createUserEmail =document.querySelector('#create-email');
const createUserPassword =document.querySelector('#create-password');
const createUserFName =document.querySelector('#create-first-name');
const createUserLName =document.querySelector('#create-last-name');
const createUserRole =document.querySelector('#create-role');
const msgContainer = document.querySelector('.msg-container')

const formInputs = [
    createUserEmail,
    createUserPassword,
    createUserFName,
    createUserLName,
    createUserRole,
]


for(let i = 0; i<formInputs.length; i++){
    let err = false
    let count = 0
    let prevInput = '';
    if(i>0){
        prevInput = formInputs[i - 1]
    }
    formInputs[i].addEventListener('blur', e=>{
        
        let input = e.target.id
        var inputName = input.replace(/create/g, "");
        var newInputName = input.replace(/-/g, "");
        let inputValue = e.target.value

        if(inputValue.length < 1){
            e.preventDefault() 
           
            showMessage(e.target, msgContainer,  `Fill in the field ${newInputName}`, true)
        
        }

        if(inputName === 'create-email'){
            const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if(!inputValue.match(pattern)){
                showMessage(e.target, msgContainer,  `Your password is too weak`, true)
                err = true
             }
            if(inputValue.match(pattern)) err = false;
            const weakPasswordMsg = weakPassword(input.value)
            if(weakPassword !== '')showMessage()
        }
            
        
        if(inputName === 'create-password' && inputValue.length < 6){
            showMessage(e.target, msgContainer,  `Your password is too short, must be at least 6 charachters long`, true)
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
    if(weakPasswordMsg.length>0) {
        errorMessages.push(weakPasswordMsg)
        showMessage('', msgContainer, weakPasswordMsg, true)}

    if(errorMessages.length>0){
        e.preventDefault();
        showMessage('', msgContainer, 'Fill all the fields before submitting', true)
    }

    if(errorMessages.length === 0){
        showMessage('', msgContainer, 'User added correctly', false)
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
 
const showMessage = (input, container, msg, error) =>{
    const newElement = document.createElement('div')
    newElement.classList.add('msg')
    if(!error){
        newElement.classList.add('success-msg')
        input.style.border = '2px solid red'
    }
    if(error) newElement.classList.add('error-msg')
    newElement.innerText = msg
    container.appendChild(newElement)
    container.classList.remove('hidden')
    setInterval(() => {
        newElement.classList.add('hidden')
        container.classList.add('hidden')
    }, 5000);
} */

const msgContainer = document.querySelector('.msg-container')

const  createUserForm = document.getElementById('create-user-form')

const  createEmail = document.getElementById('create-email')
const  createPassword = document.getElementById('create-password')
const  createFirstName = document.getElementById('create-first-name')
const  createLastName = document.getElementById('create-last-name')
const  createRole = document.getElementById('create-role')

const userInputsArray = [
    createEmail,
    createPassword,
    createFirstName,
    createLastName,
    createRole
]


createUserForm.addEventListener('submit', e =>{
    let isEmpty
    
    console.log(e.target)
     let res = {
        err: false,
        msg: ''
    }

    userInputsArray.forEach(input =>{
        isEmpty = checkEmptyInput(input)
        if (isEmpty.err) {
            res.err = true
            res.msg = 'Fill in all the fields before submitting the form.'
        }
    })

    if(isEmpty.err){
        e.preventDefault()
        showMessage(res)
    } 
})

userInputsArray.forEach(input => {
   
    input.addEventListener('blur', e =>{
         if(input.id === 'create-password' ){

            let checkPasswordLengthres = checkPasswordLength(input.value)
            if(checkPasswordLengthres.err) {
                showMessage(checkPasswordLengthres)
                input.classList.add('form-input--err')
            }

          /*   let checkPasswordStrengthRes = checkPasswordStrength(input.value)
            if(checkPasswordStrengthRes.err) {
                showMessage(checkPasswordStrengthRes)
                input.classList.add('form-input--err')
            } */
        } 
         if(input.id === 'create-email' ){

            let checkValidEmailRes = checkValidEmail(input)
            if(checkValidEmailRes.err) {
                showMessage(checkValidEmailRes)
                input.classList.add('form-input--err')
            }
        } 
        let emptyInputRes = checkEmptyInput(input)
        if(emptyInputRes.err) {
            showMessage(emptyInputRes)
            input.classList.add('form-input--err')
        }     

    })
})

userInputsArray.forEach(input => {
    input.addEventListener('focus', () => {
        input.classList.remove('form-input--err')
    })
})

const checkEmptyInput = (input) => {
    let res = {}
    if(input.value === ''){
        res = {
            msg: `fill the ${input.id} input`,
            err: true
        }
    }
    return res
}

const checkPasswordLength = (password) => {
    let res = {}
    if(password.length >0 && password.length < 6){
        res = {
            msg: `The passowrd is too short, must be 6 characters minimum.`,
            err: true
        }
    }
    return res
}

const checkPasswordStrength = (password) => {
    let res = {}
    const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(password.length > 6){
        if(!password.match(pattern)){
            res = {
                msg:  `Your password is too weak`, 
                err : true
            }
         }

    }
    return res     
}

const checkValidEmail = (input) => {
    let res = {}
    const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(input.value.length > 1){
        if(!input.value.match(pattern)){
            res = {
                msg:  `Please insert a valid email!`, 
                err : true
            }
         }
    }
    return res     
}

const showMessage = (responseObj) => {
    const msg = document.createElement('li')
    msg.innerText = responseObj.msg
    msg.classList.add('msg')

    if(responseObj.err){
        msg.classList.add('error-msg')
    }else{
        msg.classList.add('success-msg')
    }

    msgContainer.appendChild(msg)
    msgContainer.classList.remove('hidden')

    setInterval(() => {
        msg.remove()
    }, 2000);
}


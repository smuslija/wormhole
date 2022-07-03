export default class FormValidator{

    constructor(formId){
        this.form = document.querySelector(formId)
        this.inputWithErrors = new setInterval()

        this.form.addEventListener('submit', e =>{
            e.preventDefault()

            if(!this.form.hasErrors){
                this.form.submit();
            }
        })
    }

    get hasErrors(){
        return this.inputWithErrors.size > 0
    }

    registerNewform(input, check)
}
let registrationButton = document.querySelector("a[href='#open-modal-reg']");

if (registrationButton !== null) {
    registrationButton.addEventListener('click', () => {
        MicroModal.show('modal-registration');
        MicroModal.init();
    });
}

let submitRegButton = document.querySelector("a[href='#submit-registration']");

let validateEmail = (input) => {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return input.value.match(validRegex) === null;
}

if (submitRegButton !== null) {

    submitRegButton.onclick = () => {
        let registrationForm = document.getElementById("registration-form");
        let inputFields = document.forms["registration-form"].getElementsByTagName("input");
        let error =  document.forms["registration-form"].getElementsByClassName("alert");
        let submit = true;

        if (inputFields[0].value.length == 0 || 
            inputFields[1].value.length == 0 || 
            inputFields[2].value.length == 0 || 
            inputFields[3].value.length == 0) {    
            error[0].classList.remove("hidden");
            submit = false;
        }
        else {
            error[0].classList.add("hidden");
        }
        
        if (inputFields[2].value.length < 8) {
            error[1].classList.remove("hidden");
            submit = false;
        }
        else {
            error[1].classList.add("hidden");
        }

        if (inputFields[2].value !== inputFields[3].value) {
            error[2].classList.remove("hidden");
            submit = false;
        }
        else {
            error[2].classList.add("hidden");
        }

        if (validateEmail(inputFields[1])) {
            error[3].classList.remove("hidden");
            submit = false;
        }
        else {
            error[3].classList.add("hidden");
        }

        if (submit){
            registrationForm.submit();
        }
    }
} 
let loginButton = [...document.querySelectorAll("a[href='#open-modal-log']")];

loginButton.forEach((element) => {
    if (element !== null) {
        element.addEventListener('click', () => {
            MicroModal.show('modal-login');
            MicroModal.init();
        });
    }
});

let submitLoginButton = document.querySelector("a[href='#submit-login']");

if (submitLoginButton !== null){
    submitLoginButton.onclick = () => {
        let loginForm = document.getElementById("login-form");
        let inputFields = document.forms["login-form"].getElementsByTagName("input");
        let error =  document.getElementsByClassName("alert");
        let submit = true;
    
        if (inputFields[0].value.length == 0 || inputFields[1].value.length == 0) {    
            error[0].classList.remove("hidden");
            submit = false;
        }
        else {
            error[0].classList.add("hidden");
        }
    
        if (submit){
            loginForm.submit();
        }
    }
}
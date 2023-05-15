let submitTaskButton = document.querySelector("a[href='#send-task']");

submitTaskButton.onclick = () => {
    let loginForm = document.getElementById("submit-form");
    let inputFields = document.forms["submit-form"].getElementsByTagName("textarea");
    let submit = true;

    if (inputFields[0].value.length < 50) {
        console.log("efdfg");
        alert("Назва завдання повинна бути не менше 50 символів");
        submit = false;
    }

    if (submit){
        loginForm.submit();
    }
}
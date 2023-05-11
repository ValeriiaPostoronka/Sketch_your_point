let loginButton = document.querySelector("a[href='#open-modal']");
console.log(loginButton);
loginButton.addEventListener('click', () => {
    MicroModal.show('modal-registration');
    MicroModal.init();
});
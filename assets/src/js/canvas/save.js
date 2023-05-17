let saveButton = document.querySelector('a[href="#save_button"]');
let taskTitle = document.getElementsByClassName('header__task');

let saveImage = () => {
    let save = confirm('Ти вже готовий зберегти та відправити намальований результат?')

    if (save) {
        let data = canvas[0].toDataURL();

        let request = new XMLHttpRequest();

        request.open('POST', 'http://localhost:8888/templates/blocks/script/save.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('img='+data+'&taskID='+taskTitle[0].innerText.split('.')[0]);
    }
};

saveButton.addEventListener('click', saveImage);
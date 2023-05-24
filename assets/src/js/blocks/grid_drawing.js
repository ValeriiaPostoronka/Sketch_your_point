let teacherConfirmBlock = document.getElementsByClassName('section__list');
let teacherConfirm = teacherConfirmBlock[0] !== undefined ? [...teacherConfirmBlock[0].getElementsByTagName('i')] : null;

let sendConfirmation = (element) => {
    let request = new XMLHttpRequest();
    let splitID = element.id.split('_');

    request.open('POST', 'http://localhost:8888/templates/blocks/script/teacherConfirm.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('taskID=' + splitID[1] + '&user=' + splitID[0] + '&mark=' + splitID[2]);
}

let adminRulesAccept = () => {
    if (teacherConfirm !== null) {
        teacherConfirm.forEach((element) => {
            element.addEventListener('click', () => {
                if (element.classList.contains('fa-circle-check')) {
                    if (confirm('Прибрати підтвердження?')) {
                        element.classList.remove('fa-circle-check');
                        element.classList.add('fa-circle');
                        sendConfirmation(element);
                    }
                }
                else {
                    if (confirm('Підтвердити завдання?')) {
                        element.classList.remove('fa-circle');
                        element.classList.add('fa-circle-check');
                        sendConfirmation(element);
                    }
                }
            });
        });
    }
};

let submitTaskButton = document.querySelector("a[href='#send-task']");
let submitTaskModal = document.querySelector("a[href='#submit-form']");
let sortingSelect = document.getElementsByClassName("tasks__sorting-list");
let searchField = document.getElementsByClassName("tasks__search-field");
let list = document.getElementsByClassName("tasks__list");
let tasks = [...document.getElementsByClassName("tasks__list-item")];
let blockInnerContent = [...document.getElementsByClassName("item__description")];

let printBlocks = (array) => {
    list[0].innerHTML = '';

    array.forEach((item) => {
        list[0].appendChild(item);
    });
}

let noResults = document.createElement('div');
noResults.setAttribute("class", "tasks__list-nothing");
noResults.textContent = 'Немає результатів';

let sortMode = (tasksArray) => {
    if (!tasksArray[0].classList.contains('tasks__list-nothing')) {
        let result = [];
        switch (sortingSelect[0].value) {
            case "time" : return tasksArray;
            case "rating" :
                let ratingNums = new Array();
                let i = 0;

                tasksArray.forEach((element) => {
                    ratingNums.push({arr :  i, val : parseInt(element.getElementsByClassName('item__evaluation-number')[0].innerText)});
                    i++
                });

                ratingNums.sort((a,b) => {
                    return a.val - b.val;
                });

                ratingNums.reverse();
                
                ratingNums.forEach((element) => {
                    result.push(tasksArray[element.arr]);
                });
                
            return result;
            case "my" :
                let myTasks = [];
                
                tasksArray.forEach((element) => {
                    if (element.getElementsByClassName("fa-star").length !== 0) {
                        result.push(element);
                    }
                });

                if (result.length === 0) {
                    result.push(noResults);
                }
            return result;
        }
    } else {
        return tasksArray;
    }
}

let searchBlock = () => {
    let descriptions = new Array();

    let i = 0;

    blockInnerContent.forEach((element) => {
        descriptions.push({arr :  i, val : element.innerText});
        i++;
    });

    let searchFieldValue = searchField[0].value.toLowerCase();
    let filteredData = descriptions.filter((item) => {
        return item.val.toLowerCase().includes(searchFieldValue);
    });

    let result = [];

    if (filteredData.length > 0) {
        filteredData.forEach((item) => {
            result.push(tasks[item.arr]);
        });
    } else {
        result.push(noResults);
    }

    return result;
}

submitTaskButton.onclick = () => {
    let inputFields = document.forms["submit-form"].getElementsByTagName("textarea");
    let submit = true;

    if (inputFields[0].value.length < 20) {
        alert("Назва завдання повинна бути не менше 20 символів");
        submit = false;
    }

    if (submit) {
        MicroModal.show('modal-task');
        MicroModal.init();

        let taskTitle = document.getElementsByClassName('artist-task__text');
        taskTitle[0].value = inputFields[0].value;
    }
}

submitTaskModal.onclick = () => {
    let form = document.forms["task-form"];
    form.submit();
}

tasks.forEach((element) => {
    let buttonUp = element.getElementsByClassName("fa-caret-up");
    let buttonDown = element.getElementsByClassName("fa-caret-down");
    let number = element.getElementsByClassName("item__evaluation-number");
    buttonUp[0].addEventListener('click', () => {
        if (buttonUp[0].classList.contains('active')) {
            buttonUp[0].classList.remove('active');
            let innerNumber = parseInt(number[0].innerText) - 1;
            number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
        }
        else {
            buttonUp[0].classList.add('active');
            let innerNumber = parseInt(number[0].innerText) + 1;
            number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
            if (buttonDown[0].classList.contains('active')) {
                buttonDown[0].classList.remove('active');
                innerNumber = parseInt(number[0].innerText) + 1;
                number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
            }
        }
        
        let request = new XMLHttpRequest();

        request.open('POST', 'http://localhost:8888/templates/blocks/script/taskSetMarkUp.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('taskID=' + element.id);
    });

    buttonDown[0].addEventListener('click', () => {
        if (buttonDown[0].classList.contains('active')) {
            buttonDown[0].classList.remove('active');
            let innerNumber = parseInt(number[0].innerText) + 1;
            number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
        }
        else {
            buttonDown[0].classList.add('active');
            let innerNumber = parseInt(number[0].innerText) - 1;
            number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
            if (buttonUp[0].classList.contains('active')) {
                buttonUp[0].classList.remove('active');
                innerNumber = parseInt(number[0].innerText) - 1;
                number[0].innerText = innerNumber > 0 ? "+" + innerNumber : innerNumber;
            }
        }

        let request = new XMLHttpRequest();

        request.open('POST', 'http://localhost:8888/templates/blocks/script/taskSetMarkDown.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('taskID=' + element.id);
    });
});

sortingSelect[0].onchange = () => {
    let print;
    if (searchField[0].value !== '') {
        print = sortMode(searchBlock());
    }
    else {
        print = sortMode(tasks);
    }

    printBlocks(print);
}

searchField[0].addEventListener('input', () => {
    let print;

    print = sortMode(searchBlock());

    printBlocks(print);
});
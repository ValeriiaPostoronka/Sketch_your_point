/**
 * Changing color script
 */

let colorPicker = document.getElementsByClassName('sidebar__color');

let updateAll = () => {
    ctx.fillStyle = colorPicker[0].value;
    ctx.strokeStyle = colorPicker[0].value;
}

colorPicker[0].value = '#000';
colorPicker[0].addEventListener('change', updateAll, false);
colorPicker[0].select();
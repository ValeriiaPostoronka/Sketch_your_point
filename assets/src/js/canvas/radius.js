/**
 * Changing radius script
 */

const input = document.getElementsByClassName('sidebar__range');

radius = input[0].value;
ctx.lineWidth = radius * 2;

let radChange = () => {
    radius = input[0].value;
    ctx.lineWidth = radius * 2;
}

input[0].addEventListener('input', radChange);
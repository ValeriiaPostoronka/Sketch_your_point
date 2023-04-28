let colorPicker;

colorPicker = document.getElementsByClassName("sidebar__color");
colorPicker[0].value = "#000";
colorPicker[0].addEventListener("change", updateAll, false);
colorPicker[0].select();

function updateAll(event) {
    ctx.fillStyle = event.target.value;
    ctx.strokeStyle = event.target.value;
}
let cleanCanvas = () => {
    canvas[0].width = canvasWidth;
    radChange();
    updateAll();
};

let cleanButton = document.querySelector('a[href="#clean_button"]');

cleanButton.addEventListener('click', cleanCanvas);
let loadImage = (source) => {
    let image = new Image();
    image.src = source;

    image.onload = () => {
        canvasWidth = image.naturalWidth;
        canvasHeight = image.naturalHeight;
        canvas[0].width = canvasWidth;
        canvas[0].height = canvasHeight;
        ctx.drawImage(image, 0, 0);
        radChange();
        updateAll();
    }
};
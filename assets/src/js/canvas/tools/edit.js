const undo = () => {
    console.log("undo");
    if (cStep > 0) {
        cStep--;
        let canvasPic = new Image();
        console.log(cStep);
        canvasPic.src = cPushArray[cStep];
        ctx.globalCompositeOperation="destination-out";
        ctx.fillRect(0,0,canvasWidth,canvasHeight);
        ctx.globalCompositeOperation="source-over";
        canvasPic.onload = () => { ctx.drawImage(canvasPic, 0, 0); }
    }
}

const redo = () => {
    console.log("redo");
    if (cStep < cPushArray.length - 1) {
        cStep++;
        let canvasPic = new Image();
        console.log(cStep);
        canvasPic.src = cPushArray[cStep];
        ctx.globalCompositeOperation="destination-out";
        ctx.fillRect(0,0,canvasWidth,canvasHeight);
        ctx.globalCompositeOperation="source-over";
        canvasPic.onload = () => { ctx.drawImage(canvasPic, 0, 0); }
    }
}

const cPush = () => {
    console.log("cPush");
    cStep++;
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    cPushArray.push(canvas[0].toDataURL());
}
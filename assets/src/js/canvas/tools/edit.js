/**
 * Implementation of the undo/redo function
 */

const cPush = () => {
    cStep++; // counter of the current snapshot
    // if we did undo, return cStep to the last position
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    cPushArray.push(canvas[0].toDataURL()); // push current state of the canvas in the stack
}

const undo = () => {
    if (cStep > 0) { // if it is not first snapshot, we can do undo
        cStep--; // undo index
        let canvasPic = new Image(); // init image variable
        canvasPic.src = cPushArray[cStep]; // get saved snapshot
        ctx.globalCompositeOperation="destination-out"; // clean canvas
        ctx.fillRect(0,0,canvasWidth,canvasHeight);
        ctx.globalCompositeOperation="source-over";
        canvasPic.onload = () => { ctx.drawImage(canvasPic, 0, 0); } // place snapshot
    }
}

const redo = () => {
    if (cStep < cPushArray.length - 1) { // if it is not first snapshot, we can do redo
        cStep++; // redo index
        let canvasPic = new Image(); // init image variable
        canvasPic.src = cPushArray[cStep]; // get saved snapshot
        ctx.globalCompositeOperation="destination-out"; // clean canvas
        ctx.fillRect(0,0,canvasWidth,canvasHeight);
        ctx.globalCompositeOperation="source-over";
        canvasPic.onload = () => { ctx.drawImage(canvasPic, 0, 0); } // place snapshot
    }
}
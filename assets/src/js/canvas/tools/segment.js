/**
 * Implementation of the segment tool
 */

let startSegmentXY;

let drawPoint = (point) => {
    let [x,y] = point;
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI*2);
    ctx.fill();
    ctx.beginPath();
    ctx.moveTo(x, y);
}

const segment = {

    engage() {
        dragging = true;
        startSegmentXY = [mouseX, mouseY];
        drawPoint(startSegmentXY);
        snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
    },

    disengage() {
        if (dragging) {
            dragging = false;
            cPush();
        }
    },

    putPoint() {
        if (dragging) {
            ctx.putImageData(snapshot, 0, 0); 
            drawPoint(startSegmentXY);
            ctx.lineTo(mouseX, mouseY);
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(mouseX, mouseY, radius, 0, Math.PI*2);
            ctx.fill();
            ctx.beginPath();
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseleave', this.disengage);
    }   
}
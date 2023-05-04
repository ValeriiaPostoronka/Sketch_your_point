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

    engage(point) {
        dragging = true;
        startSegmentXY = [point.clientX - rect.left, point.clientY - rect.top];
        drawPoint(startSegmentXY);
        snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
    },

    disengage() {
        dragging = false;
        cPush();
    },

    putPoint(point){
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            drawPoint(startSegmentXY);
            ctx.lineTo(point.clientX - rect.left, point.clientY - rect.top);
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(point.clientX - rect.left, point.clientY - rect.top, radius, 0, Math.PI*2);
            ctx.fill();
            ctx.beginPath();
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mousemove', this.putPoint);
    }   
}
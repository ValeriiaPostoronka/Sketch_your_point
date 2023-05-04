let startCircleXY;

let circleEngage = (point) => {
    dragging = true;
    startCircleXY = [point.clientX - rect.left, point.clientY - rect.top];
    snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
}

let circlePutPoint = (point) => {
    let [x,y] = startCircleXY;
    let r = Math.sqrt(Math.pow((point.clientX - rect.left) - x, 2) + Math.pow((point.clientY - rect.top) - y, 2)) / 2;
    x = (x + (point.clientX - rect.left)) / 2;
    y = (y + (point.clientY - rect.top)) / 2;

    return [x,y,r];
}

const circleRegular = {
    engage(point) {
        circleEngage(point);
    },

    disengage() {
        dragging = false;
        cPush();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,r] = circlePutPoint(point);
            ctx.arc(x, y, r, 0, Math.PI*2);
            ctx.stroke();
            ctx.beginPath();
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mousemove', this.putPoint);
    }
}

const circleSolid = {
    engage(point) {
        circleEngage(point);
    },

    disengage() {
        dragging = false;
        cPush();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,r] = circlePutPoint(point);
            ctx.arc(x, y, r, 0, Math.PI*2);
            ctx.stroke();
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
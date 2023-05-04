let startSquareXY;

let squareEngage = (point) => {
    dragging = true;
    startSquareXY = [point.clientX - rect.left, point.clientY - rect.top];
    snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
}

let squarePutPoint = (point) => {
    let [x,y] = startSquareXY;
    let w = (point.clientX - rect.left) - x;
    let h = (point.clientY - rect.top) - y;
    
    return [x,y,w,h];
}

const squareRegular = {

    engage(point) {
        squareEngage(point);
    },

    disengage(point) {
        dragging = false;
        cPush();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,w,h] = squarePutPoint(point);
            ctx.strokeRect(x,y,w,h);
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
    }
}

const squareSolid = {
    
    engage(point) {
        squareEngage(point);
    },

    disengage(point) {
        dragging = false;
        cPush();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,w,h] = squarePutPoint(point);
            ctx.strokeRect(x,y,w,h);
            ctx.fillRect(x,y,w,h);
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
    }
}
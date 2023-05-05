/**
 * Implementation of the square tool
 */

let startSquareXY;

let squareEngage = () => {
    dragging = true;
    startSquareXY = [mouseX, mouseY];
    snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
}

let squarePutPoint = () => {
    let [x,y] = startSquareXY;
    let w = (mouseX) - x;
    let h = (mouseY) - y;
    
    return [x,y,w,h];
}

let squareDisengage = () => {
    if (dragging) {
        dragging = false;
        cPush();
    }
}

const squareRegular = {

    engage() {
        squareEngage();
    },

    disengage() {
        squareDisengage();
    },

    putPoint() {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,w,h] = squarePutPoint();
            ctx.strokeRect(x,y,w,h);
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mouseleave', this.disengage);
    }
}

const squareSolid = {
    
    engage() {
        squareEngage();
    },

    disengage() {
        squareDisengage();
    },

    putPoint() {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            let [x,y,w,h] = squarePutPoint();
            ctx.strokeRect(x,y,w,h);
            ctx.fillRect(x,y,w,h);
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mouseleave', this.disengage);
    }
}
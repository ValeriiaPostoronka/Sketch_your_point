let startXY;

let squareEngage = (point) => {
    dragging = true;
    startXY = [point.clientX - rect.left, point.clientY - rect.top];
}

let squareDisengage = (point) => {
    dragging = false;
        
    let [x,y] = startXY;
    let w = (point.clientX - rect.left) - x;
    let h = (point.clientY - rect.top) - y;
    
    return [x,y,w,h];
}

const squareRegular = {

    engage(point) {
        squareEngage(point);
    },

    disengage(point) {
        let [x,y,w,h] = squareDisengage(point);
        ctx.strokeRect(x,y,w,h);

        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
    }
}

const squareSolid = {
    
    engage(point) {
        squareEngage(point);
    },

    disengage(point) {
        let [x,y,w,h] = squareDisengage(point);
        ctx.strokeRect(x,y,w,h);
        ctx.fillRect(x,y,w,h);
        
        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
    }
}
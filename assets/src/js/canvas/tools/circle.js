let startCircleXY;

let circleEngage = (point) => {
    dragging = true;
    startCircleXY = [point.clientX - rect.left, point.clientY - rect.top];
    snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
}

let circlePutPoint = (point) => {
    let [x,y] = startCircleXY;
    let scaleX = 1*(((point.clientX - rect.left)-x)/2);
    let scaleY = 1*(((point.clientY - rect.top)-y)/2);
    x = (x/scaleX)+1;
    y = (y/scaleY)+1;

    return [x,y,scaleX,scaleY];
}

let circleDisengage = () => {
    if (dragging){
        dragging = false;
        cPush();
    }
}

const circleRegular = {
    engage(point) {
        circleEngage(point);
    },

    disengage() {
        circleDisengage();
    },

    leave() {
        circleDisengage();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            ctx.save();
            ctx.beginPath();
            let [x,y,sx,sy] = circlePutPoint(point);
            ctx.scale(sx,sy);
            ctx.arc(x, y, 1, 0, Math.PI*2);
            ctx.restore();
            ctx.stroke();
            ctx.beginPath();
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseleave', this.leave);
    }
}

const circleSolid = {
    engage(point) {
        circleEngage(point);
    },

    disengage() {
        circleDisengage();
    },

    leave() {
        circleDisengage();
    },

    putPoint(point) {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            ctx.save();
            ctx.beginPath();
            let [x,y,sx,sy] = circlePutPoint(point);
            ctx.scale(sx,sy);
            ctx.arc(x, y, 1, 0, Math.PI*2);
            ctx.restore();
            ctx.stroke();
            ctx.fill();
            ctx.beginPath();
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseleave', this.leave);
    }
}
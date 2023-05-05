/**
 * Implementation of the circle tool
 */

let startCircleXY;

let circleEngage = () => {
    dragging = true;
    startCircleXY = [mouseX, mouseY];
    snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
}

let circlePutPoint = () => {
    let [x,y] = startCircleXY;
    let scaleX = 1*((mouseX-x)/2);
    let scaleY = 1*((mouseY-y)/2);
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
    engage() {
        circleEngage();
    },

    disengage() {
        circleDisengage();
    },

    putPoint() {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            ctx.save();
            ctx.beginPath();
            let [x,y,sx,sy] = circlePutPoint();
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
        canvas[0].addEventListener('mouseleave', this.disengage);
    }
}

const circleSolid = {
    engage() {
        circleEngage();
    },

    disengage() {
        circleDisengage();
    },

    putPoint() {
        if (dragging){
            ctx.putImageData(snapshot, 0, 0); 
            ctx.save();
            ctx.beginPath();
            let [x,y,sx,sy] = circlePutPoint();
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
        canvas[0].addEventListener('mouseleave', this.disengage);
    }
}
/**
 * @radius - radius of drawing line
 * @dragging - variable for checking the mouse state
 */

let radius = 10;
let dragging = false;

const canvasWidth = 1166; // viewBox width
const canvasHeight = 517; // viewBox height

const { ctx } = VBCanvas.createCanvas({
    viewBox: [0, 0, canvasWidth, canvasHeight], // viewBox (x, y, width, height)
    target: '.canvas', // where to mount the <canvas> element
});

let canvas = document.getElementsByTagName('canvas');

ctx.lineWidth = radius*2; //  diameter for lineWidth
ctx.beginPath();

/**
 * putPoint - main drawing function for line
 * @param {MouseEvent} point - mouse handler for mouse coordinates 
 */

let putPoint = function(point){
    if(dragging) {
        let rect = canvas[0].getBoundingClientRect();
        ctx.lineTo(point.clientX - rect.left, point.clientY - rect.top);
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(point.clientX - rect.left, point.clientY - rect.top, radius, 0, Math.PI*2);
        ctx.fill();
        ctx.beginPath();
        ctx.moveTo(point.clientX - rect.left, point.clientY - rect.top);
    }
}

/**
 * engage - click event function. Draw first circle and start dragging
 * @param {MouseEvent} point - mouse handler for mouse coordinates 
 */

let engage = function(point){
    dragging = true;
    putPoint(point);
}

// disengage - undragging event function. Stop dragging and end last drawing

let disengage = function(){
    dragging = false;
    ctx.beginPath();
}

// EventListeners

canvas[0].addEventListener('mousedown', engage);
canvas[0].addEventListener('mousemove', putPoint);
canvas[0].addEventListener('mouseup', disengage);
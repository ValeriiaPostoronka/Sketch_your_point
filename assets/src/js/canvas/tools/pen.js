 /**
     * putPoint - main drawing function for line
     * @param {MouseEvent} point - mouse handler for mouse coordinates 
     */

 let putPoint = (point) => {
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

let engage = (point) => {
    dragging = true;
    putPoint(point);
}

// disengage - undragging event function. Stop dragging and end last drawing

let disengage = () => {
    dragging = false;
    ctx.beginPath();
}

const pen = () => {
    // EventListeners

    canvas[0].addEventListener('mousedown', engage);
    canvas[0].addEventListener('mousemove', putPoint);
    canvas[0].addEventListener('mouseup', disengage);
}

const lineRemover = () => {
    canvas[0].removeEventListener('mousedown', engage);
    canvas[0].removeEventListener('mousemove', putPoint);
    canvas[0].removeEventListener('mouseup', disengage);
}
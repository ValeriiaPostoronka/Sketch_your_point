 /**
     * putPoint - main drawing function for line
     * @param {MouseEvent} point - mouse handler for mouse coordinates 
     */

 const eraser = {

    engage(point) {
        dragging = true;
        penDo.putPoint(point);
    },

// disengage - undragging event function. Stop dragging and end last drawing

    disengage() {
        dragging = false;
        ctx.beginPath();
    },

    putPoint(point) {
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
    },

    click() {

    },

/**
 * engage - click event function. Draw first circle and start dragging
 * @param {MouseEvent} point - mouse handler for mouse coordinates 
 */

    addEvent() {
        canvas[0].addEventListener('mousedown', eraser.engage);
        canvas[0].addEventListener('mousemove', eraser.putPoint);
        canvas[0].addEventListener('mouseup', eraser.disengage);
    }
};
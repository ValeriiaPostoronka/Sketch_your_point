const segment = {
    
    engage(point) {
        dragging = true;
        let rect = canvas[0].getBoundingClientRect();
        ctx.beginPath();
        ctx.arc(point.clientX - rect.left, point.clientY - rect.top, radius, 0, Math.PI*2);
        ctx.fill();
        ctx.beginPath();
        ctx.moveTo(point.clientX - rect.left, point.clientY - rect.top);
    },

    disengage(point) {
        dragging = false;
        let rect = canvas[0].getBoundingClientRect();
        ctx.lineTo(point.clientX - rect.left, point.clientY - rect.top);
        ctx.beginPath();
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', engage);
        canvas[0].addEventListener('mouseup', disengage);
    }   
}
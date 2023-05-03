const segment = {

    engage(point) {
        dragging = true;
        
        ctx.beginPath();
        ctx.arc(point.clientX - rect.left, point.clientY - rect.top, radius, 0, Math.PI*2);
        ctx.fill();
        ctx.beginPath();
        ctx.moveTo(point.clientX - rect.left, point.clientY - rect.top);
    },

    disengage(point) {
        dragging = false;
        
        ctx.lineTo(point.clientX - rect.left, point.clientY - rect.top);
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(point.clientX - rect.left, point.clientY - rect.top, radius, 0, Math.PI*2);
        ctx.fill();
        ctx.beginPath();
        
        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mouseup', this.disengage);
    }   
}
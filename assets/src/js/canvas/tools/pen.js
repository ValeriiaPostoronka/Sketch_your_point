const pen = {

    engage(point) {
        dragging = true;
        pen.putPoint(point);
    },

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

    addEvent() {
        canvas[0].addEventListener('mousedown', pen.engage);
        canvas[0].addEventListener('mousemove', pen.putPoint);
        canvas[0].addEventListener('mouseup', pen.disengage);
    }
};
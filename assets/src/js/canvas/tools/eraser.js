 const eraser = {

    engage(point) {
        dragging = true;
        eraser.putPoint(point);
        ctx.globalCompositeOperation="destination-out";
    },

    disengage() {
        dragging = false;
        ctx.beginPath();
        ctx.globalCompositeOperation="source-over";
        
        cPush();
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
        canvas[0].addEventListener('mousedown', eraser.engage);
        canvas[0].addEventListener('mousemove', eraser.putPoint);
        canvas[0].addEventListener('mouseup', eraser.disengage);
    }
};
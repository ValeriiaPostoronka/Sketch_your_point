 const eraser = {

    engage(point) {
        dragging = true;
        ctx.globalCompositeOperation="destination-out";
        eraser.putPoint(point);
    },

    disengage() {
        if (dragging) {
            dragging = false;
            ctx.beginPath();
            ctx.globalCompositeOperation="source-over";
            
            cPush();
        }
    },

    leave() {
        if (dragging) {
            dragging = false;
            ctx.beginPath();
            ctx.globalCompositeOperation="source-over";
            
            cPush();
        }
    },

    putPoint(point) {
        if(dragging) {
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
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mouseleave', this.leave);
    }
};
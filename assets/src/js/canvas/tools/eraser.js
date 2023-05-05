/**
 * Implementation of the eraser tool
 */ 
 
 const eraser = {

    engage() {
        dragging = true;
        ctx.globalCompositeOperation="destination-out";
        eraser.putPoint();
    },

    disengage() {
        if (dragging) {
            dragging = false;
            ctx.beginPath();
            ctx.globalCompositeOperation="source-over";
            
            cPush();
        }
    },

    putPoint() {
        if(dragging) {
            ctx.lineTo(mouseX, mouseY);
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(mouseX, mouseY, radius, 0, Math.PI*2);
            ctx.fill();
            ctx.beginPath();
            ctx.moveTo(mouseX, mouseY);
        }
    },

    addEvent() {
        canvas[0].addEventListener('mousedown', this.engage);
        canvas[0].addEventListener('mousemove', this.putPoint);
        canvas[0].addEventListener('mouseup', this.disengage);
        canvas[0].addEventListener('mouseleave', this.disengage);
    }
};
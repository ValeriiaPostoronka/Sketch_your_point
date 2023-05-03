const fill = {
    
    click(event) {
        
        const x = event.clientX  - rect.left;
        const y = event.clientY - rect.top;
    
        floodFill.fill(x, y, 0, ctx);
        
        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('click', this.click);
    }
};
const fill = {
    
    click(event) {
        
        const x = event.clientX  - rect.left;
        const y = event.clientY - rect.top;
    
        floodFill.fill(x, y, 100, ctx, 1);
        
        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('click', this.click);
    }
};
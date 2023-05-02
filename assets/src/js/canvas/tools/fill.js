const fill = {
    
    click(event) {
        let rect = canvas[0].getBoundingClientRect();
        const x = event.clientX  - rect.left;
        const y = event.clientY - rect.top;
    
        floodFill.fill(x, y, 0, ctx);
    },

    addEvent() {
        canvas[0].addEventListener('click', fill.click);
    }
};
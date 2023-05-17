/**
 * Implementation of the fill tool
 */

const fill = {
    
    click() {    
        floodFill.fill(mouseX, mouseY, 50, ctx, 1);

        cPush();
    },

    addEvent() {
        canvas[0].addEventListener('click', this.click);
    }
};
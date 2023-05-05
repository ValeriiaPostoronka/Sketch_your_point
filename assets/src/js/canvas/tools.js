/**
 * Define tools. Managing their general behavior
 * 
 * Describe tool
 * tool {
 *      engage - what to do when user clicks
 *      putPoint - what to do when user drags 
 *      disengage - what to do when user stop dragging and leaves canvas.
 *                  ALWAYS Place cPush() in the end for undo/redo 
 *      click - what to do when user clicks. Event currently used in the fill tool
 *      addEvent - initialize tool by events
 * }
 */

// Array of drawing tools
const toolsArray = [
    pen, eraser,
    squareRegular, circleRegular,
    squareSolid, circleSolid,
    segment, fill
];

// set default "pen" tool 
let activeTool = toolsArray[0];
activeTool.addEvent();

// get tools DOM elements and transform them to the array 
toolsDOMelementsCollection = document.getElementsByClassName('fa-xl'); // fa-xl - class from icons. It is used for getting DOM elements
let toolsDOMelements =  [...toolsDOMelementsCollection];

// pop last two DOM elements for separate undo and redo behavior 
toolsDOMelements.pop().addEventListener('click', redo);
toolsDOMelements.pop().addEventListener('click', undo);

// set eventListeners for all tools
toolsDOMelements.forEach((element) => {
    element.addEventListener('click', () => {
        eraseActive();
        eventListenerRemover();
        activeTool = toolsArray[toolsDOMelements.indexOf(element)];
        element.classList.add('active');
        activeTool.addEvent();
    });
});

// active css class remover
let eraseActive = () => {
    toolsDOMelements.forEach((element) => {
        element.classList.remove('active');
    });
}

// active tool eventListeners remover
let eventListenerRemover = () => {
    canvas[0].removeEventListener('mousedown', activeTool.engage);
    canvas[0].removeEventListener('mousemove', activeTool.putPoint);
    canvas[0].removeEventListener('mouseup', activeTool.disengage);
    canvas[0].removeEventListener('click', activeTool.click);
    canvas[0].removeEventListener('mouseleave', activeTool.disengage);
}

// pushing initial snapshot
cPush();
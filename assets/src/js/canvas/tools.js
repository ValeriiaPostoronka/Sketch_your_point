class tool { // fa-xl - class from icons. It is used for getting DOM elements
    constructor(name, func) {
        this.name = name;
        this.func = func;
    }
}

const toolsArray = [
    new tool('pen', pen),
    new tool('eraser', eraser),
    new tool('squareRegular', squareRegular),
    new tool('circleRegular', circleRegular),
    new tool('squareSolid', squareSolid),
    new tool('circleSolid', circleSolid),
    new tool('segment', segment),
    new tool('fill', fill),
    new tool('undo', undo),
    new tool('redo', redo)
];

let activeTool = toolsArray[0];
activeTool.func.addEvent();

toolsDOMelements = document.getElementsByClassName('fa-xl');

[...toolsDOMelements].forEach((element) => {
    element.addEventListener('click', () => {
        eraseActive();
        eventListenerRemover();
        activeTool = toolsArray[[...toolsDOMelements].indexOf(element)];
        element.classList.add('active');
        activeTool.func.addEvent();
    });
});

let eraseActive = () => {
    [...toolsDOMelements].forEach((element) => {
        element.classList.remove('active');
    });
}

let eventListenerRemover = () => {
    canvas[0].removeEventListener('mousedown', activeTool.func.engage);
    canvas[0].removeEventListener('mousemove', activeTool.func.putPoint);
    canvas[0].removeEventListener('mouseup', activeTool.func.disengage);
    canvas[0].removeEventListener('click', activeTool.func.click);
}
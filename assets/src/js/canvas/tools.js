/**
 * fa-xl - class from icons. It is used for getting DOM elements
 */
class tool {
    constructor(name, func, remover) {
        this.name = name;
        this.func = func;
        this.remover = remover;
    }
}

const toolsArray = [
    new tool('pen', pen, lineRemover),
    new tool('eraser', eraser, lineRemover),
    new tool('squareRegular', squareRegular, squareRemover),
    new tool('circleRegular', circleRegular, circleRemover),
    new tool('squareSolid', squareSolid, squareRemover),
    new tool('circleSolid', circleSolid, circleRemover),
    new tool('segment', segment, lineRemover),
    new tool('fill', fill, fillRemover),
    new tool('undo', undo),
    new tool('redo', redo)
];

let activeTool = toolsArray[0];
activeTool.func();

toolsDOMelements = document.getElementsByClassName('fa-xl');

let index = 0;

[...toolsDOMelements].forEach((element) => {
    element.addEventListener('click', () => {
        eraseActive();
        activeTool.remover();
        activeTool = toolsArray[[...toolsDOMelements].indexOf(element)];
        element.classList.add('active');
        activeTool.func();
    });
});

let eraseActive = function() {
    [...toolsDOMelements].forEach((element) => {
        element.classList.remove('active');
    });
}

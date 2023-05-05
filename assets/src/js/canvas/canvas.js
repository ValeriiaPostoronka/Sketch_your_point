/**
 * Main js file. Declaring global variables and setting necessary functions before 
 * initialization other scripts
 */

let radius = 10; // radius of drawing line
let dragging = false; // variable for checking the mouse state

let canvasBox = document.getElementsByClassName('canvas'); // canvas container element

let canvasWidth = canvasBox[0].offsetWidth; // viewBox width
let canvasHeight = canvasBox[0].offsetHeight; // viewBox height

let canvas = document.getElementsByTagName('canvas'); // canvas element tag
canvas[0].width = canvasWidth; // setting size of the canvas
canvas[0].height = canvasHeight;
const ctx = canvas[0].getContext('2d'); // create context of the canvas tag
let rect = canvas[0].getBoundingClientRect(); // get position of the canvas block

ctx.imageSmoothingEnabled = false; // remove smoothing of drawing elements

let cPushArray = new Array(); // array of snapshots for undo redo
let cStep = -1; // variable index of current snapshot
let snapshot; // snapshot variable for the dynamic shapes display

let mouseX, mouseY; // coordinates x and y for mouse

// calculation x y coordinates depends on canvas position and scrollbar position
canvas[0].addEventListener('mousemove', (point) => {
    mouseX = point.clientX - rect.left + canvasBox[0].scrollLeft;
    mouseY = point.clientY - rect.top + canvasBox[0].scrollTop;
});

ctx.lineWidth = radius*2; // diameter for lineWidth

// Resize window check
window.onresize = () => { 
    if ((canvasWidth < canvasBox[0].offsetWidth) || (canvasHeight < canvasBox[0].offsetHeight)) {
        snapshot = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
        ctx.save();
        canvasWidth = canvasBox[0].offsetWidth;
        canvasHeight = canvasBox[0].offsetHeight;
        canvas[0].width = canvasWidth;
        canvas[0].height = canvasHeight;
        radChange();
        updateAll();
        ctx.putImageData(snapshot, 0, 0); 
        ctx.restore();
    }
}
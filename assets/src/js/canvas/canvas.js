/**
 * @radius - radius of drawing line
 * @dragging - variable for checking the mouse state
 */

let radius = 10;
let dragging = false;

let canvasBox = document.getElementsByClassName('canvas');

const canvasWidth = canvasBox[0].offsetWidth; // viewBox width
const canvasHeight = canvasBox[0].offsetHeight; // viewBox height

const { ctx } = VBCanvas.createCanvas({
    viewBox: [0, 0, canvasWidth, canvasHeight], // viewBox (x, y, width, height)
    target: '.canvas', // where to mount the <canvas> element
});

ctx.imageSmoothingEnabled = false;

let canvas = document.getElementsByTagName('canvas');
let rect = canvas[0].getBoundingClientRect();

let cPushArray = new Array();
let cStep = -1;

ctx.lineWidth = radius*2; // diameter for lineWidth
ctx.beginPath();
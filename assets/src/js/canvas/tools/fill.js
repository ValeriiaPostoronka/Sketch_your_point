let eventFill = (event) => {
    let rect = canvas[0].getBoundingClientRect();
    const x = event.clientX  - rect.left;
    const y = event.clientY - rect.top;
    debugger;

    floodFill.fill(x, y, 0, ctx);
}

let asyncListener = (e) => {
    const resolve = resolveFns.shift();
    resolve();
}

const fill = () => {
    canvas[0].addEventListener('click', eventFill);
    window.addEventListener('message', asyncListener);
}

const fillRemover = () => {
    canvas[0].removeEventListener('click', eventFill);
    window.removeEventListener('message', asyncListener);
}
const terminal = document.querySelector('.terminal');
const terminal_template = document.querySelector('.terminal-template');
const terminal_command_block = document.querySelector('.terminal-command-block');

let dragging = false;
let offsetX, offsetY;


const events = {

    mouse: {
        event1: 'mousedown',
        event2: 'mousemove',
        event3: 'mouseup'
    },

    touch: {
        event1: 'touchstart',
        event2: 'touchmove',
        event3: 'touchend'
    }
}

terminal_template.addEventListener(events.mouse.event1, (event) => {
    dragging = true;
    offsetX = event.clientX - terminal.getBoundingClientRect().left;
    offsetY = event.clientY - terminal.getBoundingClientRect().top;

    event.preventDefault();
});

document.addEventListener(events.mouse.event2, (event) => {
    if (!dragging) return;

    let x = event.clientX - offsetX;
    let y = event.clientY - offsetY;
    
    terminal.style.top = y + 'px';
    terminal.style.left = x + 'px';
});

document.addEventListener(events.mouse.event3, () => {
    dragging = false;
});

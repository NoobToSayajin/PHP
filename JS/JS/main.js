let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
let interval = setInterval(run, 1/60);

let img;
let spr;
let sprLst = [];
let lvlSound;

document.addEventListener("keydown", keyDown, false);
document.addEventListener("keyup", keyUp, false);

let kbcode = {left:37, up:38, right:39, left:40};

init()
function run()
{
    update();
    ctx.clearRect(0,0,canvas.width, canvas.height);
    draw();
}

function init()
{
    Math.ceil()
    //alert("init")
    console.log("Init");
    img = new Image();
    img.src = "../images/ship.png";
    img.onload = imgLoader;

    lvlSound = new Sound("../sounds/level_complete.wav");
    //lvlSound.play();

    for (let i = 0; i < 10; i++) {
        const spr = new Sprite(img, 0, i*70);
        sprLst.push(spr);
    }
}

function update()
{
    sprLst.forEach(e => {
        e.update();
    })
}

function draw()
{
    sprLst.forEach(e => {
        e.draw(ctx);
    });
}

function keyDown(e)
{
    console.log(e.code)
}

function keyUp(e)
{
}
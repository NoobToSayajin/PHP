let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
let interval

function run()
{
    update();
    ctx.clearRect(0,0,canvas.width, canvas.height);
    draw(ctx);
}

function init()
{
    interval = setInterval(run, 1/60);
    load();
    // alert("init")
    // console.log("Init");
    // img = new Image();
    // img.src = "../images/ship.png";
    // img.onload = imgLoader;

    //lvlSound = new Sound("../sounds/level_complete.wav");
    //lvlSound.play();
}

init()

let scnMenu = new SceneMenu();
let scnPlay = new ScenePlay();
let scnCourrante = scnMenu;

function mouseDown(e)
{
    console.log("mouseDown");
    let x = e.clientX - canvas.offsetLeft;
    let y = e.clientY - canvas.offsetTop;
    clickDown(x, y);
}

function mouseUp(e)
{
    console.log("mouseUp");
    let x = e.clientX - canvas.offsetLeft;
    let y = e.clientY - canvas.offsetTop;
    clickUp(x, y);
}

function touchStart(e)
{
    console.log("touchStart");
    let x = e.targetTouches[0].clientX;
    let y = e.targetTouches[0].clientY;
    clickDown(x, y);
}

function touchEnd(e)
{
    console.log("touchEnd");
}

function clickDown(pX, pY)
{
    console.log("click à: ", pX, pY);
    scnCourrante.click(pX, pY);
}

function clickUp(pX, pY)
{
    console.log("unclick à: ", pX, pY);
}

function load()
{
    canvas.onmousedown = mouseDown;
    canvas.onmouseup = mouseUp;

    document.addEventListener("touchStart", touchStart, false);
    document.addEventListener("touchEnd", touchEnd, false);
}

function update()
{
    scnCourrante.update();
}

function draw(pCtx)
{
    scnCourrante.draw(pCtx)
}
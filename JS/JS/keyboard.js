document.addEventListener("keydown", keyDown, false);
document.addEventListener("keyup", keyUp, false);

let kbcode = {left:37, up:38, right:39, down:40};

function keyDown(e)
{
    console.log(e.keyCode)
    // if(e.code==="KeyA")
    // {
    //     sprLst[0].x--;
    // }
    if(e.keyCode==kbcode.left)
    {
        sprLst[0].x--;
    }
    e.preventDefault();
}

function keyUp(e)
{
}
class Sprite
{
    /**
     * 
     * @param {int} pX 
     * @param {int} pY 
     * @param {string} pImg
     * @returns {Sprite}
     */
    constructor(pImg, pX = 0, pY = 0)
    {
        this.x = pX;
        this.y = pY;
        this.img = new Image();
        this.img.src = pImg;
        this.img.onload = imgLoader;
        console.log("new Sprite");
    }

    update()
    {
        
    }
    
    draw(pCtx)
    {
        pCtx.drawImage(this.img, this.x, this.y);
    }

    toString()
    {
        return this;
    }
}
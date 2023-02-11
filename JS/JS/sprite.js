class Sprite
{
    /**
     * 
     * @param {int} pX 
     * @param {int} pY 
     * @param {Image} pImg
     * @returns {Sprite}
     */
    constructor(pImg, pX, pY)
    {
        this.x = pX;
        this.y = pY;
        this.img = pImg;
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
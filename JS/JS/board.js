class Board
{
    constructor(pX = 0, pY = 0)
    {
        this.x = pX;
        this.y = pY;
        this.tileSize = 100;

        this.imgCross = new Sprite("../images/croix.png");
        this.imgCircle = new Sprite("../images/rond.png");
        this.sndError = new Sound("../sounds/erreur.wav");
        this.joueur = 1;
        this.grid = [
            [0,0,0],
            [0,0,0],
            [0,0,0]
        ];

        this.reset();
    }

    reset()
    {
        for (let l=0; l<3; l++)
        {
            for(let c = 0; c<3; c++)
            {
                this.grid[l][c] = 0;
            }
            
        }
    }

    isFull()
    {
        for (let l=0; l<3; l++)
        {
            for(let c = 0; c<3; c++)
            {
                if(this.grid[l][c] === 0)
                {
                    return false;
                }
            }
            
        }
        return true;
    }
    
    click(pX, pY)
    {
        let c = Math.floor((pX-this.x)/this.tileSize);
        console.log("Colonne: ",c);
        let l = Math.floor((pY-this.y)/this.tileSize);
        console.log("Ligne: ",l);
        if(c<this.grid.length && l<this.grid.length && this.grid[l][c]===0)
        {
            this.grid[l][c] = this.joueur;
            if(this.joueur===1)
            {
                this.joueur = 2;
            }
            else
            {
                this.joueur = 1;
            }
        }
        else
        {
            this.sndError.play();
        }

    }

    draw(pCtx)
    {
        const LONG = this.tileSize*3;
        pCtx.strokeStyle = "gray";
        pCtx.lineCap = "round";
        pCtx.lineJoin = "round";
        pCtx.lineWidth = 10;
        
        pCtx.beginPath();
        pCtx.moveTo(this.x, this.y);
        pCtx.lineTo(this.x + LONG, this.y);
        pCtx.lineTo(this.x + LONG, this.y + LONG);
        pCtx.lineTo(this.x, this.y + LONG);
        pCtx.lineTo(this.x, this.y);

        pCtx.moveTo(this.x + this.tileSize, this.y);
        pCtx.lineTo(this.x + this.tileSize, this.y + LONG);
        pCtx.moveTo(this.x + this.tileSize*2, this.y);
        pCtx.lineTo(this.x + this.tileSize*2, this.y + LONG);

        pCtx.moveTo(this.x, this.y + this.tileSize);
        pCtx.lineTo(this.x + LONG, this.y + this.tileSize);
        pCtx.moveTo(this.x, this.y + this.tileSize*2);
        pCtx.lineTo(this.x + LONG, this.y + this.tileSize*2);
        
        pCtx.stroke();

        for(let l=0; l<this.grid.length; l++)
        {
            for(let c=0; c<this.grid.length; c++)
            {
                let v = this.grid[l][c];
                let img;
                if(v===1)
                {
                    img = this.imgCross;
                }
                else if(v===2)
                {
                    img = this.imgCircle;
                }
                if(img!=undefined)
                {
                    img.x = this.x+c*this.tileSize;
                    img.y = this.y+l*this.tileSize;
                    img.draw(pCtx);
                }
            }
        }

        pCtx.font = "40px Arial";
        pCtx.fillText("Au tour du joueur: " + this.joueur, 10,50);
    }

    toString()
    {
        return this;
    }
}
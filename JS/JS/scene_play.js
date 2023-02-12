class ScenePlay
{
    constructor()
    {
        this.TicTacToe = new Board(100,100);
    }

    click(pX, pY)
    {
        this.TicTacToe.click(pX, pY);
    }
    
    update()
    {
        if(this.TicTacToe.isFull)
        {
            this.TicTacToe.reset();
        }
    }

    draw(pCtx)
    {
        this.TicTacToe.draw(pCtx);
    }
}
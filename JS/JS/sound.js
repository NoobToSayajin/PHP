class Sound
{
    constructor(pSrc)
    {
        this.audio = document.createElement("audio");
        this.audio.src = pSrc;
        this.audio.setAttribute("preload", "auto")
        this.audio.setAttribute("controls", "none")
        this.audio.style.display = "none";
        this.audio.loop = false;
        document.body.appendChild(this.audio);
    }

    play()
    {
        this.audio.currentTime = 0;
        this.audio.pause();
        this.audio.play();
    }

    setLoop(pBool)
    {
        this.audio.loop = pBool;
    }
}
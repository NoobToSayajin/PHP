let rndNum = Math.floor(Math.random()*100);
      
let guesses = document.querySelector('.guesses');
let lastResult = document.querySelector('.lastResult');
let lowOrHi = document.querySelector('.lowOrHi');

let guessSubmit = document.querySelector('.guessSubmit');
let guessField = document.querySelector('.guessField');

let guessCount = 1;
let resetButton;

  function checkGuess()
  {
    let userGuess = Number(guessField.vaue);
    if(guessCount===1)
    {
      guesses.textContent = "Proposition précédent&nbsp;: ";
    }
    guesses.textContent += userGuess + ' ';

    if(userGuess===rndNum)
    {
      lastResult.textContent = "Bravo vous avez trouvé le nombre !";
      lastResult.style.backgroundColor = "green";
      lowOrHi.textContent = '';
      setGameOver();
    }
    else if(guessCount===10)
    {
      lastResult.textContent = "!!! Perdu !!!"
      setGameOver();
    }
    else
    {
      lastResult.textContent = "Faux !";
      lastResult.style.backgroundColor = "red";
      if(userGuess<rndNum)
      {
        lowOrHi.textContent = "Le nombre est trop petit !";
      }
      else if(rndNum<userGuess)
      {
        lowOrHi.textContent = "Le nombre est trop grand !";
      }
    }

    
    guessCount++;
    guessField.value = '';
    guessField.focus();
}
guessSubmit.addEventListener("click", console.log("click"))
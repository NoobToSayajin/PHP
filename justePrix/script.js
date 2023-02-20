let rndNum = Math.floor(Math.random() * 100);
console.log(rndNum);

let guesses = document.querySelector('.guesses');
let lastResult = document.querySelector('.lastResult');
let lowOrHi = document.querySelector('.lowOrHi');

let guessSubmit = document.querySelector('.guessSubmit');
let guessField = document.querySelector('.guessField');

let guessCount = 1;
let resetButton;

//j'ajoute mona ction de verification de la saisie avec le prix mystere
guessSubmit.addEventListener('click', function () {
    //Action qui va etre executer sur le click
    // console.log(guessField);
    // console.log(guessField.value);
    guesses.textContent = guessField.value
    if (guessField.value === rndNum) {
        //le bon prix est trouvé
        lastResult.textContent = "correct"
        lowOrHi.textContent = "vous avez gagné"
    } else {
        //le prix n'est pas bon, plus grand ou plus petit?
        if (guessField.value > rndNum) {
            lastResult.textContent = "incorrect"        
            lowOrHi.textContent = "plus petit"
            // lastResult.innerHTML = "<hr>incorrect"        
            // lowOrHi.textContent = "<hr>plus petit"
        } else {
            lastResult.innerHTML = "incorrect"
            lowOrHi.textContent = "plus grand"
        }
    }
})
let maindiv = document.getElementById("maindiv");
let mdpl = "polski";
let mdeng = "english";
let language = "pl-PL";
maindiv.addEventListener("click", (e) => {
  if (maindiv.textContent == mdpl) {
    maindiv.textContent = mdeng;
    language = "en-EN";
  } else {
    maindiv.textContent = mdpl;
    language = "pl-PL";
  }
});

// TODO: animacja maindiv 180 stopni po osi X
// function rotate(){
//     maindiv.style.transformX = 'rotate(180deg)';
// }

// TODO: Odczytaj tekst na mowę 1/2

const synth = window.speechSynthesis;
const textArea = document.getElementById("text-to-read");
const readButton = document.getElementById("volume");

readButton.addEventListener("click", () => {
  speak(maindiv.textContent, language);
});

// Utwórz nowy obiekt syntezatora mowy

// Odczytaj tekst na mowę
function speak(text, language) {
  // Zatrzymaj poprzednie odtwarzanie
  synth.cancel();

  // Utwórz nowy obiekt wiadomości do odtworzenia
  const utterance = new SpeechSynthesisUtterance(text);

  // Wybierz język
  utterance.lang = language; // po kliknięciu w przycisk z polską flagą w okrągłym tle zmienia się na "pl-PL"

  // Ustaw prędkość mówienia
  utterance.rate = 1.0;

  // Dodaj funkcję obsługi zdarzenia zakończenia odtwarzania
  utterance.onend = () => {
    console.log("Odtwarzanie zakończone.");
  };

  // Odtwórz wiadomość
  synth.speak(utterance);
}

// Przykładowy tekst do odczytania
const text = "To jest tekst, który chcę przeczytać na głos.";

// Odczytaj tekst na mowę

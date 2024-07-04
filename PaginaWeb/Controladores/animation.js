
// Selecciona los elementos que quieres animar
var parte1 = document.querySelector('.parte1');
var parte2 = document.querySelector('.parte2');

// Define una función para iniciar la animación
function iniciarAnimacion() {
    parte1.style.animation = 'flicker1 1.5s infinite alternate';
    parte2.style.animation = 'flicker2 1.5s infinite alternate';
}

// Define una función para detener la animación
function detenerAnimacion() {
    parte1.style.animation = '';
    parte2.style.animation = '';
}

// Función para generar un retardo aleatorio
function retardoAleatorio() {
  var maximo = 20; // Máximo número de segundos de retardo
  var minimo = 5; // Mínimo número de segundos de retardo
  var retardo = Math.random() * (maximo - minimo) + minimo; // Genera un número aleatorio entre minimo y maximo
  return retardo * 1000; // Convierte el retardo a milisegundos
}

// Inicia y detiene la animación en un momento aleatorio
function animacionAleatoria() {
  setTimeout(function() {
      iniciarAnimacion();
      setTimeout(detenerAnimacion, 5000); // La animación durará 0.5 segundos
      animacionAleatoria(); // Llama a la función de nuevo para crear un ciclo infinito
  }, retardoAleatorio());
}

// Inicia la animación aleatoria
animacionAleatoria();

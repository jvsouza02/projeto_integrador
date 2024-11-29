// Esse código geralmente faz parte de design de site responsivo, 
// onde o menu é ocultado por padrão em dispositivos móveis ou telas menores e aparece ao clicar no botão do menu.

document.addEventListener("DOMContentLoaded", function () {
  const menuTrigger = document.querySelector('.menu-trigger');
  const nav = document.querySelector('.nav');

  // Adiciona evento de clique no menu responsivo
  menuTrigger.addEventListener('click', function () {
    nav.classList.toggle('active');
  });
});



// CARROSSEL DO REVIEWS

// Seleção de elementos
const reviewsContainer = document.querySelector('.reviews-container');
const reviews = document.querySelectorAll('.review');
const leftButton = document.querySelector('.carousel-button.left');
const rightButton = document.querySelector('.carousel-button.right');

let currentIndex = 0;
const cardsToShow = 3; // Mostrar 3 cards por vez

// Função para exibir os cards com navegação circular
function showCards() {
  reviews.forEach(review => review.style.display = 'none');

  for (let i = 0; i < cardsToShow; i++) {
    const index = (currentIndex + i) % reviews.length; // Navegação circular
    reviews[index].style.display = 'block';
  }
}

// Função para atualizar a exibição do carrossel
function updateCarousel() {
  showCards();
}

// Event Listener para o botão esquerdo
leftButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + reviews.length) % reviews.length;
  updateCarousel();
});

// Event Listener para o botão direito
rightButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % reviews.length;
  updateCarousel();
});

// Função para avançar automaticamente
function moveNext() {
  currentIndex = (currentIndex + 1) % reviews.length;
  updateCarousel();
}

// Função para iniciar o movimento automático
function autoSlide() {
  setInterval(moveNext, 6000); // Avança 1 card a cada 6 segundos
}

// Inicialização
window.onload = () => {
  showCards();
  autoSlide();
};





  
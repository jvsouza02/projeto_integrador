document.addEventListener("DOMContentLoaded", function () {
    const menuTrigger = document.querySelector('.menu-trigger');
    const nav = document.querySelector('.nav');

    // Adiciona evento de clique no menu responsivo
    menuTrigger.addEventListener('click', function () {
        nav.classList.toggle('active');
    });
});

const reviewsContainer = document.querySelector('.reviews-container');
const reviews = document.querySelectorAll('.review');
const leftButton = document.querySelector('.carousel-button.left');
const rightButton = document.querySelector('.carousel-button.right');

let currentIndex = 0;
const cardsToShow = 3; // Mostrar 3 cards por vez

// Função para exibir os cards com navegação circular
function showCards() {
  // Esconde todos os reviews
  reviews.forEach(review => review.style.display = 'none');

  // Exibe os 3 cards com base no índice atual
  for (let i = 0; i < cardsToShow; i++) {
    const index = (currentIndex + i) % reviews.length; // Navegação circular
    reviews[index].style.display = 'block';
  }
}

// Função para atualizar a exibição do carrossel
function updateCarousel() {
  showCards();
}

// Event Listener para o botão esquerdo (voltar 1 card)
leftButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + reviews.length) % reviews.length; // Navegação circular à esquerda de 1 em 1
  updateCarousel();
});

// Event Listener para o botão direito (avançar 1 card)
rightButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % reviews.length; // Navegação circular à direita de 1 em 1
  updateCarousel();
});

// Função para avançar automaticamente para o próximo card
function moveNext() {
  currentIndex = (currentIndex + 1) % reviews.length; // Navegação circular de 1 em 1
  updateCarousel();
}

// Função para iniciar o movimento automático do carrossel
function autoSlide() {
  setInterval(moveNext, 6000); // Avança 1 card a cada 5 segundos
}

// Inicialização do carrossel ao carregar a página
window.onload = () => {
  showCards(); // Exibe os cards ao carregar a página
  autoSlide(); // Inicia a navegação automática
};

$(function() {
    var selectedClass = "";
    $("p").click(function(){
    selectedClass = $(this).attr("data-rel");
    $("#portfolio").fadeTo(50, 0.1);
        $("#portfolio div").not("."+selectedClass).fadeOut();
    setTimeout(function() {
      $("."+selectedClass).fadeIn();
      $("#portfolio").fadeTo(50, 1);
    }, 500);
        
    });
});
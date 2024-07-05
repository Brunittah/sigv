// Event listener para executar o código quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o botão de toggle do menu
    const menuToggle = document.getElementById('menu-toggle');
    // Seleciona o menu
    const menu = document.getElementById('menu');
    // Seleciona todas as imagens expandíveis
    const images = document.querySelectorAll('.expandable-image');

    // Event listener para o botão de toggle do menu
    menuToggle.addEventListener('click', function () {
        // Verifica se o menu está visível
        if (menu.style.display === 'block') {
            // Oculta o menu
            menu.style.display = 'none';
            // Remove a animação quando o menu é oculto
            menu.style.animation = '';
        } else {
            // Exibe o menu
            menu.style.display = 'block';
            // Adiciona a animação de deslizar
            menu.style.animation = 'slideIn 0.5s forwards';
        }
    });

    // Criação da animação de deslizar para o menu
    var style = document.createElement('style');
    style.innerHTML = `
    @keyframes slideIn {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(0);
        }
    }
    `;
    document.head.appendChild(style);

    // Efeito de expansão da imagem ao clicar
    images.forEach(image => {
        image.addEventListener('click', function () {
            // Verifica se a imagem está expandida
            if (image.classList.contains('expanded')) {
                // Remove a classe de expansão
                image.classList.remove('expanded');
                // Define o fundo padrão
                image.parentElement.style.backgroundImage = "url('https://static.vecteezy.com/ti/fotos-gratis/p1/3025993-vivido-escuro-tinta-azul-cor-de-fundo-gratis-foto.jpg')";
            } else {
                // Adiciona a classe de expansão
                image.classList.add('expanded');
                // Remove o fundo da imagem expandida
                image.parentElement.style.backgroundImage = "none";
            }
        });
    });

    // Definição da classe para a imagem expandida
    style.innerHTML += `
    .expanded {
        transform: scale(3.0); /* Expande a imagem em 1.2 vezes */
        margin: auto; /* Centraliza a imagem */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
    }
    `;

    // Event listener para executar o código quando o DOM estiver carregado
    const slides = document.querySelector('.slides');
    const slideWidth = document.querySelector('.slide-container').offsetWidth;
    let currentSlide = 0;

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.children.length;
        slides.style.transition = "transform 1s ease";
        slides.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }

    setInterval(nextSlide, 2000);

    // Define o ano atual como o máximo valor do input
    var anoClienteInput = document.getElementById('ano_cliente');
    var anoAtual = new Date().getFullYear();
    anoClienteInput.setAttribute('max', anoAtual);
});

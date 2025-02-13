// console.log("gfgf");

const accomondationNotValide= async ()=>{
        const data = await fetch("getAllAccommodation", {
          method: "GET",
        });
        const response = await data.json();
        console.log(response);
        
      
        // displayCategories(response);
}
accomondationNotValide();
let currentSlide = 0;
let images = [];

function initSwiper(imageUrls) {
    images = imageUrls;
    const swiper = document.getElementById('imageSwiper');
    const dotsContainer = document.getElementById('swiperDots');
    
    // Ajouter les images
    swiper.innerHTML = '';
    imageUrls.forEach((url, index) => {
        const img = document.createElement('img');
        img.src = url;
        img.alt = `Image ${index + 1}`;
        img.className = 'w-full h-full object-cover flex-shrink-0';
        swiper.appendChild(img);
        
        // Ajouter les points
        const dot = document.createElement('div');
        dot.className = `h-1.5 w-1.5 rounded-full transition-colors duration-300 ${index === 0 ? 'bg-white' : 'bg-white/50'}`;
        dot.onclick = () => goToSlide(index);
        dotsContainer.appendChild(dot);
    });

    updateSlide();
}

function goToSlide(index) {
    currentSlide = index;
    updateSlide();
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % images.length;
    updateSlide();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + images.length) % images.length;
    updateSlide();
}

function updateSlide() {
    const swiper = document.getElementById('imageSwiper');
    const dots = document.getElementById('swiperDots').children;
    
    swiper.style.transform = `translateX(-${currentSlide * 100}%)`;
    
    Array.from(dots).forEach((dot, index) => {
        dot.className = `h-1.5 w-1.5 rounded-full transition-colors duration-300 ${
            index === currentSlide ? 'bg-white' : 'bg-white/50'
        }`;
    });
}

function publishAccommodation() {
    // Fonction à implémenter selon vos besoins
    console.log('Publication de l\'annonce...');
    // Ajoutez ici la logique de publication
}

// Initialisation avec des images de test
initSwiper([
    '../../../public/asset/images/home1.jpg',
    '../../../public/asset/images/home2.jpg',
    '../../../public/asset/images/home3.jpg'
]);

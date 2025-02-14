let sectionCard= document.getElementById("sectionCard")

const accomondationNotValide= async ()=>{
        const data = await fetch("getAllAccommodation", {
          method: "GET",
        });
        const response = await data.json();
        initSwiper(JSON.parse(response[6].array_to_json))
        
        displayAnonnces(response);
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

const publishAccommodation= async (id)=> {
    console.log(id);
    const data = await fetch("categories", {
        method: "PATCH",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(id),
      });
      const response = await data.json();
}

function displayAnonnces(array){
    let tableRows = "";

    array.forEach((element) => {
      tableRows += `<div class="max-w-sm rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 bg-white">
  <!-- Image Swiper Container -->
  <div class="relative h-48 group">
    <div class="flex w-full h-full overflow-hidden">
      <div id="imageSwiper" class="flex transition-transform duration-300 h-full w-full">
        <!-- Les images seront ajoutées ici -->
      </div>
    </div>

    <!-- Boutons de navigation -->
    <button onclick="prevSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white/90 p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity z-10">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <button onclick="nextSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white/90 p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity z-10">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <!-- Indicateur de position -->
    <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-1 z-10">
      <div id="swiperDots" class="flex space-x-1">
        <!-- Les points seront ajoutés ici -->
      </div>
    </div>

    <span class="absolute top-2 left-2 bg-white/90 px-2 py-1 rounded-full text-sm font-medium z-10">
    ${element["title"]}
    </span>
  </div>

  <!-- Content -->
  <div class="p-4">
    <!-- Host Info -->
    <div class="flex items-center gap-2 mb-3">
      <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-200">
        <img 
          src="${element["profilepicture"]}"
          alt="Host"
          class="w-full h-full object-cover"
        />
      </div>
      <span class="font-medium text-gray-800">${element["username"]}</span>
    </div>

    <!-- Description -->
    <p class="text-sm text-gray-600 line-clamp-2 mb-2">
    ${element["description"]}
    </p>

    <!-- Address -->
    <p class="text-sm text-gray-500 mb-3">
    ${element["address"]}
    </p>

    <!-- Footer -->
    <div class="flex justify-between items-center mb-4">
      <!-- Guests -->
      <div class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span class="text-sm text-gray-600">${element["maxguests"]} voyageurs</span>
      </div>

      <!-- Price -->
      <div class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="font-medium">${element["baseprice"]}</span>
        <span class="text-sm text-gray-500">/ nuit</span>
      </div>
    </div>

    <!-- Bouton Publier -->
    <button onclick="publishAccommodation(${element["id"]})" class="w-full bg-rose-500 hover:bg-rose-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-300">
      Publier l'annonce
    </button>
  </div>
</div>
`;
    });
  
    sectionCard.innerHTML = tableRows;
}

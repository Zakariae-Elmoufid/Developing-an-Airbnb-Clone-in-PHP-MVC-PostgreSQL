let sectionCard= document.getElementById("sectionCard")

const accomondationNotValide= async ()=>{
        const data = await fetch("getAllAccommodation", {
          method: "GET",
        });
        const response = await data.json();
        displayAnonnces(response);
}
accomondationNotValide();

const publicAccommodation= async (id)=> {
  console.log(id);
  const data = await fetch("accommodation", {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(id),
    });
    const response = await data.json();
    accomondationNotValide();
    
}

function displayAnonnces(array){
    let tableRows = "";

    array.forEach((element) => {
      let images = JSON.parse(element["array_to_json"])
      
      tableRows += `<div class="max-w-sm rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 bg-white">
  <!-- Image Swiper Container -->
  <div class="relative h-48 group">
    <div class="flex w-full h-full overflow-hidden">
      <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../../../public/asset/images/home1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../../../public/asset/images/home1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
      
        
       
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
    </div>
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
    <button onclick="publicAccommodation(${element["id"]})" class="w-full bg-rose-500 hover:bg-rose-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-300">
      Publier l'annonce
    </button>
  </div>
</div>
`;
    });

    sectionCard.innerHTML = tableRows;
}

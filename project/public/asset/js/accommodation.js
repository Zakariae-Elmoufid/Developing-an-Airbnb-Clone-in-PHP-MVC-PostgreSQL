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

const modalAddCategories= document.getElementById('addNewCategoriesModal')
const formAdd = document.getElementById('addCategoriesForm')

function fermModal(modal){
    modal.classList.add('hidden');
}
function ouverModal(modal){
    modal.classList.remove('hidden');
}

formAdd.addEventListener("submit",async (e)=>{
    e.preventDefault();
    const formData = new FormData(formAdd);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    
    if (!formAdd.checkValidity()) {
        e.stopPropagation();
        formAdd.querySelectorAll(":invalid").forEach(input => {
            input.classList.add("border-red-500");
            input.nextElementSibling.classList.remove("hidden");
            return false;
        });
    }else{
document.getElementById("addCategoriesBtn").value = 'Please Wait ...';
    const response = await fetch('categories', {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data), 
    });

    const result = await response.text();
     console.log(result);
     
    // Afficher la réponse dans l'élément 'alert'
    // alert.innerHTML = result;
    



    }
    
})
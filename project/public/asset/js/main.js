const modalAddCategories= document.getElementById('addNewCategoriesModal')
const formAdd = document.getElementById('addCategoriesForm')

function fermModal(modal){
    modal.classList.add('hidden');
}
function ouverModal(modal){
    modal.classList.remove('hidden');
}

formAdd.addEventListener("submit",(e)=>{
    e.preventDefault();
    const formData = new FormData(formAdd);
    console.log(formData);
    // Créer un objet à partir de FormData
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    console.log(data);
    
})
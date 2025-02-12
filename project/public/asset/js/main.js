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
    console.log(formData);
    // Créer un objet à partir de FormData
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    console.log(JSON.stringify(data));
    
    if (!formAdd.checkValidity()) {
        e.stopPropagation();
        formAdd.querySelectorAll(":invalid").forEach(input => {
            input.classList.add("border-red-500");
            input.nextElementSibling.classList.remove("hidden");
            return false;
        });
    }else{
        // Change button text to indicate the process is ongoing
document.getElementById("addCategoriesBtn").value = 'Please Wait ...';

try {
    // Envoyer les données sous forme de JSON
    const response = await fetch('categories', {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data), // Convertir l'objet JavaScript en JSON
    });

    // Affichage dans la console pour vérifier les données envoyées
    console.log(JSON.stringify(data));

    // Vérification du statut de la réponse
    if (!response.ok) {
        throw new Error(`Error: ${response.statusText}`);
    }

    // Récupérer la réponse du serveur
    const result = await response.text();

    // Afficher la réponse dans l'élément 'alert'
    alert.innerHTML = result;
    } catch (error) {
    // En cas d'erreur, rétablir le texte du bouton et afficher l'erreur
    document.getElementById("addCategoriesBtn").value = 'Try Again';
    alert.innerHTML = `An error occurred: ${error.message}`;
    }



    }
    
})
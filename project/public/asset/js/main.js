const modalAddCategories= document.getElementById('addNewCategoriesModal')
const modalUpdateCategories= document.getElementById('updateCategoriesModal')
const formAdd = document.getElementById('addCategoriesForm')
const formUpdate = document.getElementById('updateCategoriesForm')
const tbody = document.getElementById('tbodyCategories')
const titelInput = document.getElementById('title')
let id ;
function fermModal(modal,form){
    modal.classList.add('hidden');
    form.reset();

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

    const result = await response.json();
    let icon=result['icon'];
    let title=result['title'];
    

    fermModal(modalAddCategories,formAdd)
    alert(icon,title)
    fetchallCategories()

    }
    
})


function alert(iconparam,titleparam){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: iconparam,
        title: titleparam
      });
}

const fetchallCategories = async ()=>{
    const data = await fetch("allCategories",{
        method: "GET",   
    })
    const response= await data.json();
    
    displayCategories(response);
    
}
fetchallCategories()





function displayCategories(array){
    let tableRows = '';  

    array.forEach(element => {
        tableRows += `<tr>
        <td class="px-6 py-4 text-gray-600">${element['id']}</td>
        <td class="px-6 py-4 text-gray-600">${element['title']}</td>
        <td class="px-6 py-4">
            <div class="flex items-center justify-end gap-2">
                <a id="${element['id']}" onclick="ouverModal(modalUpdateCategories)" class="text-gray-400 hover:text-blue-500 transition-colors editLink">
                    <svg  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </a>
                <button id="${element['id']}" class="text-gray-400 hover:text-red-500 transition-colors deleteLink ">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        </td>
    </tr>`;
    });

    tbody.innerHTML = tableRows;
}















tbody.addEventListener("click", (e) => {
    let target = e.target.closest('.editLink');
    if (target) {
        id = target.getAttribute("id");
        console.log(id);
        remplireFormUpdate(id);
    }
});
 
const remplireFormUpdate = async (id)=>{
    const data = await fetch(`getCategorieById?id=${id}`,{
        method: "GET",   
    })
    const response= await data.json();
    titelInput.value=response['title']
}

formUpdate.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formUpdate);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    data.id = id;

    if (!formUpdate.checkValidity()) {
        e.stopPropagation();
        formUpdate.querySelectorAll(":invalid").forEach(input => {
            input.classList.add("border-red-500");
            const errorMessage = input.nextElementSibling;
            if (errorMessage) errorMessage.classList.remove("hidden");
        });
        return; 
    }

    document.getElementById("addCategoriesBtn").value = 'Please Wait ...';

    const response = await fetch('categories', {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data),
    });

    const result = await response.json();
    console.log(result);

    const icon = result['icon'];
    const title = result['title'];

    fermModal(modalUpdateCategories, formUpdate);
    alert(icon,title);
    fetchallCategories();
});


tbody.addEventListener("click", (e) => {
    let target = e.target.closest('.deleteLink');
    if (target) {
        id = target.getAttribute("id");
        console.log(id);
        deletCategorie(id)
    }
});


const deletCategorie= async (id)=>{
    const response = await fetch("categories",{
        method: "DELETE",   
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(id),
    })
    const result= await response.json();
    console.log(result);
    const icon = result['icon'];
    const title = result['title'];
    alert(icon,title);
    fetchallCategories();
}

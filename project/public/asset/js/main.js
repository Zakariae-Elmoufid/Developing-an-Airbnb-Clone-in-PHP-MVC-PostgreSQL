const modalAddCategories= document.getElementById('addNewCategoriesModal')
const formAdd = document.getElementById('addCategoriesForm')

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
    // console.log(result);
    let icon=result['icon'];
    let title=result['title'];
    // console.log(icon,title);
    
    
    fermModal(modalAddCategories,formAdd)
    alert(icon,title)
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
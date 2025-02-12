 document.addEventListener("DOMContentLoaded", async function () {
    
        const response = await fetch("/makeBooking/test");       
        const reservedDates = await response.json(); 
            flatpickr("#datePicker", {
                disable: reservedDates.map(date => new Date(date)), 
                dateFormat: "Y-m-d",  
                locale: "en"  
            });
      
    });

    const dateCheckInField = document.querySelector("[data='check_in']");
    const dateCheckOutField = document.querySelector("[data='check_out']");
    const price = document.getElementById('price').textContent;
    const guests
    let totalPriceElement = document.getElementById('total');
    const submit = document.getElementById('submit');
    
    dateCheckOutField.addEventListener("input", calculet);
    dateCheckInField.addEventListener("input", calculet); 

    function calculet(){
        
        let dateCheckIn = new Date(dateCheckInField.value);
        let dateCheckOut = new Date(dateCheckOutField.value);
        
        let timeDifference = dateCheckOut - dateCheckIn;
        let daysDifference = timeDifference / (1000 * 3600 * 24);
        let  total = daysDifference * parseFloat(price);
           
    if (!isNaN(total)) {
        totalPriceElement.textContent = ` ${total} `;
    } 

   
    addBooking(dateCheckIn,dateCheckOut,total);
}


 

function addBooking(dateCheckIn,dateCheckOut,total){

 fetch("/make", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
        checkIn: dateCheckIn,
        checkOut: dateCheckOut,
        total: total
    }).toString()
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        alert(`${type} deleted successfully!`);
        document.querySelector(`a[data-id="${id}"]`).closest('tr').remove();
    } else {
        alert(`Error deleting ${type}: ` + data.message);
    }
})

}



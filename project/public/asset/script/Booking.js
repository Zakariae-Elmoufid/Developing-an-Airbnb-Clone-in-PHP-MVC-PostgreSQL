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

   
    return [dateCheckIn,dateCheckOut,total];
}


function Booking(){
    const Numberguests =  document.getElementById('guests').value;
      const result =  calculet();
      
      return [result[0], result[1], result[2], Numberguests];
    } 
    
    function addBooking(){
        let result = Booking();

    
 fetch("/make", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
        checkIn: result[0],
        checkOut: result[1],
        guests : result[2],
        amount: result[3]
    }).toString()
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        alert(`${type}  successfully!`);
       
    } else {
        alert(`Error `);
    }
})

}



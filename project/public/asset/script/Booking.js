document.addEventListener("DOMContentLoaded", async function () {
    const datePicker = document.querySelector("#datePicker");
       

    console.log(datePicker);
   
        const response = await fetch("/makeBooking/test");       

        const reservedDates = await response.json(); 
        console.log(reservedDates);

        // Initialisation de Flatpickr avec les dates réservées
        flatpickr(datePicker, {
            disable: reservedDates.map(date => new Date(date)), // Désactiver les dates réservées
            dateFormat: "Y-m-d",  // Format de la date
            locale: "fr"  // Langue du calendrier
        });


});

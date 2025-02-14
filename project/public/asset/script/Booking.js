let reservedDates = [];
document.addEventListener("DOMContentLoaded", async function () {

    const response = await fetch("/makeBooking/test");
    reservedDates = await response.json();

    flatpickr("#datePicker", {
        disable: reservedDates.map(date => new Date(date)),
        dateFormat: "Y-m-d",
        locale: "en"
    });
});


const dateCheckInField = document.querySelector("[data='check_in']");
const dateCheckOutField = document.querySelector("[data='check_out']");
const price = document.getElementById('price').textContent;
const message = document.getElementById('message');

let totalPriceElement = document.getElementById('total');
const submit = document.getElementById('submit');
submit.addEventListener('click', addBooking);
dateCheckOutField.addEventListener("input", calculet);
dateCheckInField.addEventListener("input", calculet);

function calculet() {

    let dateCheckIn = new Date(dateCheckInField.value);
    let dateCheckOut = new Date(dateCheckOutField.value);

    let timeDifference = dateCheckOut - dateCheckIn;
    let daysDifference = timeDifference / (1000 * 3600 * 24);
    let total = daysDifference * parseFloat(price);

    if (!isNaN(total)) {
        totalPriceElement.textContent = ` ${total} `;
    }
    return [dateCheckIn, dateCheckOut, total];
}



function validator() {
    const result = calculet();
    const startDate = result[0];
    const endDate = result[1];
    let dates = [];
    let currentDate = new Date(startDate);

    while (currentDate <= endDate) {
        let formattedDate = currentDate.toISOString().split('T')[0];
        dates.push(formattedDate);

        currentDate.setDate(currentDate.getDate() + 1);
    }



    let isValid = true;

    dates.forEach(function (item) {
        if (reservedDates.includes(item)) {
            isValid = false;
        }
    });

    if (isValid) {
        message.textContent = "Successful Booking";

    } else {
        message.textContent = "Date Not Available";
    }

    return isValid;
}

function Booking() {
    const result = calculet();
    const Numberguests = document.getElementById('guests').value;
    return [result[0], result[1], Numberguests, result[2]];
}


function addBooking() {

    if (!validator()) {
        alert("Please select valid dates.");
        return;
    }
    let result = Booking();
    console.log(result);
    fetch("/make", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            checkIn: result[0],
            checkOut: result[1],
            guests: result[2],
            amount: result[3]
        }).toString()
    })
        .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         alert(`${type}  successfully!`);

        //     } else {
        //         alert(`Error `);
        //     }
        // })

}



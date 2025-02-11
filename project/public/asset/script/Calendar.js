// document.addEventListener('DOMContentLoaded', function() {
//     let calendarEl = document.getElementById('calendar');
//     let calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'dayGridMonth',
//         selectable: true,
//         events: 'get_dates.php',
//         select: function(info) {
//             let startDate = info.startStr;
//             let endDate = info.endStr;
            
//             if (confirm(`Voulez-vous réserver du ${startDate} au ${endDate} ?`)) {
//                 $.post("reserve.php", { start_date: startDate, end_date: endDate }, function(response) {
//                     alert(response.message);
//                     location.reload();
//                 }, "json");
//             }
//         }
//     });

//     calendar.render();
// });
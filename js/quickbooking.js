const container = document.querySelector('.container');
// const seats = document.querySelectorAll('.row .seat:not(.unavail');
const seats = document.querySelectorAll('.row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
const bookbtn = document.getElementById('confirmbook');
const hiddenfield = document.getElementById('seats');

const ticketType = document.getElementById('tickettype');

const print_tictype = document.getElementById('ticket_type');
const print_ticqty = document.getElementById('ticket_qty');
const print_ticprice = document.getElementById('ticket_price');
const print_ticsubtot = document.getElementById('ticket_subtot');

var selectedSeatsCount = 0;
var ticketPrice = 0;
var change = false;

// populateUI();

function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');

    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

    const finalSelectedSeats = document.querySelectorAll('.row .seat.selected');
    var div_array = [...finalSelectedSeats];
    var seat_list = [];
    div_array.forEach(div => {
        seat_list.push(div.id);
    });

    var seat_json = JSON.stringify(seat_list);

    hiddenfield.value = seat_json.replace(" ", "").replace("[", "").replace(/"/g, "").replace("]", "");

    localStorage.setItem('selectedSeatss', JSON.stringify(seatsIndex));

    //copy selected seats into arr
    // map through array
    //return new array of indexes

    // const selectedSeatsCount = selectedSeats.length;
    selectedSeatsCount = selectedSeats.length;

    // count.innerText = selectedSeatsCount;
    // total.innerText = selectedSeatsCount * ticketPrice;
}

// get data from localstorage and populate ui
// function populateUI() {
//     const selectedSeats = JSON.parse(localStorage.getItem('selectedSeatss'));
//     console.log(selectedSeats);
//     if (selectedSeats !== null && selectedSeats.length > 0) {
//         seats.forEach((seat, index) => {
//             if (selectedSeats.indexOf(index) > -1) {
//                 seat.classList.add('selected');
//             }
//         });
//     }

//     // const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

//     // if (selectedMovieIndex !== null) {
//     //     movieSelect.selectedIndex = selectedMovieIndex;
//     // }
// }

// // Movie select event
ticketType.addEventListener('change', (e) => {
    change = true;
    ticketPrice = e.target.value;
    // console.log(e.target.value);
    // console.log(selectedSeatsCount);
    if (selectedSeatsCount > 0) {
        displayTicketInfo();
    }
    // setMovieData(e.target.selectedIndex, e.target.value);
    // updateSelectedCount();

});

// Seat click event
container.addEventListener('click', (e) => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('unavail')) {
        e.target.classList.toggle('selected');

        updateSelectedCount();
        if (change)
            displayTicketInfo();
        if (selectedSeatsCount == 0) {
            clear();
        }
    }
});

// intial count and total
updateSelectedCount();

function displayTicketInfo() {
    print_tictype.innerHTML = ticketType.options[ticketType.selectedIndex].text;
    print_ticqty.innerHTML = selectedSeatsCount;
    print_ticprice.innerHTML = "$" + parseFloat(ticketPrice).toFixed(2);
    print_ticsubtot.innerHTML = "$" + parseFloat(ticketPrice * selectedSeatsCount).toFixed(2);
}

function clear() {
    print_tictype.innerHTML = "";
    print_ticqty.innerHTML = "";
    print_ticprice.innerHTML = "";
    print_ticsubtot.innerHTML = "";
}
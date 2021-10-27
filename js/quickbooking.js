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

    selectedSeatsCount = selectedSeats.length;
}

// // Movie select event
ticketType.addEventListener('change', (e) => {
    change = true;
    ticketPrice = e.target.value;
    // console.log(e.target.value);
    // console.log(selectedSeatsCount);
    if (selectedSeatsCount > 0) {
        displayTicketInfo();
    }
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

let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let namewa = id("name"),
    email = id("email"),
    password = id("phone"),
    form = id("bookingform"),
    errorMsg = classes("error"),
    successIcon = classes("success-icon"),
    failureIcon = classes("failure-icon");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    engine(namewa, 0, "Name cannot be blank");
    engine(phone, 1, "Phone cannot be blank");
    engine(email, 2, "Email cannot be blank");
});

let engine = (id, serial, message) => {
    if (id.value.trim() === "") {
        errorMsg[serial].innerHTML = message;
        id.style.border = "2px solid red";

        // icons
        failureIcon[serial].style.opacity = "1";
        successIcon[serial].style.opacity = "0";
    } else {
        errorMsg[serial].innerHTML = "";
        id.style.border = "2px solid green";

        // icons
        failureIcon[serial].style.opacity = "0";
        successIcon[serial].style.opacity = "1";
    }
};
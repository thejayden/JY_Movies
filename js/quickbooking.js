const container = document.querySelector('.container');
// const seats = document.querySelectorAll('.row .seat:not(.unavail');
const seats = document.querySelectorAll('.row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
const bookbtn = document.getElementById('confirmbook');
const hiddenfield = document.getElementById('seats');

const ticketType = document.getElementById('tickettype');
const timeslot = document.getElementById('timeslot');
const date = document.getElementById('date');

const print_tictype = document.getElementById('ticket_type');
const print_ticqty = document.getElementById('ticket_qty');
const print_ticprice = document.getElementById('ticket_price');
const print_ticsubtot = document.getElementById('ticket_subtot');

var selectedSeatsCount = 0;
var ticketPrice = 0;
var time;

var tic_select_change = false;
var date_select_change = false;
var cine_select_change = false;
var time_select_change = false;
var errorname = true;
var errorphone = true;
var erroremail = true;
var newdate = document.getElementById("date");
newdate.addEventListener("change", chkdate, false);

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

// ticket type select
ticketType.addEventListener('change', (e) => {
    tic_select_change = true;
    ticketPrice = e.target.value;
    // console.log(e.target.value);
    // console.log(selectedSeatsCount);
    if (selectedSeatsCount > 0) {
        displayTicketInfo();
        seat_msg.innerText = "";
    }
});

date.addEventListener('change', (e) => {

});

timeslot.addEventListener('change', (e) => {

});

// Seat click event
container.addEventListener('click', (e) => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('unavail')) {
        e.target.classList.toggle('selected');

        updateSelectedCount();
        if (tic_select_change) {
            displayTicketInfo();
            seat_msg.innerText = "";
        }
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
    seat_msg.innerText = "";
}

let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let namewa = id("name"),
    email = id("email"),
    phone = id("phone"),
    form = id("bookingform"),
    seat_msg = id("seat_msg"),
    errorMsg = classes("error"),
    successIcon = classes("success-icon"),
    failureIcon = classes("failure-icon");

form.addEventListener("submit", (e) => {
    namecheck(namewa, 0);
    phonecheck(phone, 1);
    emailcheck(email, 2);
    if (!errorname && !errorphone && !erroremail && !seatscheck()) {
        // if (seatscheck() == false) {
        console.log("HERE");
        return true;
        // }
    } else {
        e.preventDefault();
    }
});

function seatscheck() {
    if (hiddenfield.value == null || hiddenfield.value == "") {
        seat_msg.innerText = "You have not selected your seats";
        return true;
    }
    seat_msg.innerText = "";
    return false;
}

let namecheck = (id, idx) => {
    var pos = id.value.search(/^[\sA-Za-z]+$/);

    if (id.value.trim() === "") {
        errorMsg[idx].innerHTML = "Name cannot be blank";
        id.style.border = "2px solid red";

        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorname = true;
    } else if (pos != 0) {
        errorMsg[idx].innerHTML = "Please enter only alphabets";
        id.style.border = "2px solid red";
        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorname = true;
    } else if (id.value.length < 3) {
        errorMsg[idx].innerHTML = "Too short! Please enter your full name";
        id.style.border = "2px solid red";
        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorname = true;
    } else {
        errorMsg[idx].innerHTML = "";
        id.style.border = "2px solid green";

        // icons
        failureIcon[idx].style.opacity = "0";
        successIcon[idx].style.opacity = "1";
        errorname = false;
    }
};

let phonecheck = (id, idx) => {
    var pos = id.value.search(/\+?^[\d]+$/);

    if (id.value.trim() === "") {
        errorMsg[idx].innerHTML = "Phone cannot be blank";
        id.style.border = "2px solid red";

        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorphone = true;
    } else if (pos != 0) {
        errorMsg[idx].innerHTML = "Please enter only digits";
        id.style.border = "2px solid red";
        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorphone = true;
    } else if (id.value.length < 8) {
        errorMsg[idx].innerHTML = "Please enter a valid phone number";
        id.style.border = "2px solid red";
        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        errorphone = true;
    } else {
        errorMsg[idx].innerHTML = "";
        id.style.border = "2px solid green";

        // icons
        failureIcon[idx].style.opacity = "0";
        successIcon[idx].style.opacity = "1";
        errorphone = false;
    }
};

let emailcheck = (id, idx) => {
    var pos = id.value.search(/^[\w.-]+@{1}([\w]+\.){1,5}[\w]{2,6}$/);

    if (id.value.trim() === "") {
        errorMsg[idx].innerHTML = "Email cannot be blank";
        id.style.border = "2px solid red";

        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        erroremail = true;
    } else if (pos != 0) {
        errorMsg[idx].innerHTML = "Please enter a valid email";
        id.style.border = "2px solid red";
        // icons
        failureIcon[idx].style.opacity = "1";
        successIcon[idx].style.opacity = "0";
        erroremail = true;
    } else {
        errorMsg[idx].innerHTML = "";
        id.style.border = "2px solid green";

        // icons
        failureIcon[idx].style.opacity = "0";
        successIcon[idx].style.opacity = "1";
        erroremail = false;
    }
};


// let empty = (id, serial, message) => {
//     if (id.value.trim() === "") {
//         errorMsg[serial].innerHTML = message;
//         id.style.border = "2px solid red";

//         // icons
//         failureIcon[serial].style.opacity = "1";
//         successIcon[serial].style.opacity = "0";
//     } else {
//         errorMsg[serial].innerHTML = "";
//         id.style.border = "2px solid green";

//         // icons
//         failureIcon[serial].style.opacity = "0";
//         successIcon[serial].style.opacity = "1";
//     }
// };


//Date check

function chkdate(){

    var init1 = document.getElementById("date").value;
    var init2 = new Date(init1).setHours(0,0,0,0);
    var now = new Date().setHours(0,0,0,0);
    
    if (init2 == now){
      alert("Date is invalid, please select a date in the future");
    }
    else if (init2 < now){
      alert("Date is invalid, please select a date in the future");
    }
    };
const container = document.querySelector('.container');
// const seats = document.querySelectorAll('.row .seat:not(.unavail');
const seats = document.querySelectorAll('.row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
const bookbtn = document.getElementById('confirmbook');
const hiddenfield = document.getElementById('seats');
const seatsdisplay = document.getElementById('seatsdisplay');

const ticketType = document.getElementById('tickettype');
const timeslot = document.getElementById('timeslot');
const date = document.getElementById('date');
const cine = document.getElementById('cinema');

const print_tictype = document.getElementById('ticket_type');
const print_ticqty = document.getElementById('ticket_qty');
const print_ticprice = document.getElementById('ticket_price');
const print_ticsubtot = document.getElementById('ticket_subtot');

var seat_data;
var selectedSeatsCount = 0;
var ticketPrice = 0;
var previous_occupied_seats;

var selected_time;
var selected_date;
var selected_cinema;
var selected_movie = bookbtn.value;

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
    date_select_change = true;
    selected_date = e.target.value;
    // document.cookie = "date=WsHAT";
    if (showseats()) {
        getSeats(selected_movie, selected_date, selected_time, selected_cinema);
    }
});

timeslot.addEventListener('change', (e) => {
    time_select_change = true;
    selected_time = e.target.value;
    // document.cookie = "time=" + e.target.value;
    if (showseats()) {
        getSeats(selected_movie, selected_date, selected_time, selected_cinema);
    }
});

cine.addEventListener('change', (e) => {
    cine_select_change = true;
    selected_cinema = e.target.value;
    // document.cookie = "cinema=" + e.target.value;
    if (showseats()) {
        getSeats(selected_movie, selected_date, selected_time, selected_cinema);
    }
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

function showseats() {
    if (date_select_change && time_select_change && cine_select_change) {
        seatsdisplay.style.display = "";
        return true;
    } else return false;
}

function getSeats(movie, date, time, cinema) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/seats_data.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // xhr.onreadystatechange = function() {
    //     if (this.readyState === 4) {
    //         alert(xhr.responseText);
    //     }
    // };
    xhr.send("&movie=" + movie + "&date=" + date + "&time=" + time + "&cinema=" + cinema);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            seat_data = JSON.parse(xhr.responseText);
            console.log(seat_data);
            populateUnavailable(seat_data);
        }
    }
}

function populateUnavailable(data) {
    var occupied_seats = [];
    for (var i = 0; i < data.length; i++) {
        occupied_seats = occupied_seats.concat((data[i].seats).split(","));
    }
    console.log(occupied_seats);
    if (previous_occupied_seats != null) {
        previous_occupied_seats.map(seat_id => {
            document.getElementById(seat_id).classList.toggle('unavail');
        });
    }
    occupied_seats.map(seat_id => {
        document.getElementById(seat_id).classList.toggle('unavail');
    });
    previous_occupied_seats = occupied_seats;
}

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

function chkdate() {

    var init1 = document.getElementById("date").value;
    var init2 = new Date(init1).setHours(0, 0, 0, 0);
    var now = new Date().setHours(0, 0, 0, 0);

    if (init2 == now) {
        alert("Date is invalid, please select a date in the future");
    } else if (init2 < now) {
        alert("Date is invalid, please select a date in the future");
    }
};
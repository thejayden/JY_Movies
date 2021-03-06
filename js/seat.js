const container = document.querySelector('.container');
// const seats = document.querySelectorAll('.row .seat:not(.unavail');
const seats = document.querySelectorAll('.row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
// const movieSelect = document.getElementById('movie');
const bookbtn = document.getElementById('confirmbook');
const hiddenfield = document.getElementById('seats');

populateUI();
// let ticketPrice = +movieSelect.value;

// // Save selected movie index and price
// function setMovieData(movieIndex, moviePrice) {
//     localStorage.setItem('selectedMovieIndex', movieIndex);
//     localStorage.setItem('selectedMoviePrice', moviePrice);
// }

// update total and count
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

    // console.log("seat_json = \n");
    // console.log(seat_json);

    hiddenfield.value = seat_json.replace(" ", "").replace("[", "").replace(/"/g, "").replace("]", "");
    // console.log(seat_json.replace(" ", "").replace("[", "").replace(/"/g, "").replace("]", ""));
    // hiddenfield.value = seat_json;

    // console.log("seat_list = \n");
    // console.log(seat_list);



    // console.log("div_aray[] = \n");
    // console.log(div_array[1].id);

    // console.log("seats = \n");
    // console.log(seats);

    // console.log("selectedSeats = \n");
    // console.log(selectedSeats);

    // console.log("selectedSeats[] = \n");
    // console.log(selectedSeats[0].id);

    // console.log("...selectedSeats = \n");
    // console.log([...selectedSeats]);

    // console.log("seatsIndex = \n");
    // console.log(seatsIndex);

    localStorage.setItem('selectedSeatss', JSON.stringify(seatsIndex));

    //copy selected seats into arr
    // map through array
    //return new array of indexes

    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    // total.innerText = selectedSeatsCount * ticketPrice;
}

// get data from localstorage and populate ui
function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeatss'));
    console.log(selectedSeats);
    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add('selected');
            }
        });
    }

    // const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

    // if (selectedMovieIndex !== null) {
    //     movieSelect.selectedIndex = selectedMovieIndex;
    // }
}

// // Movie select event
// movieSelect.addEventListener('change', (e) => {
//     ticketPrice = +e.target.value;
//     setMovieData(e.target.selectedIndex, e.target.value);
//     updateSelectedCount();
// });

// Seat click event
container.addEventListener('click', (e) => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('unavail')) {
        e.target.classList.toggle('selected');

        updateSelectedCount();
    }
});

// bookbtn.addEventListener('click', (e) => {
//     const finalSelectedSeats = document.querySelectorAll('.row .seat.selected');
//     var div_array = [...finalSelectedSeats].forEach(div => {
//         div.id;
//     })
// });

// intial count and total
updateSelectedCount();
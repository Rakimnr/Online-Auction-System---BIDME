

document.addEventListener("DOMContentLoaded", function () {
    let slides = [
        { src: "images/slide1.png", text: "Slide 1 Text" },
        { src: "images/slide2.png", text: "Slide 2 Text" },
        { src: "images/slide3.png", text: "Slide 3 Text" }
    ];
    let counter = 0;

    function updateSlide() {
        document.getElementById("slideImage").src = slides[counter].src;
        document.getElementById("slideText").innerHTML = slides[counter].text;
    }

    document.getElementById("prevBtn").addEventListener("click", function () {
        counter = (counter === 0) ? slides.length - 1 : counter - 1;
        updateSlide();
    });

    document.getElementById("nextBtn").addEventListener("click", function () {
        counter = (counter === slides.length - 1) ? 0 : counter + 1;
        updateSlide();
    });

    updateSlide(); // Initialize the first slide
});


// register

function checkPassword() {

    if (document.getElementById("psw").value != document.getElementById("cnfrmpwd").value) {
        alert("password mismatched");
        return false;
    } else {
        alert("Success");
        return true;
    }
}

function enableButton() {

    if (document.getElementById("checkBox").checked) {

        document.getElementById("submitbtn").disabled = false;
    } else {

        document.getElementById("submitbtn").disabled = true;
    }
}


function validateBid() {
    const bidInput = document.getElementById('bidInput');
    const currentBidValue = parseFloat(document.getElementById('currentBid').querySelector('span').textContent);

    const newBidValue = parseFloat(bidInput.value);

    if (newBidValue <= currentBidValue) {
        alert(`Your bid must be higher than the current highest bid of $${currentBidValue}.`);
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

// Display the current highest bid
document.addEventListener('DOMContentLoaded', function () {
    const currentBid = document.getElementById('currentBid');
    currentBid.style.display = 'inline'; // Show the current bid info
});



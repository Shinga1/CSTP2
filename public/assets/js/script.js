// Scroller Connected To Header
const header = document.querySelector("nav");

window.onscroll = function () {
    var top = window.scrollY;
    console.log(top);
    if (top >= 5) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
};

// Previous and Next Buttons for Reviews Section
const prevButton = document.querySelector(".prev-button");
const nextButton = document.querySelector(".next-button");
const reviews = document.querySelectorAll(".review");

let currentIndex = 0;
let timerId = null;

const showReview = (index) => {
    reviews.forEach((review, i) => {
        if (i === index) {
            review.style.display = "block";
        } else {
            review.style.display = "none";
        }
    });
};

const nextReview = () => {
    currentIndex = (currentIndex + 1) % reviews.length;
    showReview(currentIndex);
};

timerId = setInterval(nextReview, 5000);

prevButton.addEventListener("click", () => {
    clearInterval(timerId);
    currentIndex = (currentIndex - 1 + reviews.length) % reviews.length;
    showReview(currentIndex);
    timerId = setInterval(nextReview, 5000);
});

nextButton.addEventListener("click", () => {
    clearInterval(timerId);
    nextReview();
    timerId = setInterval(nextReview, 5000);
});

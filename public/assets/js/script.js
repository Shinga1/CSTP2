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

// Scroller For The Reviews
const reviews = document.querySelectorAll(".review");
const body = document.querySelector("body");
const container = document.querySelector(".reviews-container");

let currentIndex = 0;
let timerId = null;

const showReview = (index, direction) => {
    reviews.forEach((review, i) => {
        if (i === index) {
            review.style.display = "block";
            review.classList.add("fly-in-right");
        } else {
            if (direction === "initial" && i !== 0) {
                review.style.display = "none";
            } else {
                review.style.display = "none";
                review.classList.remove("fly-in-right");
                review.classList.remove("fly-out-left");
            }
        }
    });
};

showReview(currentIndex, "initial");

const nextReview = () => {
    const nextIndex = (currentIndex + 1) % reviews.length;
    showReview(nextIndex, "next");
    currentIndex = nextIndex;

    // Check if the next review text is offscreen to the left
    const offscreenLeft =
        reviews[currentIndex].getBoundingClientRect().left < 0;
    if (offscreenLeft) {
        // Move the current review to the end of the container
        container.appendChild(reviews[currentIndex]);

        // Set the currentIndex to the first review text that's not visible
        for (let i = 0; i < reviews.length; i++) {
            const rect = reviews[i].getBoundingClientRect();
            if (rect.left >= 0 && rect.right <= window.innerWidth) {
                currentIndex = i;
                break;
            }
        }
    }
};

timerId = setInterval(nextReview, 5000);

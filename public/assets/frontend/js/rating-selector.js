let ratingValue = 0;

function setRating(value) {
    ratingValue = value;
    updateSelectorBar();
    updateSelectedRating();
}

function resetRating() {
    ratingValue = 0;
    updateSelectorBar();
    updateSelectedRating();
}

function updateSelectorBar() {
    const selectorBar = document.getElementById('selector-bar');
    selectorBar.style.width = `${ratingValue * 15.5}%`;
}

function updateSelectedRating() {
    const selectedRatingDiv = document.getElementById('rating_selector_box');
    const selectedRating = ratingValue === 0 ? '0' : ratingValue + '+';
    selectedRatingDiv.textContent = `Over: ${selectedRating}`;
}

function applyRating() {
    // You can add logic here to handle the application of the selected price.
    alert(`{ratingValue === 0 ? '0' : ratingValue + '+'}`);
}
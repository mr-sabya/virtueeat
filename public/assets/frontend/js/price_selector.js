let progressValue = 0;
function setProgress(value) {
    progressValue = value;
    updateProgressBar();
    updateSelectedPrice();
}
function resetProgress() {
    progressValue = 0;
    updateProgressBar();
    updateSelectedPrice();
}
function updateProgressBar() {
    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = `${progressValue * 15.5}%`;
}
function updateSelectedPrice() {
    const selectedPriceDiv = document.getElementById('selected-price');
    const selectedPrice = progressValue === 0 ? '0$' : progressValue + '$';
    selectedPriceDiv.textContent = `Under ${selectedPrice} Delivery`;
}
function applyProgress() {
// You can add logic here to handle the application of the selected price.
    alert(`Selected price: ${progressValue === 0 ? '0$' : progressValue + '$'}`);
}

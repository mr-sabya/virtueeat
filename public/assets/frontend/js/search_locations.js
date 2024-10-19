// Mock data for location suggestions
const locations = ["New York, NA sit amet, consectetur adipiscing", "New York, NA sit amet, consectetur adipiscing", "New York, NA sit amet, consectetur adipiscing"];

const locationInput = document.getElementById('locationInput');
const searchIcon = document.getElementById('searchIcon');
const clearIcon = document.getElementById('clearIcon');
const suggestionsContainer = document.getElementById('suggestionsContainer');
// Event listener for input changes
locationInput.addEventListener('input', function () {
    const inputValue = this.value.trim();
    const suggestions = locations.filter(location => location.toLowerCase().includes(inputValue.toLowerCase()));

    // Display suggestions
    displaySuggestions(suggestions);

    // Show/hide clear icon
    clearIcon.style.display = inputValue.length > 0 ? 'block' : 'none';
});

// Event listener for search icon click
searchIcon.addEventListener('click', function () {
    const inputValue = locationInput.value.trim();
    const suggestions = locations.filter(location => location.toLowerCase().includes(inputValue.toLowerCase()));

    // Display suggestions
    displaySuggestions(suggestions);
});

// Event listener for clear icon click
clearIcon.addEventListener('click', function () {
    locationInput.value = '';
    hideSuggestions();
    clearIcon.style.display = 'none';
});

// Event listener for suggestion clicks
suggestionsContainer.addEventListener('click', function (event) {
    if (event.target.classList.contains('suggestion')) {
        locationInput.value = event.target.innerText;
        hideSuggestions();
    }
});

// Function to display suggestions
function displaySuggestions(suggestions) {
    if (suggestions.length > 0) {
        const suggestionHTML = suggestions.map(suggestion => `
            <div class="suggestion">
                <i class="icon-map-pin"></i>
                ${suggestion}
            </div>`
        ).join('');
        suggestionsContainer.innerHTML = suggestionHTML;
        suggestionsContainer.style.display = 'block';
    } else {
        hideSuggestions();
    }
}

// Function to hide suggestions
function hideSuggestions() {
    suggestionsContainer.style.display = 'none';
}
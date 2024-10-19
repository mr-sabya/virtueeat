const searchInput = document.getElementById('searchInput');
const clearInput = document.getElementById('clearInput');
const suggestionsContainer2 = document.getElementById('suggestionsFoodContainer');
const categoryButtons = document.querySelectorAll('.category-btn');
const suggestionsData = [
    { title: "Maya's Fish & Chips", location: "Seafood • American", image: 'assets/images/food-icon.png' },
    { title: "Maya's Fish & Chips", location: "Seafood • American", image: 'assets/images/food-icon.png' },
    { title: "Maya's Fish & Chips", location: "Seafood • American", image: 'assets/images/food-icon.png' },
    { title: "Maya's Fish & Chips", location: "Seafood • American", image: 'assets/images/food-icon.png' },
    { title: "Maya's Fish & Chips", location: "Seafood • American", image: 'assets/images/food-icon.png' }
];

searchInput.addEventListener('input', function () {
    const inputValue = this.value.trim();
    clearInput.style.display = inputValue ? 'block' : 'none';

    // Add logic to generate and display suggestions here
    showSuggestions(inputValue);
});

clearInput.addEventListener('click', function () {
    searchInput.value = '';
    this.style.display = 'none';
    suggestionsContainer2.innerHTML = ''; // Clear suggestions when clearing the input
});

categoryButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Handle category button click
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        const selectedCategory = this.getAttribute('data-category');
        console.log('Selected Category:', selectedCategory);
    });
});

function showSuggestions(query) {
    suggestionsContainer2.innerHTML = ''; // Clear previous suggestions

    suggestionsData.forEach(suggestion => {
        const suggestionItem = document.createElement('div');
        suggestionItem.classList.add('suggestion-food-item');

        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');
        const foodImage = document.createElement('img');
        foodImage.src = suggestion.image;
        imageContainer.appendChild(foodImage);

        const contentContainer = document.createElement('div');
        contentContainer.classList.add('content-container');
        const titleElement = document.createElement('div');
        titleElement.classList.add('suggestion-title');
        titleElement.textContent = suggestion.title;

        const locationElement = document.createElement('div');
        locationElement.classList.add('suggestion-restaurant-location');
        locationElement.textContent = suggestion.location;

        contentContainer.appendChild(titleElement);
        contentContainer.appendChild(locationElement);

        suggestionItem.appendChild(imageContainer);
        suggestionItem.appendChild(contentContainer);

        suggestionItem.addEventListener('click', function () {
            searchInput.value = suggestion.title;
            clearInput.style.display = 'block';
            suggestionsContainer2.innerHTML = ''; // Clear suggestions on selection
        });

        suggestionsContainer2.appendChild(suggestionItem);
    });
}
const searchInput = document.getElementById('searchInput');
const clearInput = document.getElementById('clearInput');
const suggestionsContainer1 = document.getElementById('suggestionsContainer1');
const categoryButtons = document.querySelectorAll('.category-btn');

searchInput.addEventListener('input', function () {
    const inputValue = this.value.trim();
    clearInput.style.display = inputValue ? 'block' : 'none';

    // Add logic to generate and display suggestions here
    showSuggestions(inputValue);
});

clearInput.addEventListener('click', function () {
    searchInput.value = '';
    this.style.display = 'none';
    suggestionsContainer1.innerHTML = ''; // Clear suggestions when clearing the input
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
    // Replace this with your own logic to fetch and display suggestions
    const suggestions = [
        'Kosher',
        'Chinese',
        'Pizza',
        'Sushi',
        'Breakfast and Brunch'
    ];

    suggestionsContainer1.innerHTML = ''; // Clear previous suggestions

    suggestions.forEach(suggestion => {
        const suggestionItem = document.createElement('div');
        suggestionItem.classList.add('suggestion-item');
        suggestionItem.textContent = suggestion;

        const searchIcon = document.createElement('span');
        searchIcon.classList.add('icon-search');
        suggestionItem.appendChild(searchIcon);

        suggestionItem.addEventListener('click', function () {
            searchInput.value = suggestion;
            clearInput.style.display = 'block';
            suggestionsContainer1.innerHTML = ''; // Clear suggestions on selection
        });

        suggestionsContainer1.appendChild(suggestionItem);
    });
}
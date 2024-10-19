let activeButton = document.querySelector('.selector-button.active');

function selectOption(option) {
    activeButton.classList.remove('active');
    activeButton = event.currentTarget;
    activeButton.classList.add('active');
    
    // You can add additional logic here based on the selected option
    console.log('Selected option:', option);
}
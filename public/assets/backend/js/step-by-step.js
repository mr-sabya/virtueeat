document.addEventListener('DOMContentLoaded', function () {
    const nextButtons = document.querySelectorAll('.btn-next');
    const prevButtons = document.querySelectorAll('.btn-prev');
    const formSteps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step-indicator input[type="checkbox"]');
    let currentStep = 0;

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            formSteps[currentStep].classList.remove('form-step-active');
            if (currentStep < stepIndicators.length - 1) {
                stepIndicators[currentStep].checked = true;
            }
            currentStep++;
            formSteps[currentStep].classList.add('form-step-active');
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            formSteps[currentStep].classList.remove('form-step-active');
            if (currentStep > 0) {
                currentStep--;
                stepIndicators[currentStep].checked = false;
            }
            formSteps[currentStep].classList.add('form-step-active');
        });
    });

    const form = document.getElementById('multiStepForm');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        alert('Form submitted!');
    });
});
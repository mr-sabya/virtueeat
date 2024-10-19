let selectedAmount = null;

function selectAmount(amount) {
    // Remove "selected" class from the previously selected button
    if (selectedAmount !== null) {
        document.getElementById("amount" + selectedAmount).classList.remove("selected");
    }

    // Set the new selected amount
    selectedAmount = amount;

    // Add "selected" class to the clicked button
    document.getElementById("amount" + selectedAmount).classList.add("selected");
}

function submitDonation() {
    if (selectedAmount !== null) {
        // Perform further actions, like submitting the form or redirecting to a payment page
        // For now, just log the selected amount to the console
        console.log("Donation Amount: $" + selectedAmount);
    } else {
        alert("Please select a donation amount before applying.");
    }
}

function resetSelection() {
    // Remove "selected" class from the currently selected button
    if (selectedAmount !== null) {
        document.getElementById("amount" + selectedAmount).classList.remove("selected");
    }

    // Reset the selected amount to null
    selectedAmount = null;
}



function resetForm() {
    document.getElementById('checkbox1').checked = false;
    document.getElementById('checkbox2').checked = false;
    document.getElementById('checkbox3').checked = false;
    document.getElementById('checkbox4').checked = false;
}
function resetForm2() {
    document.getElementById('checkbox5').checked = false;
    document.getElementById('checkbox6').checked = false;
    document.getElementById('checkbox7').checked = false;
    document.getElementById('checkbox8').checked = false;
}
function applyChanges() {
    var isChecked1 = document.getElementById('checkbox1').checked;
    var isChecked2 = document.getElementById('checkbox2').checked;
    var isChecked3 = document.getElementById('checkbox3').checked;
    var isChecked4 = document.getElementById('checkbox4').checked;
    alert("Checkbox 1 is " + (isChecked1 ? "checked" : "unchecked") + "\n" +
        "Checkbox 2 is " + (isChecked2 ? "checked" : "unchecked") + "\n" +
        "Checkbox 3 is " + (isChecked3 ? "checked" : "unchecked") + "\n" +
        "Checkbox 4 is " + (isChecked4 ? "checked" : "unchecked"));
}
function applyChanges2() {
    var isChecked5 = document.getElementById('checkbox5').checked;
    var isChecked6 = document.getElementById('checkbox6').checked;
    var isChecked7 = document.getElementById('checkbox7').checked;
    var isChecked8 = document.getElementById('checkbox8').checked;
    alert("Checkbox 5 is " + (isChecked5 ? "checked" : "unchecked") + "\n" +
        "Checkbox 6 is " + (isChecked6 ? "checked" : "unchecked") + "\n" +
        "Checkbox 7 is " + (isChecked7 ? "checked" : "unchecked") + "\n" +
        "Checkbox 8 is " + (isChecked8 ? "checked" : "unchecked"));
}
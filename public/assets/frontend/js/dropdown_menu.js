function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function editBtn() {
    document.getElementById("editDelete").classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
}

your_payment_mathod_edit_btn.onclick = function(event) {
    if (!event.target.matches('.your_payment_mathod_edit_btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-option");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
}
// document.addEventListener('livewire:navigated', () => {

    function toggleDropdown(id) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.id !== id) {
                openDropdown.classList.remove('show');
            }
        }
        document.getElementById(id).classList.toggle("show");
    }

    window.onclick = function (event) {
        if (!event.target.matches('button')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

// });
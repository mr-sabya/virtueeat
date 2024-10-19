document.addEventListener("DOMContentLoaded", function () {
    const adminSidebarToggleBtn = document.getElementById('adminSidebarToggle');
    const adminSidebar = document.getElementById('adminSidebar');
    const adminContent = document.getElementById('adminContent');

    adminSidebarToggleBtn.addEventListener('click', function () {
        adminSidebar.classList.toggle('active');
        adminContent.classList.toggle('active');
    });

    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function (e) {
            e.preventDefault();
            const submenu = dropdown.nextElementSibling;
            submenu.classList.toggle('collapse');
        });
    });
});

// Add your JavaScript code here
function openSchedulePopup() {
    document.getElementById('schedulePopup').style.display = 'block';
    }

    function setScheduledTime() {
    var date = document.getElementById('scheduleDate').value;
    var time = document.getElementById('scheduleTime').value;
    var scheduledTime = date + ' ' + time;
    document.getElementById('searchOption').options[1].text = scheduledTime;
    document.getElementById('schedulePopup').style.display = 'none';
    }

    function cancelScheduledTime() {
    document.getElementById('schedulePopup').style.display = 'none';
    }

    function updateScheduleOptionText() {
    var selectedOption = document.getElementById('searchOption').value;
    if (selectedOption === 'schedule') {
        openSchedulePopup();
    } else {
        // Reset the option text when switching back to 'Schedule Search'
        document.getElementById('searchOption').options[1].text = 'Schedule Search';
    }
}
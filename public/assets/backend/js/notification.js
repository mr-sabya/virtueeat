document.getElementById('notifyButton').addEventListener('click', function() {
    var notificationBox = document.getElementById('notificationBox');
    notificationBox.style.display = notificationBox.style.display === 'none' || notificationBox.style.display === '' ? 'block' : 'none';
  });
  document.querySelectorAll('.close').forEach(function(closeButton) {
    closeButton.addEventListener('click', function() {
      var notificationItem = this.closest('.notification-item');
      notificationItem.style.display = 'none';
    });
  });
  document.querySelector('.mark-read').addEventListener('click', function() {
    document.querySelectorAll('.notification-item').forEach(function(notificationItem) {
      notificationItem.style.display = 'none';
    });
});
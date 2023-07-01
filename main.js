document.getElementById('healthReportForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    var formData = new FormData(this);
  
    // Send form data to server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById('message').innerHTML = 'Form submitted successfully!';
        document.getElementById('message').className = 'alert alert-success';
        document.getElementById('healthReportForm').reset();
      } else {
        document.getElementById('message').innerHTML = 'Form submission failed. Please try again.';
        document.getElementById('message').className = 'alert alert-error';
      }
      document.getElementById('message').style.display = 'block';
    };
    xhr.send(formData);
  });
  
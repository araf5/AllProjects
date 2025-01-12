// dashboard_script.js

function composeMessage() {
    // Load compose_mail.php content dynamically
    fetch('compose_mail.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('dashboard-content').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function viewInbox() {
    // Replace this with the actual logic to view the inbox
    document.getElementById('dashboard-content').innerHTML = 'View Inbox Section Content';
}

function logout() {
    // Replace this with the actual logic to logout
    // Send a request to the server to logout
    fetch('user_logout.php', {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the main index page
            window.location.href = 'main_index.html';
        } else {
            alert('Logout failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function validateForm() {
        // Basic validation to check if "To" and "From" are different
        var fromField = document.getElementById("from");
        var toField = document.getElementById("to");
        var errorMessage = document.getElementById("error-message");

        if (fromField.value === toField.value) {
            errorMessage.innerHTML = "To field must be different from From field.";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
    }

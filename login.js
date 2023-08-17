$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var username = $("#username").val();
        var password = $("#password").val();

        // Send login data to the server
        $.ajax({
            method: "POST",
            url: "login.php", // Replace with the actual URL to your PHP login script
            data: { username: username, password: password },
            success: function(response) {
                if (response.success) {
                    // User successfully logged in, redirect to index.php
                    window.location.href = "index.php";
                } else {
                    // Show an error message
                    alert("Login failed: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("Login error:", error);
                alert("An error occurred while logging in.");
            }
        });
    });
});

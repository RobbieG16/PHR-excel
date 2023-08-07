// Function to open the modal dialog
function openModalOnLoad() {
    const modal = document.getElementById("userDetailsModal");
    modal.style.display = "block";
}

// Function to close the modal dialog
function closeModal() {
    const modal = document.getElementById("userDetailsModal");
    modal.style.display = "none";
}

// Attach event listener to the document for DOMContentLoaded event
document.addEventListener("DOMContentLoaded", openModalOnLoad);

// Function to send user details to the backend for saving in the database
function saveUserToDatabase(username, avatar, color) {
    // Create an object to hold the user details
    const userDetails = {
        username: username,
        avatar: avatar,
        color: color
    };

    // Send a POST request to the PHP file on the server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_user_details.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                // The user details were saved successfully
                console.log("User details saved in the database.");
                closeModal(); // Close the modal after saving
            } else {
                // There was an error saving the user details
                console.error("Error saving user details:", response.error);
                // Display the error as a pop-up using the built-in alert function
                alert("Error: " + response.error);
            }
        } else {
            console.error("AJAX error:", xhr.statusText);
            displayError("An error occurred while saving user details.");
        }
    };
    
    xhr.onerror = function() {
        console.error("AJAX error:", xhr.statusText);
        displayError("An error occurred while saving user details.");
    };
    
    xhr.send(JSON.stringify(userDetails));
}

// Function to save user details and update focus color
function saveUserDetails() {
    const username = document.getElementById("username").value;
    const avatar = document.querySelector("input[name='avatar']:checked").value;
    const color = document.querySelector("input[name='color']:checked").value;

    // Update the focus color of editable cells
    const editableCells = document.querySelectorAll("td[contenteditable='true']");
    for (const cell of editableCells) {
        cell.style.outlineColor = color;
    }

    // Display selected avatar and color in the user-info section
    const userAvatar = document.getElementById("userAvatar");
    userAvatar.src = "avatars/" + avatar + ".jpg";
    userAvatar.style.border = "3px solid " + color;

    // AJAX request to send user details to the server
    saveUserToDatabase(username, avatar, color);
    
    // Disable the selected color in the color picker
    const colorRadios = document.querySelectorAll("input[name='color']");
    for (const radio of colorRadios) {
        if (radio.value === color) {
            radio.disabled = true;
        }
    }
}

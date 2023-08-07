// Define a function to open the modal
function openModalOnLoad() {
    $("#userDetailsModal").modal("show");
}

// Attach event listener to the document for DOMContentLoaded event
document.addEventListener("DOMContentLoaded", openModalOnLoad);


// Define an array to keep track of the available colors    
const availableColors = ["#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#FF00FF", "#00FFFF", "#FFA500", "#800080", "#008000", "#800000", "#008080", "#000080", "#FFC0CB", "#FFD700", "#A52A2A"];

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
    userAvatar.src = "avatars/" + avatar + ".jpg"; // Set the source of the selected avatar image
    userAvatar.style.border = "3px solid " + color; // Set the border color of the user avatar    

    // AJAX request to send user details to the server
    saveUserToDatabase(username, avatar, color);



    // Function to send user details to the backend for saving in the database
function saveUserToDatabase(username, avatar, color) {
    // Create an object to hold the user details
    const userDetails = {
        username: username,
        avatar: avatar,
        color: color
    };

    // Send a POST request to the PHP file on the server
    $.ajax({
        type: "POST",
        url: "save_user_details.php", // Replace with the actual URL to your PHP file
        data: userDetails,
        dataType: "json",
        success: function(response) {
            // Check the response from the server for any errors or success messages
            if (response.success) {
                // The user details were saved successfully
                console.log("User details saved in the database.");
                $("#userDetailsModal").modal("hide");
            } else {
                // There was an error saving the user details
                console.error("Error saving user details:", response.error);
                // Display the error as a pop-up using the built-in alert function
                alert("Error: " + response.error);
            }
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request
            console.error("AJAX error:", error);
            displayError("An error occurred while saving user details."); // Display a generic error message
        
        }
        
    });
}
    // Function to display the error message in the modal
    function displayError(errorMessage) {
    const errorBox = document.getElementById("errorBox");
    errorBox.innerText = errorMessage;
    errorBox.style.display = "block";
}

    // Disable the selected color in the color picker
    const colorRadios = document.querySelectorAll("input[name='color']");
    for (const radio of colorRadios) {
        if (radio.value === color) {
            radio.disabled = true;
        }
    }

    // // AJAX request to send user details to the server
    // $.ajax({
    //     type: "POST",
    //     url: "conn.php", // Replace with the actual URL of the PHP file
    //     data: {
    //         username: username,
    //         avatar: avatar,
    //         color: color,
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //         if (response.success) {
    //             // User details saved successfully, close the modal dialog
    //             $("#userDetailsModal").modal("hide");
    //         } else {
    //             // Error occurred, display the error message (e.g., Avatar already assigned)
    //             alert("Error: " + response.error);
    //         }
    //     },
    //     error: function () {
    //         // Error occurred, display a generic error message
    //         alert("An error occurred while saving user details.");
    //     }
    // });

    // Close the modal dialog after saving
    $("#userDetailsModal").modal("hide");
}


// Function to add a new row to the table
function addRow() {
    const table = document.getElementById("myTable");
    const newRow = table.insertRow();

    const indexCell = newRow.insertCell();
    indexCell.innerText = table.rows.length - 1; // Display the row number
    indexCell.style.fontWeight = "bold"; // Make the cell bold
    indexCell.style.pointerEvents = "none"; // Disable editing

    for (let i = 0; i < 13; i++) {
        const cell = newRow.insertCell();
        cell.contentEditable = true;
        cell.addEventListener("input", handleInput);
    }

    updateRowNumbers(); // Update row numbers after adding a new row
}

// Function to check if a row is empty (all cells, except the first one, are empty)
function isRowEmpty(row) {
    for (let i = 1; i < row.cells.length; i++) {
        if (row.cells[i].innerText.trim() !== "") {
            return false;
        }
    }
    return true;
}

// Function to handle input in cells and add new rows as needed
function handleInput(event) {
    const table = document.getElementById("myTable");
    const rows = table.getElementsByTagName("tr");

    // If the row has content, add a new row
    if (!isRowEmpty(event.target.parentNode)) {
        addRow();
    }

    // Remove extra rows if there are more than 50 empty rows
    const emptyRows = Array.from(rows).filter((row) => isRowEmpty(row));
    if (emptyRows.length > 50) {
        emptyRows.slice(50).forEach((row) => row.remove());
    }

    updateRowNumbers(); // Update row numbers after handling input
}

// Function to update the row numbers in the first column
function updateRowNumbers() {
    const table = document.getElementById("myTable");
    const rows = table.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        rows[i].cells[0].innerText = i;
    }
}

// Initially add 50 empty rows
for (let i = 0; i < 50; i++) {
    addRow();
}


// Attach event listener to the color picker to enable/disable color options
document.querySelectorAll("input[name='color']").forEach((radio) => {
    radio.addEventListener("change", () => {
        const selectedColor = document.querySelector("input[name='color']:checked").value;
        const colorRadios = document.querySelectorAll("input[name='color']");

        // Enable all color options
        colorRadios.forEach((radio) => {
            radio.disabled = false;
        });

        // Disable the selected color to prevent others from choosing it
        const index = availableColors.indexOf(selectedColor);
        if (index !== -1) {
            availableColors.splice(index, 1);
        }

        // Disable the already chosen colors
        for (const radio of colorRadios) {
            if (availableColors.indexOf(radio.value) === -1) {
                radio.disabled = true;
            }
        }
    });
});
<?php
// Include this at the top of your PHP file
session_start();
$userLoggedIn = isset($_SESSION["userLoggedIn"]) && $_SESSION["userLoggedIn"] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHR - Excel</title>
    <script src="custom_table_edit.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    // Function to update the table content with fetched data
    function updateTable(data) {
        var tableBody = document.getElementById("data_table").getElementsByTagName("tbody")[0];
        tableBody.innerHTML = ""; // Clear the existing table rows

        // Iterate through the fetched data and create new table rows
        for (var i = 0; i < data.length; i++) {
            var row = tableBody.insertRow();

            // Iterate through the columns in each row and add cells
            for (var j = 0; j < data[i].length; j++) {
                var cell = row.insertCell(j);
                cell.innerHTML = data[i][j];
                
            }
        }
    }

    // Function to fetch updated data from the server
    function fetchUpdatedData() {
        $.ajax({
            type: "GET",
            url: "get_updated_data.php", // Replace with the actual URL to your PHP file
            dataType: "json",
            success: function(response) {
                updateTable(response); // Call the updateTable function with fetched data
            },
            error: function(xhr, status, error) {
                console.error("Error fetching updated data:", error);
            }
        });
    }

    // Set the refresh interval in milliseconds (e.g., 5000ms for 5 seconds)
    const refreshInterval = 5000; // 5 seconds

    // Call the fetchUpdatedData function at the specified interval
    setInterval(fetchUpdatedData, refreshInterval);
</script>

    <style>
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 40px;
        }
        .user-info {
            position: absolute;
            top: 10px;
            left: 10px;
            height: 40px;
        }
    </style>
    
</head>

<body>
    <div class="user-info">
    <!-- Display the assigned avatar here -->
    <img src="<?php echo $assignedAvatar; ?>" alt="User Avatar" style="max-width: 40px; max-height: 40px;">
    </div>
    <?php
        // Check if the user is logged in
        if (!isset($_SESSION["username"])) {
            header("Location: login.php");
            exit;
        }

        $username = $_SESSION["username"];
        $assignedAvatar = $_SESSION["avatar"];
        $assignedColor = $_SESSION["color"];
        // $username = $_SESSION["username"];
    ?>
    <h1>Welcome, <?php echo $username, $assignedAvatar, $assignedColor?></h1>
    
<div id="updates"></div>
<script>
        const updatesDiv = document.getElementById("updates");
        const eventSource = new EventSource("server_events.php");

        eventSource.onmessage = function(event) {
            const message = JSON.parse(event.data);
            updatesDiv.innerHTML = `<p>New update: ${message.text}</p>` + updatesDiv.innerHTML;
        };
    </script>
    <div class="user-info">
    <!-- Display the assigned avatar here -->
    <img src="<?php echo $assignedAvatar; ?>" alt="User Avatar" style="max-width: 40px; max-height: 40px;">
    </div>
<?php 
include_once("db_connect.php");
include("header.php"); 
// Fetch column names from the 'developers' table
$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$column_names = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') { // Exclude the 'id' column
        $column_names[] = $column['Field'];
    }
}
?>
<title>Excel</title>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container-fluid home m-5">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">USER</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userDetailsForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" value="<?php echo $username; ?>" readonly>

                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <div class="avatar-options">
                                    <label>
                                        <input type="radio" name="avatar" value="1">
                                        <img src="avatars/1.jpg" alt="Avatar 1" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="2">
                                        <img src="avatars/2.jpg" alt="Avatar 2" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="3">
                                        <img src="avatars/3.jpg" alt="Avatar 3"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="4">
                                        <img src="avatars/4.jpg" alt="Avatar 4"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="5">
                                        <img src="avatars/5.jpg" alt="Avatar 5" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="6">
                                        <img src="avatars/6.jpg" alt="Avatar 6" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="7">
                                        <img src="avatars/7.jpg" alt="Avatar 7"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="8">
                                        <img src="avatars/8.jpg" alt="Avatar 8"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="9">
                                        <img src="avatars/9.jpg" alt="Avatar 9" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="10">
                                        <img src="avatars/10.jpg" alt="Avatar 10" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="11">
                                        <img src="avatars/11.jpg" alt="Avatar 11"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="12">
                                        <img src="avatars/12.jpg" alt="Avatar 12"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="13">
                                        <img src="avatars/13.jpg" alt="Avatar 13" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="14">
                                        <img src="avatars/14.jpg" alt="Avatar 14" style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="15">
                                        <img src="avatars/15.jpg" alt="Avatar 15"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                    <label>
                                        <input type="radio" name="avatar" value="16">
                                        <img src="avatars/16.jpg" alt="Avatar 16"  style="max-width: 40px; max-height: 40px;">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="color">Choose Color:</label>
                                <div class="color-picker">
                                    <label>
                                        <input type="radio" name="color" value="#FF0000">
                                        <span class="color-sample" style="background-color: #FF0000;"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="#00FF00">
                                        <span class="color-sample" style="background-color: #00FF00;"></span>
                                    </label>
                                    <label>
                            <input type="radio" name="color" value="#0000FF">
                            <span class="color-sample" style="background-color: #0000FF;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFFF00">
                            <span class="color-sample" style="background-color: #FFFF00;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FF00FF">
                            <span class="color-sample" style="background-color: #FF00FF;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#00FFFF">
                            <span class="color-sample" style="background-color: #00FFFF;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFA500">
                            <span class="color-sample" style="background-color: #FFA500;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#800080">
                            <span class="color-sample" style="background-color: #800080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#008000">
                            <span class="color-sample" style="background-color: #008000;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#800000">
                            <span class="color-sample" style="background-color: #800000;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#008080">
                            <span class="color-sample" style="background-color: #008080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#000080">
                            <span class="color-sample" style="background-color: #000080;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFC0CB">
                            <span class="color-sample" style="background-color: #FFC0CB;"></span>
                        </label>
                        <label>
                            <input type="radio" name="color" value="#FFD700">
                            <span class="color-sample" style="background-color: #FFD700;"></span>
                        </label>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="messageBox" style="display: none;"></div>
                        </form>
                        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveUserDetails()" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    // Define selectedUserDetails with actual values
    const selectedUserDetails = {
        avatar: "Avatar 1", // Fetch the current avatar value here
        color: "#FF0000"   // Fetch the current color value here
    };

    // Disable the selected avatar and color in the color picker and avatar options
    function disableSelectedOptions() {
        const selectedAvatar = selectedUserDetails.avatar;
        const selectedColor = selectedUserDetails.color;

        const avatarRadios = document.querySelectorAll("input[name='avatar']");
        for (const radio of avatarRadios) {
            if (radio.value === selectedAvatar) {
                radio.disabled = true;
            }
        }

        const colorRadios = document.querySelectorAll("input[name='color']");
        for (const radio of colorRadios) {
            if (radio.value === selectedColor) {
                radio.disabled = true;
            }
        }
    }

    // Attach the disableSelectedOptions function to the modal's shown.bs.modal event
    $('#myModal').on('shown.bs.modal', function () {
        disableSelectedOptions();
    });
</script>


<script>
function displayMessage(message) {
    const messageBox = document.getElementById("messageBox");
    if (messageBox){
    messageBox.innerText = message;
    messageBox.style.display = "block";
    }
}

// Function to save user details and update UI elements
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

    // Send user details to the server for saving
    saveUserToDatabase(username, avatar, color);

    // Close the modal dialog after saving
    $("#userDetailsModal").modal("hide");
}

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
        method: "POST",
        url: "save_user_details.php", // Replace with the actual URL to your PHP file
        dataType: "json",
        data: userDetails,
        success: function(response) {
            // Check the response from the server for any errors or success messages
            if (response.success) {
                console.log("User details saved in the database.");
                $("#userDetailsModal").modal("hide");
            } else {
                console.error("Error saving user details:", response.error);
                displayMessage("Error: " + response.error);
            }
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request
            console.error("AJAX error:", error);
            displayMessage("An error occurred while saving user details.");
        }
    });
}



function logout() {
    // Send a request to the server to destroy the user's session
    $.ajax({
        method: "POST",
        url: "logout.php", // Replace with the actual URL to your PHP file for logout
        dataType: "json",
        success: function(response) {
            if (response.success) {
                // Logout successful
                console.log("User logged out.");
                // Optionally, redirect the user to the login page
                window.location.href = "login1.php";
            } else {
                console.error("Logout error:", response.error);
                displayError("Logout failed: " + response.error);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            displayError("An error occurred while logging out.");
        }
    });
}


</script>
    <div class="container">
        <div class="card p-5">
            <div class="row">
                <div class="col-3">
                    <form action="insert_null_rows.php" method="post">
                        <div class="form-group">
                            <label for="num_rows" class="mb-2">Number of Rows to Insert:</label>
                            <input type="number" class="form-control mb-2" id="num_rows" name="num_rows" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Rows</button>
                    </form>
                </div>
            
                <div class="col-3">
                    <form id="addColumnForm">
                        <div class="form-group">
                            <label for="newColumnName" class="mb-2">New Column Name:</label>
                            <input type="text" class="form-control mb-2" id="newColumnName" name="newColumnName" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-layout-three-columns"></i> Add Column</button>
                    </form>
                </div>
                
                <!-- <div class="col-3">
                    <form action="reset.php" method="post" class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i> Reset Table</button>
                    </form>
                </div>

                <div class="col-3">
                    <form action="reset.php" method="post" class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-download"></i> Export</button>
                    </form>
                </div> -->
                <br><br></br>
                <div class ="col-3">
                    <form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">User modal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	<div class="user-info" style="height: 40px">
            <div class="avatar-container" >
                <img id="userAvatar" src="" alt="" title="This is sample user">
            </div>
            
        </div>
    <!-- <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">> -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                <form>
                    <div class="form-group">
                        <label for="loginUsername">Username:</label>
                        <input type="text" class="form-control" id="loginUsername" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password:</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="login()">Login</button>
            </div>
            <div id="loginError" class="error-message" style="display: none;"></div>
            <div id="loginSuccessMessage" class="success-message"></div>
        </div>
    </div>
</div>
<!-- Add a button to trigger the login modal -->
<div class="logout" style="height: 40px">
    <?php if (!$userLoggedIn) { ?>
        <button type="button" class="btn btn-primary" onclick="logout()">
        Logout
        </button>

    <?php } else { ?>
        <div class="avatar-container">
            <img id="userAvatar" src="" alt="" title="This is sample user">
        </div>
    <?php } ?>
</div>
	<table id="data_table" class="table table-striped table-bordered table-hover mt-5">
		<thead>
			<tr class="text-center">
			<th style="background-color: #00FFFF;">#</th>
            <?php
            foreach ($column_names as $column_name) {
                echo '<th contenteditable="true" style="background-color: #00000;">' . $column_name . '</th>';
            }
            ?>
			</tr>
		</thead>
		<tbody>
        <?php 
    $sql_query = "SELECT * FROM developers";
    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    $row_number = 1; // Initialize row number
    while ($developer = mysqli_fetch_assoc($resultset)) {
    ?>
        <tr style="height: 55px;">
            <td><?php echo $row_number++; ?></td> <!-- Display row number -->
            <?php
            foreach ($column_names as $column_name) {
                if ($column_name !== 'id') { // Exclude the 'id' column
                    echo '<td>' . $developer[$column_name] . '</td>';
                }
            }
            ?>
        </tr>
    <?php } ?>
		</tbody>
    </table>	
	<form id="developerForm">
        <!-- Input fields for developer data -->
        <!-- Add appropriate input fields for app_status, jobseeker_fname, etc. -->
        <button type="button" id="insertButton" class="btn btn-primary"><i class="bi bi-plus-square"></i> Insert Row</button>
    </form>
</div>
<script>
	$(document).ready(function () {
    $("#insertButton").on("click", function () {
        // Get the column names from the table header
        var columnNames = [];
        $("#data_table th").each(function () {
            if ($(this).text() !== "#") { // Exclude the first column
                columnNames.push($(this).text());
            }
        });

        // Create an object with the input values
        var formData = {};
        columnNames.forEach(function (columnName) {
            formData[columnName] = $("#" + columnName).val();
        });

        // Send the data to the back-end PHP file using AJAX
        $.ajax({
            type: "POST",
            url: "insert_developer.php",
            data: { data: formData },
            success: function (response) {
                console.log(response);
                window.location.reload();
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + error);
            },
        });
    });
});

$(document).ready(function () {
    $("th[contenteditable='true']").on("blur", function () {
        var newHeaderValue = $(this).text(); // Get the modified header value
        var columnHeaderIndex = $(this).index(); // Get the index of the modified header

        // Send the updated header value and index to the server using AJAX
        $.ajax({
            type: "POST",
            url: "update_header.php", // Replace with the actual PHP file name and path
            data: {
                newHeaderValue: newHeaderValue,
                columnHeaderIndex: columnHeaderIndex,
            },
            success: function (response) {
                // Handle success, such as updating the UI if needed
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + error);
            },
        });
    });
});

$(document).ready(function() {
    // Fetch user avatars from the server
    $.ajax({
        type: "GET",
        url: "get_all_user_avatars.php", // Replace with the actual server-side endpoint
        success: function(response) {
            console.log(response);
            const avatarContainer = document.querySelector('.avatar-container');

            // Loop through the response to create and add avatar images
            response.forEach(user => {
                const avatarImage = document.createElement('img');
                avatarImage.src = 'avatars/' + user.avatar + '.jpg';
                avatarImage.alt = 'User Avatar';
                avatarImage.style.maxWidth = '40px';
                avatarImage.style.maxHeight = '40px';
                avatarImage.style.margin = '2px';
                avatarImage.style.border = '1px solid #000';
                avatarContainer.appendChild(avatarImage);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error fetching user avatars:", error);
        }
    });
});
</script>

<script>
    $(document).ready(function () {
    document.getElementById('addColumnForm').addEventListener('submit', function(event) {
        event.preventDefault();

    const newColumnName = document.getElementById('newColumnName').value;

    // Call a PHP script to insert the column into the database
    insertColumnToDatabase(newColumnName);
});

function insertColumnToDatabase(columnName) {
    // Make an AJAX request to a PHP script to handle the database insertion
    $.ajax({
        type: 'POST',
        url: 'insert_column.php', // Replace with the actual PHP file name and path
        data: { columnName: columnName },
        success: function (response) {
            // Update the table in the UI
            var table = $('#data_table');

            // Add the new header to the table header row
            var th = $('<th>').text(columnName).attr('contenteditable', 'true'); // Make the header editable
            table.find('thead tr').append(th);

            // Add a cell for the new column in each row
            table.find('tbody tr').each(function () {
                $(this).append('<td contenteditable="true"></td>');
            });

            // Show the response from the server (success message or error)
            alert(response);
        },
        error: function (xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
}
});

</script>

<style>
.color-sample {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 1px solid #000;
    margin: 2px;
}</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<?php include('footer.php');?>
<script>
    // Use vanilla JavaScript to show the user modal on page load
    document.addEventListener("DOMContentLoaded", function() {
        var exampleModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        exampleModal.show();
    });
</script>
<script>
    const ws = new WebSocket("ws://localhost: 5500");

    ws.addEventListener("open". () => {
        console.log("We are connected!");
    });

</script>
</body>
</html>
<?php
session_start();
$userLoggedIn = isset($_SESSION["userLoggedIn"]) && $_SESSION["userLoggedIn"] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHR - Excel</title>
    <script src="custom_table_edit.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    function updateTable(data) {
        var tableBody = document.getElementById("data_table").getElementsByTagName("tbody")[0];
        tableBody.innerHTML = "";


        for (var i = 0; i < data.length; i++) {
            var row = tableBody.insertRow();


            for (var j = 0; j < data[i].length; j++) {
                var cell = row.insertCell(j);
                cell.innerHTML = data[i][j];
                
            }
        }
    }


    function fetchUpdatedData() {
        $.ajax({
            type: "GET",
            url: "get_updated_data.php",
            dataType: "json",
            success: function(response) {
                updateTable(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching updated data:", error);
            }
        });
    }

    const refreshInterval = 5000;


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
    
    <?php
        
        if (!isset($_SESSION["username"])) {
            header("Location: login.php");
            exit;
        }

        $username = $_SESSION["username"];

    ?>
    <h1>Welcome, <?php echo $username?></h1>
    
    <div class="user-info" style="height: 40px" >
            <div class="avatar-container" style="display: inline-block;">
                <img id="userAvatar" img src="<?php echo $assignedAvatar; ?>" alt="" title="<?php echo $_SESSION["username"];?>" style="max-width: 40px; max-height: 40px; border: 3px solid #FFFF00;">
            </div>
            
        </div>
    <?php
         include_once("db_connect.php");
            $query = "SELECT avatar, color FROM users";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $avatar = $row['avatar'];
                $color = $row['color'];

                echo '<img src="avatars/' . $avatar . '.jpg" alt="User Avatar" style="max-width: 40px; max-height: 40px; border: 3px solid ' . $color . ';">';
            }
    ?>
    </div>

<?php 
include_once("db_connect.php");
include("header.php"); 
$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$column_names = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') {
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
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" value="<?php echo $_SESSION["username"]; ?>" readonly>

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

function saveUserDetails() {
    const username = document.getElementById("username").value;
    const avatar = document.querySelector("input[name='avatar']:checked").value;
    const color = document.querySelector("input[name='color']:checked").value;



    const userAvatar = document.getElementById("userAvatar");
    userAvatar.src = "avatars/" + avatar + ".jpg";
    userAvatar.style.border = "3px solid " + color;

    saveUserToDatabase(username, avatar, color);

    $("#userDetailsModal").modal("hide");
    location.reload();
}

function saveUserToDatabase(username, avatar, color) {
    const userDetails = {
        username: username,
        avatar: avatar,
        color: color
    };

    $.ajax({
        method: "POST",
        url: "save_user_details.php",
        dataType: "json",
        data: userDetails,
        success: function(response) {
            if (response.success) {
                console.log("User details saved in the database.");
                $("#userDetailsModal").modal("hide");
            } else {
                console.error("Error saving user details:", response.error);
                displayMessage("Error: " + response.error);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            displayMessage("An error occurred while saving user details.");
        }
    });
}



function logout() {
    $.ajax({
        method: "POST",
        url: "logout.php",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                console.log("User logged out.");
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

                <br><br></br>
                <div class ="col-3">
                    <form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">User modal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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
<div class="logout" style="height: 40px">
    <?php if (!$userLoggedIn) { ?>
        <button type="button" class="btn btn-primary" onclick="logout()">
            Logout
        </button>
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
    $row_number = 1;
    while ($developer = mysqli_fetch_assoc($resultset)) {
    ?>
        <tr style="height: 55px;">
            <td><?php echo $row_number++; ?></td>
            <?php
            foreach ($column_names as $column_name) {
                if ($column_name !== 'id') {
                    echo '<td>' . $developer[$column_name] . '</td>';
                }
            }
            ?>
        </tr>
    <?php } ?>
		</tbody>
        </table>
	<form id="developerForm">
        <button type="button" id="insertButton" class="btn btn-primary"><i class="bi bi-plus-square"></i> Insert Row</button>
    </form>
</div>
<script>
	$(document).ready(function () {
    $("#insertButton").on("click", function () {
        var columnNames = [];
        $("#data_table th").each(function () {
            if ($(this).text() !== "#") {
                columnNames.push($(this).text());
            }
        });
        var formData = {};
        columnNames.forEach(function (columnName) {
            formData[columnName] = $("#" + columnName).val();
        });
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
        var newHeaderValue = $(this).text();
        var columnHeaderIndex = $(this).index();
        $.ajax({
            type: "POST",
            url: "update_header.php",
            data: {
                newHeaderValue: newHeaderValue,
                columnHeaderIndex: columnHeaderIndex,
            },
            success: function (response) {
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + error);
            },
        });
    });
});

$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "get_all_user_avatars.php",
        success: function(response) {
            console.log(response);
            const avatarContainer = document.querySelector('.avatar-container');

            
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
    insertColumnToDatabase(newColumnName);
});

function insertColumnToDatabase(columnName) {
    $.ajax({
        type: 'POST',
        url: 'insert_column.php',
        data: { columnName: columnName },
        success: function (response) {
            var table = $('#data_table');
            var th = $('<th>').text(columnName).attr('contenteditable', 'true'); // Make the header editable
            table.find('thead tr').append(th);
            table.find('tbody tr').each(function () {
                $(this).append('<td contenteditable="true"></td>');
            });
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

<script>
    const ws = new WebSocket("ws://localhost: 5500");

    ws.addEventListener("open". () => {
        console.log("We are connected!");
    });

</script>
<script>
    function verifyUser() {
        <?php if ($row) { ?>
            <?php
            $username = $row["username"];
            $userQuery = "SELECT avatar, color FROM users WHERE username = ?";
            $stmtUser = $conn->prepare($userQuery);
            $stmtUser->bind_param("s", $username);
            $stmtUser->execute();
            $userResult = $stmtUser->get_result();

            if ($userResult->num_rows > 0) {
                $userRow = $userResult->fetch_assoc();
                $avatar = $userRow["avatar"];
                $color = $userRow["color"];
                ?>
                <?php $_SESSION["username"] = $username; ?>
                <?php $_SESSION["avatar"] = $avatar; ?>
                <?php $_SESSION["color"] = $color; ?>
                var userColor = "<?php echo $color; ?>";
            <?php }
            else { ?>
                var exampleModal = new bootstrap.Modal(document.getElementById("exampleModal"));
                exampleModal.show();
            <?php } ?>
        <?php } ?>
    }
    
    window.addEventListener('load', verifyUser);
</script>

<div class="insert-post-ads1" style="margin-top:20px;"></div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHR - Excel</title>
</head>
<body>
<?php 
include_once("db_connect.php");
include("header.php"); 
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid home m-5">
    
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
                
                <div class="col-3">
                    <form action="reset.php" method="post" class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i> Reset Table</button>
                    </form>
                </div>

                <div class="col-3">
                    <form action="reset.php" method="post" class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-download"></i> Export</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>    <br>

    <div class="user-info" >
            <div class="avatar-container" style="height: 40px">
                <img id="userAvatar" src="" alt="" title="This is sample user">
            </div>
            
        </div>
	
	<table id="data_table" class="table table-striped table-bordered table-hover mt-5">
		<thead>
			<tr class="text-center">
				<th>#</th>
				<th>App Status</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Jobtitle</th>
				<th>Jobtitle2</th>
        	    <th>Contact</th>
        	    <th>Contact2</th>
        	    <th>Address</th>
        	    <th>Email</th>
        	    <th>Passport</th>
        	    <th>Exp_years</th>
        	    <th>Eligibility</th>
        	    <th>Skype</th>
				<th>Date Encoded</th>
        	    <th>Recruiter</th>
                <!-- for another add of column -->
        	    <th>test</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT * FROM developers";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			
			   <tr id="<?php echo $developer ['id']; ?>" style="height: 55px;">
			   <td><?php echo $developer ['id']; ?></td>
			   <td><?php echo $developer ['app_status']; ?></td>
			   <td><?php echo $developer ['jobseeker_fname']; ?></td>
			   <td><?php echo $developer ['jobseeker_mname']; ?></td>   
			   <td><?php echo $developer ['jobseeker_lname']; ?></td>
			   <td><?php echo $developer ['jobtitle']; ?></td>  
			   <td><?php echo $developer ['jobtitle2']; ?></td>
			   <td><?php echo $developer ['contact']; ?></td>
			   <td><?php echo $developer ['contact2']; ?></td>
			   <td><?php echo $developer ['address']; ?></td>   
			   <td><?php echo $developer ['email']; ?></td>
			   <td><?php echo $developer ['passport']; ?></td>   
			   <td><?php echo $developer ['exp_years']; ?></td>   
			   <td><?php echo $developer ['eligibility']; ?></td>   
			   <td><?php echo $developer ['skype_id']; ?></td>   
			   <td><?php echo $developer ['date_encoded']; ?></td>   
			   <td><?php echo $developer ['recruiter']; ?></td>  
               <!-- // for another add of column -->
               <td><?php echo $developer ['testing']; ?></td>   
			   </tr>
			<?php } ?>
		</tbody>
    </table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userDetailsModal">
            Open User Details
        </button>
        <!-- Modal dialog for user details -->
        <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userDetailsModalLabel">Enter User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- User details form -->
                        <form id="userDetailsForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <div class="avatar-options">
                                    <!-- Add image options for avatar selection -->
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
                                    <!-- Add more image options as needed -->
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="color">Choose Color:</label>
                                <div class="color-picker">
                                    <!-- Add 15 color options in the modal color picker -->
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
                        <!-- Add more color options as needed -->
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
                            <div class="alert alert-danger" id="errorBox" style="display: none;"></div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveUserDetails()">Save</button>
                    </div>
                </div>
            </div>
            </div>
	<form id="developerForm">
        <!-- Input fields for developer data -->
        <!-- Add appropriate input fields for app_status, jobseeker_fname, etc. -->
        <button type="button" id="insertButton" class="btn btn-primary"><i class="bi bi-plus-square"></i> Insert Row</button>
    </form>
</div>
        <!-- Modal dialog for user details -->
        <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userDetailsModalLabel">Enter User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- User details form -->
                        <form id="userDetailsForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <div class="avatar-options">
                                    <!-- Add image options for avatar selection -->
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
                                    <!-- Add more image options as needed -->
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="color">Choose Color:</label>
                                <div class="color-picker">
                                    <!-- Add 15 color options in the modal color picker -->
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
                        <!-- Add more color options as needed -->
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
                            <div class="alert alert-danger" id="errorBox" style="display: none;"></div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>



<script>
  document.getElementById('addColumnForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const newColumnName = document.getElementById('newColumnName').value;

    // Call a PHP script to insert the column into the database
    insertColumnToDatabase(newColumnName);
  });

  function insertColumnToDatabase(columnName) {
    // Make an AJAX request to a PHP script to handle the database insertion
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert_column.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert(xhr.responseText); // Show the response from the server (success message or error)
        } else {
          alert('Error: ' + xhr.status);
        }
      }
    };

    xhr.send('columnName=' + encodeURIComponent(columnName));
  }
</script>
<script src="saveuser.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php include('footer.php');?>
 
</body>
</html>


                                                                                                       
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
<title>Excel</title>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container-fluid home m-5">		 
	
	<form action="insert_null_rows.php" method="post">
        Number of Rows to Insert: <input type="number" name="num_rows" min="1" required>
        <input type="submit" value="Insert Rows" class="btn btn-primary">
    </form>
    <form id="addColumnForm">
        <label for="newColumnName">New Column Name:</label>
        <input type="text" id="newColumnName" name="newColumnName" required>
        <button type="submit" id="addColumnBtn" class="btn btn-primary">Add Column</button>
    </form>

    <form action="reset.php" method="post">
        <input type="submit" value="Reset All Values" class="btn btn-primary">
    </form>
	<table id="data_table" class="table table-striped table-bordered">
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
	<form id="developerForm">
        <!-- Input fields for developer data -->
        <!-- Add appropriate input fields for app_status, jobseeker_fname, etc. -->
        <button type="button" id="insertButton" class="btn btn-primary">Insert Row</button>
    </form>
</div>
<script>
	$(document).ready(function () {
    $("#insertButton").on("click", function () {
        // Get the data from the input fields (You can use other methods like getElementById or querySelector)
        var app_status = $("#app_status").val();
        var jobseeker_fname = $("#jobseeker_fname").val();
        var jobseeker_mname = $("#jobseeker_mname").val();
		var jobseeker_lname = $("#jobseeker_lname").val();
        var jobtitle = $("#jobtitle").val();
        var jobtitle2 = $("#jobtitle2").val();
		var contact = $("#contact").val();
        var contact2 = $("#contact2").val();
        var address = $("#address").val();
		var email = $("#email").val();
        var passport = $("#passport").val();
        var exp_years = $("#exp_years").val();
		var eligibility = $("#eligibility").val();
        var skype_id = $("#skype_id").val();
        var date_encoded = $("#date_encoded").val();
		var recruiter = $("#recruiter").val();
        // Add more variables for other input fields

        // Create an object with the data
        var formData = {
            app_status: app_status,
            jobseeker_fname: jobseeker_fname,
            jobseeker_mname: jobseeker_mname,
			jobseeker_lname: jobseeker_lname,
            jobtitle: jobtitle,
            jobtitle2: jobtitle2,
			contact: contact,
            contact2: contact2,
            address: address,
			email: email,
            passport: passport,
            exp_years: exp_years,
			eligibility: eligibility,
            skype_id: skype_id,
            date_encoded: date_encoded,
            recruiter: recruiter,
            // Add more properties for other input fields
        };

        // Send the data to the back-end PHP file using AJAX
        $.ajax({
            type: "POST",
            url: "insert_developer.php", // Replace with the actual PHP file name and path
            data: formData,
            success: function (response) {
                alert("Data inserted successfully!");
				window.location.reload();
                // You can handle the response here if needed
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + error);
            },
        });
    });
});

</script>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php include('footer.php');?>
 
</body>
</html>


                                                                                                       
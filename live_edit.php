

<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['app_status'])) {
		$update_field.= "app_status='".$input['app_status']."'";
	} else if(isset($input['jobseeker_fname'])) {
		$update_field.= "jobseeker_fname='".$input['jobseeker_fname']."'";
	} else if(isset($input['jobseeker_mname'])) {
		$update_field.= "jobseeker_mname='".$input['jobseeker_mname']."'";
	} else if(isset($input['jobseeker_lname'])) {
		$update_field.= "jobseeker_lname='".$input['jobseeker_lname']."'";
	} else if(isset($input['jobtitle'])) {
		$update_field.= "jobtitle='".$input['jobtitle']."'";
	} else if(isset($input['jobtitle2'])) {
		$update_field.= "jobtitle2='".$input['jobtitle2']."'";
	} else if(isset($input['contact'])) {
		$update_field.= "contact='".$input['contact']."'";
	} else if(isset($input['contact2'])) {
		$update_field.= "contact2='".$input['contact2']."'";
	} else if(isset($input['address'])) {
		$update_field.= "address='".$input['address']."'";
	} else if(isset($input['email'])) {
		$update_field.= "email='".$input['email']."'";
	} else if(isset($input['passport'])) {
		$update_field.= "passport='".$input['passport']."'";
	} else if(isset($input['exp_years'])) {
		$update_field.= "exp_years='".$input['exp_years']."'";
	} else if(isset($input['eligibility'])) {
		$update_field.= "eligibility='".$input['eligibility']."'";
	} else if(isset($input['skype_id'])) {
		$update_field.= "skype_id='".$input['skype_id']."'";
	} else if(isset($input['date_encoded'])) {
		$update_field.= "date_encoded='".$input['date_encoded']."'";
	} else if(isset($input['recruiter'])) {
		$update_field.= "recruiter='".$input['recruiter']."'";
	}	
	// for another add of column
	if($update_field && $input['id']) {
		$sql_query = "UPDATE developers SET $update_field WHERE id='" . $input['id'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}



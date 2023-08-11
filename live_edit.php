<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
    $update_fields = '';

    // Iterate through all input fields except 'action' and 'id'
    foreach ($input as $column => $value) {
        if ($column !== 'action' && $column !== 'id') {
            if ($update_fields !== '') {
                $update_fields .= ', ';
            }
            $update_fields .= $column . "='" . mysqli_real_escape_string($conn, $value) . "'";
        }
    }

    if ($update_fields && $input['id']) {
        $sql_query = "UPDATE developers SET $update_fields WHERE id='" . $input['id'] . "'";
        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    }
}
?>

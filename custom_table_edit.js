$(document).ready(function () {
  $("#data_table").Tabledit({
    deleteButton: false,
    editButton: false,
    columns: {
      identifier: [0, "id"],
      editable: [
        [1, "app_status"],
        [2, "jobseeker_fname"],
        [3, "jobseeker_mname"],
        [4, "jobseeker_lname"],
        [5, "jobtitle"],
        [6, "jobtitle2"],
        [7, "contact"],
        [8, "contact2"],
        [9, "address"],
        [10, "email"],
        [11, "passport"],
        [12, "exp_years"],
        [13, "eligibility"],
        [14, "skype_id"],
        [15, "date_encoded"],
        [16, "recruiter"],
        // for another add of column
        [17, "testing"],
      ],
    },
    hideIdentifier: false,
    url: "live_edit.php",
  });
});

$(document).ready(function () {
  // Fetch column names from PHP using AJAX
  $.ajax({
    url: "get_column_names.php",
    method: "GET",
    success: function (response) {
      var editableColumns = JSON.parse(response);

      var editableArray = [];
      for (var i = 1; i < editableColumns.length; i++) {
        editableArray.push([i, editableColumns[i]]);
      }

      console.log("Editable Columns:", editableArray);

      $("#data_table").Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
          identifier: [0, "id"],
          editable: editableArray,
          editable: editableColumns.map((col, index) => [index + 1, col]),
        },
        hideIdentifier: false,
        url: "live_edit.php",
      });
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
    }
  });
});

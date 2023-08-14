$(document).ready(function () {
  // Fetch column names from PHP using AJAX
  $.ajax({
    url: "get_column_names.php",
    method: "GET",
    success: function (response) {
      var editableColumns = JSON.parse(response);
      var editableArray = editableColumns.map((col, index) => [index + 1, col]);

      console.log("Editable Columns:", editableArray);

      $("#data_table").Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
          identifier: [0, "id"],
          editable: editableArray,
        },
        hideIdentifier: false,
        url: "live_edit.php",
        onDraw: function() {
          // Initialize a callback for when the table is redrawn after an edit
          $('#data_table').off('draw.dt').on('draw.dt', function() {
            $('#data_table').load(location.href + " #data_table"); // Refresh the table content
          });
        },
      });
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
    }
  });
});

$(document).ready(function () {
  // Event listener for header edits
  $("th[contenteditable='true']").on("input", function () {
    var newHeaderValue = $(this).text().trim();
    var columnHeaderIndex = $(this).index() -1; // Get the index of the edited header

    // Send the updated header data to the server using AJAX
    $.ajax({
      url: "update_header.php", // Your PHP script to handle header updates
      method: "POST",
      data: {
        newHeaderValue: newHeaderValue,
        columnHeaderIndex: columnHeaderIndex,
      },
      success: function (response) {
        console.log(response); // Log the server response
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", error);
      },
    });
  });
});
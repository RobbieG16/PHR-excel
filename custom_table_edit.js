$(document).ready(function () {
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
      });
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
    }
  });
  $(document).ready(function () {
    $('#data_table').on('focusin', 'td.tabledit-edit-mode input', function() {
      $(this).closest('td').css('outline', '3px solid ' + userColor);
    });
    
  $('#data_table').on('focusin', 'td[contenteditable="true"]', function() {
    $(this).css('outline', '3px solid ' + userColor);
  });

  $('#data_table').on('focusout', 'td[contenteditable="true"]', function() {
    $(this).css('outline', 'none');
  });

  $("th[contenteditable='true']").on("input", function () {
    var newHeaderValue = $(this).text().trim();
    var columnHeaderIndex = $(this).index() - 1;

    $.ajax({
      url: "update_header.php",
      method: "POST",
      data: {
        newHeaderValue: newHeaderValue,
        columnHeaderIndex: columnHeaderIndex,
      },
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", error);
      },
    });
  });
});
});
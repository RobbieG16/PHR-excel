<!-- Assuming this is your HTML code -->
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Column Addition</title>
</head>
<body>
    <table id="myTable">
        <thead>
            <tr>
                <th>Default Column 1</th>
                <th>Default Column 2</th>
                <!-- Additional columns will be added here -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <!-- Additional cells will be added here -->
            </tr>
        </tbody>
    </table>
    
    <button id="addColumn">Add Column</button>
    
    <script>
        document.getElementById('addColumn').addEventListener('click', function() {
            var newColumnName = prompt('Enter the name for the new column:');
            if (newColumnName) {
                // Make an AJAX request to the server to add the new column
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'backend.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.status === 'success') {
                                // Update the table header with the new column
                                var table = document.getElementById('myTable');
                                var headerRow = table.querySelector('thead tr');
                                var newHeaderCell = document.createElement('th');
                                newHeaderCell.textContent = newColumnName;
                                headerRow.appendChild(newHeaderCell);
                                
                                // Update each row with a new cell in the corresponding position
                                var rows = table.querySelectorAll('tbody tr');
                                rows.forEach(function(row) {
                                    var newCell = document.createElement('td');
                                    row.appendChild(newCell);
                                });
                            } else {
                                alert('An error occurred while adding the column.');
                            }
                        } else {
                            alert('An error occurred while communicating with the server.');
                        }
                    }
                };
                xhr.send('new_column_name=' + encodeURIComponent(newColumnName));
            }
        });
    </script>
</body>
</html>

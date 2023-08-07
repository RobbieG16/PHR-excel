const table = document.getElementById("dynamicTable");
const columnNames = ["#", "Name", "Job", "Address", "Age", "Exp", "Coder"];

// Function to add column titles dynamically
function addColumnTitles(table, columnNames) {
  const headerRow = document.createElement("tr");
  columnNames.forEach((columnName) => {
    const th = document.createElement("th");
    th.textContent = columnName;
    th.style.backgroundColor = "blue";
    th.style.color = "white";
    th.style.padding = "12px";
    headerRow.appendChild(th);
  });
  table.appendChild(headerRow);
}

// Function to add a new row dynamically
function addRow(table) {
  const newRow = document.createElement("tr");
  const rowCount = table.getElementsByTagName("tr").length - 1;
  const rowNumberCell = document.createElement("td");
  rowNumberCell.textContent = rowCount -1;
  rowNumberCell.style.textAlign = "center";
  rowNumberCell.style.width = "5%";
  newRow.appendChild(rowNumberCell);

  for (let i = 1; i < columnNames.length; i++) {
    const newCell = document.createElement("td");
    newCell.contentEditable = "true";
    newCell.style.textAlign = "center";
    newCell.style.fontSize = "16px";
    newCell.style.fontWeight = "bold";
    newRow.appendChild(newCell);
  }
  table.appendChild(newRow);
}

addColumnTitles(table, columnNames);

// Function to check if a row is empty (all cells are empty)
        
function isRowEmpty(row) {
  for (let i = 0; i < row.cells.length; i++) {
      if (row.cells[i].innerText.trim() !== "") {
          return false;
      }
  }
  return true;
}

// Function to add a new row to the table
function addRow() {
  const table = document.getElementById("dynamicTable");
  const newRow = table.insertRow();

  for (let i = 0; i < 7; i++) {
      const cell = newRow.insertCell();
      cell.contentEditable = true;
      cell.addEventListener("input", handleInput);
  }
}

// Function to handle input in cells and add new rows as needed
function handleInput(event) {
  const table = document.getElementById("dynamicTable");
  const rows = table.getElementsByTagName("tr");

  // If the row has content, add a new row
  if (!isRowEmpty(event.target.parentNode)) {
      addRow();
  }

  // Remove extra rows if there are more than 50 empty rows
  const emptyRows = Array.from(rows).filter((row) => isRowEmpty(row));
  if (emptyRows.length > 50) {
      emptyRows.slice(50).forEach((row) => row.remove());
  }
}

// Initially add 50 empty rows
for (let i = 0; i < 50; i++) {
  addRow();
}

 

function openModalOnLoad() {
    const modal = document.getElementById("userDetailsModal");
    modal.style.display = "block";
}

function closeModal() {
    const modal = document.getElementById("userDetailsModal");
    modal.style.display = "none";
}

document.addEventListener("DOMContentLoaded", openModalOnLoad);

function saveUserToDatabase(username, avatar, color) {
    const userDetails = {
        username: username,
        avatar: avatar,
        color: color
    };

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_user_details.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log("User details saved in the database.");
                closeModal();
            } else {
                console.error("Error saving user details:", response.error);
                alert("Error: " + response.error);
            }
        } else {
            console.error("AJAX error:", xhr.statusText);
            displayError("An error occurred while saving user details.");
        }
    };
    
    xhr.onerror = function() {
        console.error("AJAX error:", xhr.statusText);
        displayError("An error occurred while saving user details.");
    };
    
    xhr.send(JSON.stringify(userDetails));
}

function saveUserDetails() {
    const username = document.getElementById("username").value;
    const avatar = document.querySelector("input[name='avatar']:checked").value;
    const color = document.querySelector("input[name='color']:checked").value;

    const editableCells = document.querySelectorAll("td[contenteditable='true']");
    for (const cell of editableCells) {
        cell.style.outlineColor = color;
    }

    const userAvatar = document.getElementById("userAvatar");
    userAvatar.src = "avatars/" + avatar + ".jpg";
    userAvatar.style.border = "3px solid " + color;

    saveUserToDatabase(username, avatar, color);
    
    const colorRadios = document.querySelectorAll("input[name='color']");
    for (const radio of colorRadios) {
        if (radio.value === color) {
            radio.disabled = true;
        }
    }
}

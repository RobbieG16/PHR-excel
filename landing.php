<!DOCTYPE html>
<html>
<head>
<title>Landing Page</title>
<style>
   /* Hide the images */
    img {
        display: none;
    }
</style>
</head>
<body>
<h1>Welcome to the Landing Page</h1>
<!-- <button onclick="saveavatartoDB(); window.location.href = 'index.php';">Go to Excel</button> -->
<button id="gotoExcel">Go to Excel</button>

<img src="avatars/1.jpg" value="1">
<img src="avatars/2.jpg" value="2">
<img src="avatars/3.jpg" value="3">
<img src="avatars/4.jpg" value="4">
<img src="avatars/5.jpg" value="5">
<img src="avatars/6.jpg" value="6">
<img src="avatars/7.jpg" value="7">
<img src="avatars/8.jpg" value="8">
<img src="avatars/9.jpg" value="9">
<img src="avatars/10.jpg" value="10">
<img src="avatars/11.jpg" value="11">
<img src="avatars/12.jpg" value="12">
<img src="avatars/13.jpg" value="13">
<img src="avatars/14.jpg" value="14">
<img src="avatars/15.jpg" value="15">

<!-- // Array of colors -->
<data-color value="#FF0000">
<data-color value="#00FF00">
<data-color value="#0000FF">
<data-color value="#FFFF00">
<data-color value="#FF00FF">
<data-color value="#00FFFF">
<data-color value="#FFA500">
<data-color value="#800080">
<data-color value="#008000">
<data-color value="#800000">
<data-color value="#008080">
<data-color value="#000080">
<data-color value="#FFC0CB">
<data-color value="#FFD700">
<!-- <script src="insertavatar.js"></script> -->
<script>
document.getElementById("gotoExcel").addEventListener("click", function() {
    saveDataToDB();
    window.location.href = 'index.php';
});

function saveDataToDB() {
    // Get the selected avatar and color data
    var selectedAvatarElement = document.querySelector("img[selected='true']");
    var selectedColorElement = document.querySelector("data-color[selected='true']");

    if (selectedAvatarElement && selectedColorElement) {
        var selectedAvatar = selectedAvatarElement.getAttribute("value");
        var selectedColor = selectedColorElement.getAttribute("value");
        
        // Create a data object to send to the server
        var data = {
            avatar: selectedAvatar,
            color: selectedColor
        };
        
        // Send the data to the server using an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "insertavatar.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(JSON.stringify(data));
    } else {
        console.error("Selected avatar or color element not found.");
    }
}
</script>
</body>
</html>

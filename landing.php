<!DOCTYPE html>
<html>
<head>
<title>Landing Page</title>

</head>
<body>
<h1>Welcome to the Landing Page</h1>
<button id="gotoExcel">Go to Excel</button>

<script>
document.getElementById("gotoExcel").addEventListener("click", function() {
    saveDataToDB();
    window.location.href = 'index.php';
});

function saveDataToDB() {

    var selectedAvatarElement = document.querySelector("img[selected='true']");
    var selectedColorElement = document.querySelector("data-color[selected='true']");

    if (selectedAvatarElement && selectedColorElement) {
        var selectedAvatar = selectedAvatarElement.getAttribute("value");
        var selectedColor = selectedColorElement.getAttribute("value");

        var data = {
            avatar: selectedAvatar,
            color: selectedColor
        };
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

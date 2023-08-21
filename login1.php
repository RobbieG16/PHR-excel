<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
<script>

    $("#loginForm").submit(function(event) {

event.preventDefault(); // prevent normal submit

// AJAX submit
$.ajax({
  url: "login.php",
  data: {
    username: $("#username").val(),
    password: $("#password").val() 
  },
  success: function(response) {
    if(response.success) {
      window.location.href = "landing.php"; 
    }
  }
});

});

</script>
</html>
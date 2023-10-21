
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Nunito+Sans:wght@300&family=Righteous&display=swap" rel="stylesheet">
    <title>Index</title>
</head>
<body>
<h1>Health Care Hospital </h1>
<h3>Hospital Management System</h3>
<div class="left-section">
    <form method="post" id="login-form">
        <img src="surgeon.png" class="pic"/><br><br>
        <img src="user.png" id="image1">
        <input type="email" id="user" placeholder="Superadmin" name="login" class="inpu"/><br><br>
        <img src="locked.png" id="image1">
        <input type="password" id="password" placeholder="Password" name="password" class="inpu"/><br><br>
        <span id="error-message" style="color:red;margin:100px;"></span><br>
        <input type="submit"value="submit"id="submit"/><br>
    </form>
</div>
<div class="vertical-line"></div>
<div class="right-section">
    <p class="only paragraph">This the main system login form for to<br>access the system.You can enter both<br>Super and Basic admin login details.<br>If you are not a membre of system, contact the hospital <br> responsables to add you. <br><br>Enter Login details that provided by hospital administration.
    </p>
</div> <br><br><br>
<hr>
<footer>
    <p class="left">Copyright@2023.Ibn Sina hospital</p>
    <nav>
        <a href="" class="Terms">Terms of use</a>
        <a href=""class="Privacy">Privacy policy</a>
        <a href=""class="Contact">Contact</a>
    </nav>
</footer>
<script>
$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var user = $('#user').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: 'login.php', // Update this to the correct URL
            data: { login: user, password: password },
            success: function(response) {
                if (response === 'success_medecin') {
                    window.location.href = '../dashboard/dashboard.php';
                } else if (response === 'success_nurse') {
                    window.location.href = '../Nurse/dashboard_nurse/dashboard_nurse.php';
                } else {
                    // Display the error message in the span element
                    $('#error-message').text('Invalid email or password !!');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });
});
</script>
</body>
</html>
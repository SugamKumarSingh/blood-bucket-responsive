<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/adminLogin.css">
</head>
<?php
include 'dbcon.php';


if (isset($_POST['signinbtn'])) {
    $susername = mysqli_real_escape_string($con, $_POST['susername']);
    $spassword = mysqli_real_escape_string($con, $_POST['spassword']);

    $user_name_search = "select * from admin where username = '$susername'";
    $query = mysqli_query($con, $user_name_search);

    if ($query) {
        $username_count = mysqli_num_rows($query);

        if ($username_count) {
            $pass = mysqli_fetch_assoc($query);

            $db_pass = $pass['password'];

            $pass_decode = password_verify($spassword, $db_pass);

            if ($pass_decode) {
                echo "login successful";
                header('location:adminPage.php');
            } else {
?>
                <script>
                    document.querySelector('.sorry').style.display = 'block';
                    document.querySelector('.sorry').innerHTML = 'Password Incorrect.';
                    setTimeout(function() {
                        document.querySelector('.sorry').style.display = 'none';
                    }, 4831);
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                document.querySelector('.sorry').style.display = 'block';
                document.querySelector('.sorry').innerHTML = 'Incorrect Username.';
                setTimeout(function() {
                    document.querySelector('.sorry').style.display = 'none';
                }, 4831);
            </script>
<?php
        }
    }
}
?>

<body style="background-image: url(../assets/images/11.jpg); background-size: cover;">
    <header>
        <div class="navbar">
            <div class="logo">
                <p><a href="index.php">Blood Bucket</a></p>
            </div>
            <ul>
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#benefits">Benefits</a></li>
                <li><a href="index.php#availability">Availability</a></li>
                <li><a href="index.php#team">Our Team</a></li>
            </ul>
            <a href="signIn_signUp.php"><button id="main-login-Btn">SIGN UP</button></a>
        </div>
    </header>

    <form id="signin-form" action="" method="POST">
        <div style="color: rgba(200, 39, 39); background: rgba(255, 90, 61, 0.5); padding: 8px; margin-top: 10px; display: none;" class="sorry"></div>
        <div class="top-heading">
            <h1>Admin Login</h1><br>
        </div>
        <input type="text" name="susername" placeholder="Username" /><br>
        <input type="password" name="spassword" placeholder="Password" /><br>
        <button id="adminBtn" type="submit" name="signinbtn">LOG IN</button>
    </form>

    <footer>
        <div class="foot" style="position: fixed; bottom: 0px;">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>
        </div>
    </footer>
</body>
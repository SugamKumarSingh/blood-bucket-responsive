<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "blood-bucket-database";

$con = mysqli_connect($server, $user, $password, $db);

$name = mysqli_real_escape_string($con, $_POST['name']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

$pass = password_hash($password, PASSWORD_BCRYPT);
$cpassword = password_hash($confirm_password, PASSWORD_BCRYPT);

$usernamequery = "select * from users where username = '$username'";
$query = mysqli_query($con, $usernamequery);

if ($query) {
    $usernamecount = mysqli_num_rows($query);
}

if ($usernamecount > 0) {
?>
    <script>
        document.querySelector('.error').style.display = 'block';
        document.querySelector('.error').innerHTML = 'Username Already Exist.';
        setTimeout(function() {
            document.querySelector('.error').style.display = 'none';
        }, 4831);
    </script>
    <?php
} else {
    if ($password == $confirm_password) {
        $insertquery = "insert into users (name, username, password) VALUES('$name', '$username', '$pass')";
        if (strlen(trim($password)) < 5) {
    ?>
            <script>
                document.querySelector('.error').style.display = 'block';
                document.querySelector('.error').innerHTML = 'Password cannot be less than 5 characters.';
                setTimeout(function() {
                    document.querySelector('.error').style.display = 'none';
                }, 4831);
            </script>
        <?php
        } else {
            $iquery = mysqli_query($con, $insertquery);
        ?>
            <script>
                document.querySelector('.alert').style.display = 'block';
                setTimeout(function() {
                    document.querySelector('.alert').style.display = 'none';
                }, 6531);
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            document.querySelector('.error').style.display = 'block';
            document.querySelector('.error').innerHTML = 'Password and Confirm Password do not match.';
            setTimeout(function() {
                document.querySelector('.error').style.display = 'none';
            }, 4831);
        </script>
<?php
    }
}
?>
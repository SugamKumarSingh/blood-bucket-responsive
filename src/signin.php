<?php
$susername = mysqli_real_escape_string($con, $_POST['susername']);
$spassword = mysqli_real_escape_string($con, $_POST['spassword']);

$usernameSearch = "select * from users where username = '$susername'";
$query = mysqli_query($con, $usernameSearch);

if ($query) {
    $username_count = mysqli_num_rows($query);

    if ($username_count) {
        $pass = mysqli_fetch_assoc($query);

        $db_pass = $pass['password'];

        $pass_decode = password_verify($spassword, $db_pass);

        if ($pass_decode) {
            ?>
            <script>
                document.querySelector('.loginSuccess').style.display = 'block';
                setTimeout(function() {
                    document.querySelector('.loginSuccess').style.display = 'none';
                }, 4831);
            </script>
            <?php
            echo "<script>window.location.href='landingPage.php';</script>";
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
?>
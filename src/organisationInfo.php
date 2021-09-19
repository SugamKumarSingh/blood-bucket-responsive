<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisation Information</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/infoForm.css">
</head>

<?php
include 'dbcon.php';

if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $msg = $_POST['message'];

    $insertquery = "insert into organisations(name, phone, email, state, city, description) VALUES('$fullname', '$phone', '$email', '$state','$city', '$msg')";
    $cn = mysqli_query($con, $insertquery);
    if ($cn) {
        header('location: index.php');
    }
?>
    <script>
        alert("Form successfully Submitted");
    </script>
<?php
}
?>

<body style="background-image: url(../assets/images/3.jpg); background-size: cover;">
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
            <a href="index.php"><button id="main-login-Btn">SIGN OUT</button></a>
        </div>
    </header>

    <section id="orgForm">
        <div class="head-container">
            <h2>ORGANISATION INFORMATION FORM</h2>
        </div>
        <div class="body-container">
            <div class="box">
                <div class="main-form">
                    <form action="#" method="post">
                        <div class="orgField">
                            <label for="orgName">
                                <span>Organisation Official Name:*</span>
                                <input type="text" name="fullname" id="orgName" required>
                            </label>
                        </div>
                        <div class="orgField">
                            <label for="orgPhone">
                                <span>Organisation Telephone Number:*</span>
                                <input type="tel" name="phone" id="orgPhone" required>
                            </label>
                        </div>
                        <div class="orgField">
                            <label for="orgEmail">
                                <span>Organisation Email:*</span>
                                <input type="email" name="email" id="orgEmail" required>
                            </label>
                        </div>
                        <div class="orgField">
                            <label for="message" class="col-form-label">State:* </label>
                            <select class="form-control" name="state" id="state" placeholder="Select Your State" single="">
                                <option selected>--Select Your State--</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="orgField">
                            <label for="orgCity">
                                <span>Organisation City:*</span>
                                <input type="text" name="city" id="orgCity" required>
                            </label>
                        </div>
                        <div class="orgField">
                            <label for="orgDesc">
                                <span>Organisation Description:*</span>
                                <textarea name="message" id="orgDesc" placeholder="Please describe your organisation in brief." required></textarea>
                            </label>
                        </div>
                        <div>
                            <input id="search-btn" name="submit" type="submit" value="Submit Details">
                        </div>
                    </form>
                </div>
            </div>
            <div class="box" id="bg-image">
                <img src="../assets/bg.png" alt="">
            </div>
        </div>
    </section>

    <footer>
        <div class="foot">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>
        </div>
    </footer>
</body>
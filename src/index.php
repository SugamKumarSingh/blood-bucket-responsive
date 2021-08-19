<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bucket</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <p><a href="index.php">Blood Bucket</a></p>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#benefits">Benefits</a></li>
                <li><a href="#availability">Availability</a></li>
                <li><a href="#team">Our Team</a></li>
            </ul>
            <a href="signIn_signUp.php"><button id="main-login-Btn">SIGN UP</button></a>
        </div>
    </header>

    <section style="background-image: url(../assets/images/6.jpg); background-size: cover;" id="home" class="home-container">
        <div class="top-home">
            <p>Sign Up to register yourself and donate blood.</p>
        </div>

        <div class="home-box left-home">
            <h1>Welcome<br>
                to <br>
                BLOOD <br>
                BUCKET
            </h1>
        </div>

        <div class="home-box right-home">
            <form action="" method="post">
                <div class="col-md-6 form-group">
                    <label for="message" class="col-form-label">
                        <p>Select State</p>
                    </label><br>
                    <select style="font-size: 1.3rem;" class="form-control" name="searchCity" id="state" placeholder="Select Your State">
                        <option selected value="">--Select State--</option>
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
                <br>

                <select name="bg-select" id="bg-select">
                    <option value="">Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select><br><br><br>

                <button id="search-btn" type="submit" onclick="showResult()" name="submit">SEARCH</button>
            </form>
        </div>
    </section>
    <hr>


    <!-- Search Result Section Started -->

    <section style="background-image: url(../assets/images/8.jpg); background-size: cover;" id="search-result">
        <div class="head-container">
            <h2>Search results</h2>
            <?php
            include 'dbcon.php';
            if (isset($_POST['submit'])) {
            ?>
                <script>
                    document.getElementById("search-result").style.display = "block";
                </script>
                <?php
                $state = $_POST['searchCity'];
                $bloodgroup = $_POST['bg-select'];
                ?>
                <p>Showing search results for location <span><?php echo $state; ?></span> and blood group <span><?php echo $bloodgroup; ?></span></p>
        </div>
        <div class="head-container">
            <h3>Individuals</h3>
        </div>
        <?php
                $sql = "select * from individuals where state = '$state' and bloodGroup = '$bloodgroup'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $num_rows = mysqli_num_rows($query);
                    if ($num_rows) {
        ?>
                <div class="body-container">

                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Blood Group</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Health Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($info = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $info['name']; ?></td>
                                        <td><?php echo $info['phone']; ?></td>
                                        <td><?php echo $info['email']; ?></td>
                                        <td><?php echo $info['bloodGroup']; ?></td>
                                        <td><?php echo $info['state']; ?></td>
                                        <td><?php echo $info['city']; ?></td>
                                        <td><?php echo $info['healthCondition']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                    } else {
                ?>
                    <div class="notAvl"><?php echo "No individual available at your location"; ?></div>
            <?php
                    }
                }
            ?>
                </div>
                <div class="head-container">
                    <h3>Organisations</h3>
                </div>
                <div class="body-container">
                    <?php
                    $ssql = "select * from organisations where state = '$state'";
                    $squery = mysqli_query($con, $ssql);
                    if ($squery) {
                        $num_rows = mysqli_num_rows($squery);
                        if ($num_rows) {
                    ?>
                            <div class="table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Organisation Name</th>
                                            <th>Telephone Number</th>
                                            <th>Email</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($sinfo = mysqli_fetch_array($squery)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sinfo['name']; ?>
                                                <td><?php echo $sinfo['phone']; ?>
                                                <td><?php echo $sinfo['email']; ?>
                                                <td><?php echo $sinfo['state']; ?>
                                                <td><?php echo $sinfo['city']; ?>
                                                <td><?php echo $sinfo['description']; ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="notAvl"><?php echo "No organisation available at your location"; ?></div>
                    <?php
                        }
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            </div>
            <hr>
    </section>

    <!-- Search Result Section Ended -->


    <section style="background-image: url(../assets/images/2.jpg); background-size: cover;" id="benefits">
        <div class="head-container">
            <h2>Benefits of Blood Donation</h2>
        </div>
        <div class="body-container">
            <div class="box">
                <div class="box-head">
                    <h2>
                        Reduces Risk of Cancer
                    </h2>
                </div>
                In an average, completely healthy person, the link between giving blood and decreased cancer risk is slim. But research does support a reduced risk of cancer for blood donors with different maladies, one of which is hemochromatosis.
            </div>
            <div class="box">
                <div class="box-head">
                    <h2>
                        Lowers Risk of Heart Attack
                    </h2>
                </div>
                Donating blood at least once a year could reduce your risk of a heart attack by 88 percent, according to a study conducted by the American Journal of Epidemiology.* This relates to the iron issue again, says Dr. David Dragoo, healthcare expert at Money Crashers.
            </div>
            <div class="box">
                <div class="box-head">
                    <h2>
                        Helps Liver Stay Healthy
                    </h2>
                </div>
                Research has linked too much iron with NAFLD, Hepatitis C and other liver diseases and infections. Though there are many other factors involved in these problems, donating blood can help relieve some of those iron stores and avoid extra issues in your liver.
            </div>
            <div class="box">
                <div class="box-head">
                    <h2>
                        Helps Your Mental State
                    </h2>
                </div>
                Patenaude believes the psychological health benefit you receive from knowing you’re helping others is just as helpful as the physical health benefit. When you roll up your sleeve and sit down in that chair, you know you’re making a difference—and that makes you feel good!
            </div>
        </div>
    </section>
    <hr>

    <?php
    $apQuery = "select * from individuals where bloodgroup='A+'";
    $apExe = mysqli_query($con, $apQuery);
    $ap = mysqli_num_rows($apExe);
    $anQuery = "select * from individuals where bloodgroup='A-'";
    $anExe = mysqli_query($con, $anQuery);
    $an = mysqli_num_rows($anExe);
    $bpQuery = "select * from individuals where bloodgroup='B+'";
    $bpExe = mysqli_query($con, $bpQuery);
    $bp = mysqli_num_rows($bpExe);
    $bnQuery = "select * from individuals where bloodgroup='B-'";
    $bnExe = mysqli_query($con, $bnQuery);
    $bn = mysqli_num_rows($bnExe);
    $opQuery = "select * from individuals where bloodgroup='O+'";
    $opExe = mysqli_query($con, $opQuery);
    $op = mysqli_num_rows($opExe);
    $onQuery = "select * from individuals where bloodgroup='O-'";
    $onExe = mysqli_query($con, $onQuery);
    $on = mysqli_num_rows($onExe);
    $abpQuery = "select * from individuals where bloodgroup='AB+'";
    $abpExe = mysqli_query($con, $abpQuery);
    $abp = mysqli_num_rows($abpExe);
    $abnQuery = "select * from individuals where bloodgroup='AB-'";
    $abnExe = mysqli_query($con, $abnQuery);
    $abn = mysqli_num_rows($abnExe);
    ?>

    <section style="background-image: url(../assets/images/9.jpg); background-size: cover;" id="availability">
        <div class="head-container">
            <h2>
                Availability
            </h2>
        </div>
        <div class="body-container">
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/a+.gif" alt=""></div>
                <div class="qty"> <span><?php echo $ap; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/a-.gif" alt=""></div>
                <div class="qty"> <span><?php echo $an; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/b.gif" alt=""></div>
                <div class="qty"> <span><?php echo $bp; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/b-.gif" alt=""></div>
                <div class="qty"> <span><?php echo $bn; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/o+.gif" alt=""></div>
                <div class="qty"> <span><?php echo $op; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/o-.gif" alt=""></div>
                <div class="qty"> <span><?php echo $on; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/ab+.gif" alt=""></div>
                <div class="qty"> <span><?php echo $abp; ?></span> Donors</div>
            </div>
            <div class="box">
                <div class="bg-img"><img src="../assets/blood-group/ab-.gif" alt=""></div>
                <div class="qty"> <span><?php echo $abn; ?></span> Donors</div>
            </div>
        </div>
    </section>
    <hr>

    <section style="background-image: url(../assets/images/4.jpg); background-size: cover;" id="team">
        <div class="head-container">
            <h2>
                Our Team
            </h2>
        </div>
        <div class="body-container">
            <div class="box">
                <div class="pic"><img src="../assets/pics/sks.png" alt=""></div>
                <div class="info">
                    <p class="tname">Sugam Kumar Singh</p>
                    <p class="role">Full-stack Developer</p>
                </div>
            </div>
            <div class="box">
                <div class="pic"><img src="../assets/pics/sks.png" alt=""></div>
                <div class="info">
                    <p class="tname">Sugam Kumar Singh</p>
                    <p class="role">Full-stack Developer</p>
                </div>
            </div>
        </div>
        <div class="body-container">
            <div class="box">
                <div class="pic"><img src="../assets/pics/sks.png" alt=""></div>
                <div class="info">
                    <p class="tname">Sugam Kumar Singh</p>
                    <p class="role">Full-stack Developer</p>
                </div>
            </div>
            <div class="box">
                <div class="pic"><img src="../assets/pics/sks.png" alt=""></div>
                <div class="info">
                    <p class="tname">Sugam Kumar Singh</p>
                    <p class="role">Full-stack Developer</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="foot">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>
        </div>
    </footer>

    <script>
        var resultSection = document.getElementById("search-result");

        function showResult() {
            resultSection.style.display = "block";
            resultSection.scrollIntoView();
        }
    </script>
</body>
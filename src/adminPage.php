<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .table {
            font-size: 0.8rem;
        }

        .table tr,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<?php
include 'dbcon.php';


$sql = " select * from organisations ";
$query = mysqli_query($con, $sql);
if ($query) {
    $num_rows = mysqli_num_rows($query);
    if ($num_rows) {
?>

        <body style="background-image: url(../assets/images/10.jpg); background-size: cover;">
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
            <section id="org">
                <div style="position: relative; top: 2.6rem;" class="head-container">
                    <h2>Admin Page</h2>
                </div>
                <div class="head-container">
                    <h3>Organizations</h3>
                </div>
                <div class="body-container">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Description</th>
                                    <th colspan="2">Admin Action</th>
                                </tr>
                                <?php
                                while ($info = mysqli_fetch_array($query)) {
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $info['oid']; ?></td>
                                    <td><?php echo $info['name']; ?></td>
                                    <td><?php echo $info['phone']; ?></td>
                                    <td><?php echo $info['email']; ?></td>
                                    <td><?php echo $info['state']; ?></td>
                                    <td><?php echo $info['city']; ?></td>
                                    <td><?php echo $info['description']; ?></td>
                                    <td><a href="edit.php?oid=<?php echo $info['oid']; ?>">Edit</a></td>
                                    <td><a href="delete.php?oid=<?php echo $info['oid']; ?>">Delete</a></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php
    } else {
        echo "Problem fetching data or no data found.";
    }
}

$sql1 = " select * from individuals ";
$query1 = mysqli_query($con, $sql1);
if ($query1) {
    $num_rows = mysqli_num_rows($query1);
    if ($num_rows) {
        ?>
            <section id="ind">
                <div class="head-container">
                    <h3>Individual</h3>
                </div>
                <div class="body-container">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Blood Group</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th colspan="2">Admin Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($info1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <tr>
                                        <td><?php echo $info1['iid']; ?></td>
                                        <td><?php echo $info1['name']; ?></td>
                                        <td><?php echo $info1['phone']; ?></td>
                                        <td><?php echo $info1['email']; ?></td>
                                        <td><?php echo $info1['bloodGroup']; ?></td>
                                        <td><?php echo $info1['state']; ?></td>
                                        <td><?php echo $info1['city']; ?></td>
                                        <td><a href="edit_i.php?iid=<?php echo $info1['iid']; ?>">Edit</a></td>
                                        <td><a href="delete_i.php?iid=<?php echo $info1['iid']; ?>">Delete</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
    <?php
    } else {
        echo "Problem fetching data or no data found.";
    }
}
    ?>
    <footer>
        <div class="foot">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>

        </div>
    </footer>
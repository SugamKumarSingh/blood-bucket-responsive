<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signing In</title>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .buttons {
            text-align: center;
            position: relative;
            top: 50vh;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .buttons button {
            border-radius: 8px;
            background: linear-gradient(120deg, orange, tomato);
            border: none;
            color: #FFFFFF;
            font-weight: bold;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 25%;
            transition: all 0.5s;
            cursor: pointer;
        }

        .buttons button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .buttons #indBtn span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .buttons #indBtn:hover span {
            padding-right: 25px;
        }

        .buttons #indBtn:hover span:after {
            opacity: 1;
            right: 0;
        }

        .buttons #orgBtn span::before {
            content: '«';
            position: absolute;
            opacity: 0;
            top: 0;
            left: -20px;
            transition: 0.5s;
        }

        .buttons #orgBtn:hover span {
            padding-left: 25px;
        }

        .buttons #orgBtn:hover span:before {
            opacity: 1;
            left: 0;
        }

        .foot {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body style="background-image: url(../assets/images/2.jpg); background-size: cover;">
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

    <div class="buttons">
        <a href="organisationInfo.php"><button id="orgBtn" onclick=""><span>Organisation</span></button></a>
        <a href="individualInfo.php"> <button id="indBtn" onclick=""><span> Individual </span></button></a>
    </div>

    <footer>
        <div class="foot">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>

        </div>
    </footer>
</body>
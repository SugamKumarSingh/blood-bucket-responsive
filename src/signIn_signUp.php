<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/register.css">
    <title>Continue to BloodBucket</title>
    <style>
        .navbar {
            font-family: 'Roboto', sans-serif;
            position: fixed;
            top: -35px;
            left: 0px;
            width: 100%;
            padding: 0.8rem 2rem 0.3rem 1.6rem;
            font-size: 1.25rem;
            color: white;
            background-color: rgba(238, 123, 100, 0.8);
        }

        .logo a {
            text-decoration: none;
            color: #fff;
            font-size: 1.8rem;
            transition: all 0.5s ease;
            font-weight: bold;
            float: left;
            cursor: pointer;
        }

        .logo a:hover {
            letter-spacing: 2px;
        }

        header ul {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            list-style-type: none;
            display: flex;
            font-weight: bold;
            float: right;
            margin-right: 1rem;
        }

        li a,
        li .dropbtn {
            font-size: 1.25rem;
            transition: all 0.5s ease;
            text-decoration: none;
            color: white;
        }

        li a:hover {
            letter-spacing: 2px;
        }

        ul li {
            border-radius: 10px;
            margin: 10px;
        }

        @media only screen and (max-width: 720px) {
            header ul li {
                display: none;
            }
        }

        .foot {
            font-family: 'Roboto', sans-serif;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100vw;
            text-align: center;
            padding: 1rem 0rem 1rem 0rem;
            font-size: 1rem;
            color: white;
            background-color: rgba(238, 123, 100, 0.8);
        }

        .foot p {
            font-weight: bold;
            margin: 0;
            padding: 0;
        }

        .foot a {
            text-decoration: none;
            color: #fff;
            transition: all 0.4s ease;
        }

        .foot a:hover {
            letter-spacing: 2px;
            color: #0b62d3;
        }
    </style>
</head>

<body style="background-image: url(../assets/images/4.jpg); background-size: cover;">
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
        </div>
    </header>
    <div class="slide-controls">
        <input type="radio" name="slide" id="signIn" checked>
        <input type="radio" name="slide" id="signUp">
        <label for="signIn" class="slide signIn">SIGN IN</label>
        <label for="signUp" class="slide signUp">SIGN UP</label>
        <div class="slider-tab"></div>
    </div>
    <div style="z-index: 99; color: green; background: rgba(168, 240, 178, 0.5); padding: 8px; display: none;" class="loginSuccess">Login successful.</div>
    <div style="z-index: 99; color: green; background: rgba(168, 240, 178, 0.5); padding: 8px; display: none;" class="alert">Registration successful.</div>
    <div style="color: rgba(200, 39, 39); background: rgba(255, 90, 61, 0.5); padding: 8px; margin-top: 10px; display: none;" class="error"></div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form id="signup-form" action="" method="POST">
                <h1>Create Account</h1><br>
                <input type="text" name="name" required placeholder="Name" />
                <input type="text" name="username" required placeholder="Username" />
                <input type="password" name="password" required placeholder="Password" />
                <input type="password" name="confirm_password" required placeholder="Confirm Password" />


                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id="signin-form" action="" method="POST">
                <h1>Sign in</h1><br>
                <input type="text" name="susername" placeholder="Username" /><br>
                <input type="password" name="spassword" placeholder="Password" /><br>
                <button type="submit" name="signinbtn">Sign In</button>
                <div style="color: rgba(200, 39, 39); background: rgba(255, 90, 61, 0.5); padding: 8px; margin-top: 10px; display: none;" class="sorry"></div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Already registered? Login below.</p>
                    <button class="ghost" id="signIn" onclick="document.getElementById('signIn').click()">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>New here ?</h1>
                    <p>Join us with minimal details and save someone's life by donating blood</p>
                    <button class="ghost" id="signUp" onclick="document.getElementById('signUp').click()">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'dbcon.php';

    if (isset($_POST['submit'])) {
        include 'signup.php';
    } else {
        if (isset($_POST['signinbtn'])) {
            include 'signin.php';
        }
    }
    ?>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
    <footer>
        <div class="foot">
            <p>All Rights Reserved. &copy; 2021 SUGAM KUMAR SINGH <a href="adminLogin.php">admin</a></p>
        </div>
    </footer>
</body>
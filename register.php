<?php include('session.php');
include('errorstack.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .lcol {
            border-style: solid;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 0px;
            height: 100vh;
        }

        .rcol {
            border-style: solid;
            border-top: 0px;
            border-bottom: 0px;
            border-right: 0px;
            height: 100vh;
        }

        .dropdown-menu {
            background-color: cadetblue;
        }

        p,
        div {
            color: gainsboro;
            border-color: rgba(105, 105, 105, 0.26);
        }

        h4 {
            color: black;
        }

        html,
        body {
            background-color: cadetblue;
        }

        .btn-space {
            margin-right: 5px;
        }

        .navbar-font {
            color: gainsboro;
        }

        #register-column {
            background-color: white;
            border-radius: 10px;
            border: solid;
            border-color: cadetblue;
        }

        .register {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        #register-row {
            margin-top: .5%;
            margin-bottom: .5%;
        }

        p {
            color: #17a2b8;
            margin-bottom: 0px;
        }

        .dropdown-menu {
            background-color: cadetblue;
        }

        p,
        div {
            color: gainsboro;
            border-color: rgba(105, 105, 105, 0.26);
        }

        h4 {
            color: black;
        }

        html,
        body {
            background-color: cadetblue;
        }

        .btn-space {
            margin-right: 5px;
        }

        .navbar-font {
            color: gainsboro;
        }

        #passmatch {
            color: aquamarine;
        }

        #passnomatch {
            color: red;
        }
    </style>
</head>

<body>
    <!-- NAVBAR BEGINS HERE-->
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.html">brainblast</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                    Course
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="https://www.zybooks.com/" target="_blank">Zybooks</a>
                    <a class="dropdown-item" href="https://tophat.com/" target="_blank">TopHat</a>
                    <a class="dropdown-item" href="https://drive.google.com/open?id=1co7vzY9_75cCiuNTHXCGf3pKbpf_TTwC" target="_blank">Course Google Drive</a>
                    <a class="dropdown-item" href="https://www.w3schools.com/" target="_blank">W3Schools</a>
                    <a class="dropdown-item" href="https://bbhosted.cuny.edu/" target="_blank">Blackboard</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                    About
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">About The Developers</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-font" href="#" id="navbarNavDropdown" data-toggle="dropdown">
                    Contact
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mailto:adil.khan42@qmail.cuny.edu">Adil Khan</a>
                    <a class="dropdown-item" href="mailto:ibrahimsuhail23@gmail.com">Ibrahim Suhail</a>
                    <a class="dropdown-item" href="mailto:sumeet.parmar30@qmail.cuny.edu">Sumeet Parmar</a>
                    <a class="dropdown-item" href="mailto:Mohamed.Sultan05@qmail.cuny.edu">Mohamed Sultan</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <button type="button" class="btn btn-space btn-info" onclick="window.location.href = 'login.php'">Log in</button>
            </li>
        </ul>

    </nav>
    <!--NAVBAR ENDS HERE-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 lcol">
            </div>
            <div class="col-md-8 ">
                <div class="container w-100">
                    <div id="register-row" class="row justify-content-center align-items-center">
                        <div id="register-column" class="col-md-12">
                            <div id="register-box" class="col-md-12">
                                <form id="register-form" class="form" action="register.php" method="post">
                                    <h3 class="text-center text-info">New User</h3>
                                    <label class="text-info" for="account_type">Account type:</label>
                                    <select id="select-id" required id="account_type" name="account_type">
                                        <option name="S" value="Student">Student</option>
                                        <option name="T" value="Teacher">Teacher</option>
                                        <!-- <option name="D" value="Developer">Developer</option> -->
                                    </select>
                                    <div class="form-group">
                                        <label for="first_name" class="text-info">First name:</label><br>
                                        <input required type="text" name="first_name" id="first_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name" class="text-info">Last name:</label><br>
                                        <input required type="text" name="last_name" id="last_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input required type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="text-info">Email:</label><br>
                                        <input required type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input required type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="verify-password" class="text-info">Verify New Password:</label><br>
                                        <label hidden id="passmatch">Passwords match</label>
                                        <label hidden id="passnomatch">Passwords don't match</label>
                                        <input required type="password" name="verify-password" id="verify-password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input id="submit-user" type="submit" name="rgstr" class="btn btn-info btn-md" value="submit">
                                    </div>
                                    <div id="register-link" class="text-right">
                                        <span class="text-info"> <b>Already registered?</b><br></span>
                                        <a name="lg" href="login.php" class="text-info lg"><u><b>Log in here</b></u></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 rcol">
            </div>
        </div>
    </div>
</body>


</html>
<?php
session_start();
require_once "components/db_connect.php";

if (isset($_SESSION["user"]) != "") {
    header("Location: home.php");
    exit;
}
if (isset($_SESSION["adm"]) != "") {
    header("Location: dashBoard.php");
}

$error = false;
$email = $password = $emailError = $passError = "";

if (isset($_POST["btn-login"])) {
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing

        $sql = "SELECT user_id, first_name, password, status FROM user WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1 && $row['password'] == $password) {
            if ($row['status'] == 'adm') {
                $_SESSION['adm'] = $row['user_id'];
                header("Location: dashBoard.php");
            } else {
                $_SESSION['user'] = $row['user_id'];
                header("Location: home.php");
            }
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}


mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once 'components/boot.php' ?>


    <style>

        form {
            width: 30vw;
            min-width: 280px;
            margin: auto;
            margin-top: 30vh;
        }
        .row img {
            width: 100%;
        }

        .row {
            height: 100vh;
            width: 98vw;
        }
        @media screen and (max-width: 767px){
            form {
                margin-top: 0;
                background-color: rgb(254, 241, 230, 0.6);
                padding: 3vw;
                margin: auto;
            }
            .bg {
                height: 20vh;
            }
        }
    </style>
</head>

<body>


        <div class="row">
            <div class="col-lg-7 col-md-7 bg"><img src="pictures/bglogin.png" alt=""></div>
            <div class="col-lg-5 col-md-5">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" class="rounded">
                    <h2>LogIn</h2>

                    <?php
                    if (isset($errMSG)) {
                        echo $errMSG;
                    }
                    ?>

                    <input type="email" autocomplete="off" name="email" class="form-control mt-3 border-0" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                    <span class="text-danger"><?php echo $emailError; ?></span>

                    <input type="password" name="pass" class="form-control mt-3 mb-3 border-0" placeholder="Your Password" maxlength="15" />
                    <span class="text-danger"><?php echo $passError; ?></span>

                    <button class="btn btn-block btn-danger" type="submit" name="btn-login">Sign In</button>
                    <hr />
                    <a href="register.php">Not registered yet? Click here</a>
                </form>
            </div>
        </div>

</body>

</html>
<?php
session_start();

if (isset($_SESSION["user"]) != "") {
    header("Location: home.php");
}
if (isset($_SESSION["adm"]) != "") {
    header("Location: dashBoard.php");
}


require_once "components/db_connect.php";
require_once "components/file_upload.php";
$error = false;
$fname = $lname = $phone = $address = $email = $pass = $picture = '';
$fnameError = $lnameError = $phoneError = $addressError = $emailError = $passError = $picError = '';
if (isset($_POST['btn-signup'])) {

    // sanitize user input to prevent sql injection
    $fname = trim($_POST['fname']);

    //trim - strips whitespace (or other characters) from the beginning and end of a string
    $fname = strip_tags($fname);

    // strip_tags -- strips HTML and PHP tags from a string

    $fname = htmlspecialchars($fname);
    // htmlspecialchars converts special characters to HTML entities

    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $address = trim($_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $uploadError = '';
    $picture = file_upload($_FILES['picture']);

    // basic name validation
    if (empty($fname) || empty($lname)) {
        $error = true;
        $fnameError = "Please enter your full name and surname";
    } else if (strlen($fname) < 3 || strlen($lname) < 3) {
        $error = true;
        $fnameError = "Name and surname must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
        $error = true;
        $fnameError = "Name and surname must contain only letters and no spaces.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    //checks if the phone input was left empty
    if (empty($phone)) {
        $error = true;
        $phoneError = "Please enter your phone number.";
    }

    //check if the address input was left empty
    if (empty($address)) {
        $error = true;
        $addressError = "Please enter your address.";
    }

    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    // password hashing for security
    $password = hash('sha256', $pass);
    // if there's no error, continue to signup
    if (!$error) {

        $query = "INSERT INTO user(first_name, last_name, phone_number, password, address, email, picture)
                 VALUES('$fname', '$lname','$phone', '$password', '$address', '$email', '$picture->fileName')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
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
    <title>Login & Registration System</title>
    <?php require_once 'components/boot.php' ?>

    <style>
        form {
            width: 40vw;
            min-width: 300px;
            margin: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="index.php">Restaurant booking system</a>


        </div>
    </nav>
    <div class="container mt-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
            <h2>Sign Up.</h2>
            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                    <p><?php echo $uploadError; ?></p>
                </div>

            <?php
            }
            ?>
            <div class="d-flex">
                <input type="text" name="fname" class="form-control w-50 me-1 mt-3" placeholder="First name" maxlength="50" value="<?php echo $fname ?>" />
                <span class="text-danger"> <?php echo $fnameError; ?> </span>

                <input type="text" name="lname" class="form-control w-50 mt-3" placeholder="Surname" maxlength="50" value="<?php echo $lname ?>" />
                <span class="text-danger"> <?php echo $fnameError; ?> </span>
            </div>
            <input type="text" name="phone" class="form-control mt-3" placeholder="Phone number" maxlength="50" value="<?php echo $phone ?>" />
            <span class="text-danger"> <?php echo $phoneError; ?> </span>

            <input type="text" name="address" class="form-control mt-3" placeholder="Address" maxlength="100" value="<?php echo $address ?>" />
            <span class="text-danger"> <?php echo $addressError; ?> </span>

            <input type="email" name="email" class="form-control mt-3" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span class="text-danger"> <?php echo $emailError; ?> </span>

            <input class='form-control mt-3' type="file" name="picture">
            <span class="text-danger"> <?php echo $picError; ?> </span>

            <input type="password" name="pass" class="form-control mt-3 mb-3" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"> <?php echo $passError; ?> </span>
            <button type="submit" class="btn btn-block btn-danger mb-3" name="btn-signup">Sign Up</button>
            <br>
            <a href="index.php">Do you have your account? Sign in Here...</a>
        </form>
    </div>
</body>

</html>
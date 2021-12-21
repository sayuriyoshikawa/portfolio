<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') { // Check if the User coming from a request
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // simple validation if you insert an email
    $msg = filter_var($_POST["msg"], FILTER_SANITIZE_STRING); // simple validation if you insert a string

    // mail function in php look like this  (mail(To, subject, Message, Headers, Parameters))
    $headers = "FROM : " . $email . "\r\n";
    $myEmail = "sayuri.yoshikawa.0121@gmail.com";
    if (mail($myEmail, "message coming from the contact form", $msg, $headers)) {
        echo "<script type='text/javascript'>alert('Sent!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error, try again.');</script>";
    }
}
?> 

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <?php require_once 'components/boot.php' ?>

    <style>
        .navbar {
            background-color: rgb(187, 45, 59);
        }

        form {
            width: 40vw;
            min-width: 300px;
            margin: auto;
        }
        h2 {
            text-align: center;
        }

        a {
            text-decoration: none;
        }
        .signout,
    .home,
    .add,
    .back {
      background-color: #FFE6E6;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.php">Restaurant booking system</a>
      <div class="d-flex justify-content-end">
        <a href="home.php"><button class="btn btn home ms-5" type="button">Home</button></a>
      </div>
    </div>
    </nav>

    <h2 class="mt-5 mb-4">Countuct form</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-danger mb-3">Send</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
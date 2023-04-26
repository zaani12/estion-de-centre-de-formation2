<?php
// Include the database connection file
require_once "connect.php";

// check if the form is submitted
if (isset($_POST['submit'])) {

    // get form data and sanitize it
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM apprenant WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        echo "Email already exists";
    } else {
        // insert the new user into the database
        $stmt = $pdo->prepare("INSERT INTO apprenant (Nom, prenom, Email, password) VALUES ('$firstname', '$lastname', '$email', '$password_hashed')");
        $stmt->execute();
        echo "User registered successfully";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            /* background-color: #f8f9fa; */
            background: url('./img/logon\ page.jpg') center center no-repeat; /* specify the background image */
            background-size: 110%;
            /* box-shadow: 0px 0px 10px rgba(1,0,0,0.2); */

        }
        .form-container {
            margin-top: 50px;
            max-width: 500px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .form-container h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        /* Responsive styles */
        @media (max-width: 767px) {
            .form-container {
                max-width: 100%;
                border-radius: 0;
            }
        }
        @media (max-width: 576px) {
            .form-container {
                padding: 20px;
            }
            .form-container h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 form-container">
                <h1>Sign Up</h1>
                <form method="post" action="register.php">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

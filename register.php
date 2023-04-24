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

<!-- create a form for sign up -->
<form method="post" action="register.php">
    <label>First Name:</label><br>
    <input type="text" name="firstname" required><br>

    <label>Last Name:</label><br>
    <input type="text" name="lastname" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>

    <input type="submit" name="submit" value="Sign Up">
</form>

<?php
session_start();
// Do some work with the session variables
// ...
// remove all session variables
// session_unset();
// When you are done with the session, destroy it
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Table of Formations</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center my-5">Table of Formations</h1>
    <table class="table table table-hover table table-bordered border-primary">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sujet</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Masse Horaire</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Database connection settings
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'centre_de_formation';

    // Create connection
    try {
      $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    // SQL query to select all formations
    $sql = "SELECT * FROM formation";

    // Prepare the query statement
    $stmt = $conn->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Check if any results found
    if ($stmt->rowCount() > 0) {
      // Output data of each row
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<form method='post' action='test.php'>";
        echo "<tr>";
        echo "<th scope='row' name= 'Id_formation'>" . $row['Id_formation'] . "</th>";
        echo "<td>" . $row['sujet'] . "</td>";
        echo "<td>" . $row['categorie'] . "</td>";
        echo "<td>" . $row['massHoraire'] . "</td>";
        echo "<td><a href='test.php?id=" . $row['Id_formation'] . "' class='btn btn-primary'>Join</a></td>";
        echo "</tr>";
        echo "<form>";
      }
    } else {
      echo "<tr><td colspan='5'>No results found.</td></tr>";
    }

    // Close database connection
    $conn = null;
    ?>
  </tbody>
</table>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

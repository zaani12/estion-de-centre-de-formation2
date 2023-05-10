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
    <h1 class="text-center my-5">deteals of session</h1>
    <table class="table table table-hover table table-bordered border-primary">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id session </th>
      <th scope="col">Etat</th>
      <th scope="col">Date de debut</th>
      <th scope="col">Date de fin</th>
      <th scope="col">max Places</th>
      <th scope="col">Id de formateur</th>
      <!-- <th scope="col">Id de formation</th> -->
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
<?php
$formation_id = isset($_GET['id']) ? $_GET['id'] : null; 

if ($formation_id) {
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

  // Query the database to retrieve the details of the selected formation
  $sql = "SELECT session.*, formateur.nom, formateur.prenom, formation.sujet 
  FROM session 
  JOIN formation ON session.Id_Formation = formation.Id_Formation 
  JOIN formateur ON session.Id_formateur = formateur.Id_formateur 
  WHERE session.Id_Formation = :formation_id
   ";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':formation_id', $formation_id, PDO::PARAM_INT);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    // Output the formation details in HTML
    ?>

    <form method='get' action='join.php'>
      <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "";
      echo "<tr>";
      echo "<th scope='row' name= 'Id_formation'>" . $row['Id_session'] . "</th>";
      echo "<td>" . $row['Etat'] . "</td>";
      echo "<td>" . $row['Date_fin'] . "</td>";
      echo "<td>" . $row['Date_debut'] . "</td>";
      echo "<td>" . $row['Places_max'] . "</td>";
      echo "<td>" .  $row['nom'] . " " . $row['prenom'] . "</td>";
      echo "<td><a href='join.php?id=" . $row['Id_session'] . "' class='btn btn-primary'>Join</a></td>";
      echo "</tr>";
      echo "<form>";
    }}}
    // Add more information about the formation here
//   } else {
//     echo "Formation not found.";
//   }

//   // Close database connection
//   // $conn = null;
// } else {
//   echo "Invalid formation ID.";
// }


// session_start();

// // Check if the "Join" button is clicked
// if (isset($_GET['id'])) {
//   // Get the session ID to join from the query string
//   $session_id = $_GET['id'];

//   // Get the user ID from the session data (or database)
//   $user_id = $_SESSION['Id_apprenant'];

//   // Check if the session ID is valid
//   $sql = "SELECT Id_session FROM session WHERE Id_session = :session_id";
//   $stmt = $conn->prepare($sql);
//   $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
//   $stmt->execute();
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   if ($result) {
//     // Insert a new record into the "rejoindre" table
//     $sql = "INSERT INTO rejoindre (Id_apprenant, Id_session) VALUES (:user_id, :session_id)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
//     $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
//     $result = $stmt->execute();

//     // Close the database connection
//     $conn = null;

//     // Check if the insert was successful
//     if ($result) {
//       // Redirect the user back to the page displaying the session details
//       header("Location: session-details.php?id=$session_id");
//       exit;
//     } else {
//       echo "Error joining session.";
//       exit;
//     }
//   } else {
//     echo "Invalid formation ID.";
//   }
// }






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
    $row = $stmt->fetch(PDO::FETCH_ASSOC);?>
    <form method='post' action='test.php'>
    <tr>
   <!-- <th scope='row' name= 'Id_formation'><?php $row['Id_formation'] ;?></th> -->
    <td><?php echo $row['Id_session'] ;?></td>
    <td> <?php echo $row['Etat'];?></td>
    <td><?php echo $row['Date_debut'];?></td>
    <td> <?php echo $row['Date_fin'];?></td>
     <td> <?php  echo $row['Places_max'];?></td>
    <td> <?php echo  $row['nom'] . " " . $row['prenom'];?></td>
    <!-- <td> <?php echo $row['Id_formation'];?></td> -->
    <td><a  name='join' type='button' class='btn btn-primary'>Join</a></td>
  </tr>
    <form>
    <?php
    // Add more information about the formation here
  } else {
    echo "Formation not found.";
  }

  // Close database connection
  // $conn = null;
} else {
  echo "Invalid formation ID.";
}


// Check if the "Join" button is clicked
if (isset($_GET['id'])) {
session_start();
  
  // Get the session ID to join from the query string
  $session_id = $_GET['id'];
  
  // Get the user ID from the session data (or database)
  $user_id = $_SESSION['Id_apprenant']; 
  // Check if the session ID is valid
  $sql = "SELECT Id_session FROM session WHERE Id_session = :session_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    // Check if the user is already registered for the session
    // $sql = "SELECT Id_apprenant FROM rejoindre WHERE Id_session = :session_id AND Id_apprenant = :user_id";
    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    // $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // $stmt->execute();
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // if ($result) {
    //   echo "You are already registered for this session.";
    // } else
     {
      // Insert a new record into the "rejoindre" table
      $sql = "INSERT INTO rejoindre (Id_session, Id_apprenant) VALUES (:session_id, :user_id)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $result = $stmt->execute();
    
      // Close the database connection
      $conn = null;
    
      // Check if the insert was successful
      if ($result) {
        // Redirect the user back to the page displaying the session details
        header("Location: session-details.php?id=$session_id");
        exit;
      } else {
        echo "Error joining session.";
        exit;
      }
    }
  } else {
    echo "Invalid formation ID.";
  }
}
?>


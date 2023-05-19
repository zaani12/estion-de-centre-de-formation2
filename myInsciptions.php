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
    <h1 class="text-center my-5">My Sessions</h1>
    <table class="table table-hover table-bordered border-primary">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id Session</th>
          <th scope="col">Etat</th>
          <th scope="col">Date de Debut</th>
          <th scope="col">Date de Fin</th>
          <th scope="col">Max Places</th>
          <th scope="col">Id de Formateur</th>
          <!-- <th scope="col">Action</th> -->
        </tr>
      </thead>
      <tbody>
        <?php

        $formation_id = isset($_GET['id']) ? $_GET['id'] : null; 


          // Database connection settings
          $host = 'localhost';
          $user = 'root';
          $password = '';
          $database = 'centre_de_formation';

          // Create connection
          try {
            $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
          }

          session_start();
          $user_id = $_SESSION['Id_Apprenant'];

          // Query the database to retrieve the details of the selected formation
          $sql = "SELECT s.Id_session, s.Date_debut, s.Date_fin, s.Places_max, s.Etat, f.Nom AS Formateur, fo.sujet AS Formation
          FROM session s
          JOIN formateur f ON s.Id_Formateur = f.Id_Formateur
          JOIN formation fo ON s.Id_Formation = fo.Id_formation
          JOIN rejoindre r ON s.Id_session = r.Id_session
          WHERE r.Id_Apprenant = :user_id";
          ;
          
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
          $stmt->execute();

          if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<td>" . $row['Id_session'] . "</td>";
              echo "<td>" . $row['Etat'] . "</td>";
              echo "<td>" . $row['Date_debut'] . "</td>";
              echo "<td>" . $row['Date_fin'] . "</td>";
              echo "<td>" . $row['Places_max'] . "</td>";
              echo "<td>" . $row['Formateur'] . "</td>";
              // echo "<td><a href='join.php?id=" . $row['Id_session'] . "' class='btn btn-primary'>Join</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='7'>No sessions found</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

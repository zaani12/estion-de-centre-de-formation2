<?php

session_start();
// Get the session ID to join from the query string
$session_id = isset($_GET['id']) ? $_GET['id'] : null;
$user_id = $_SESSION['Id_Apprenant'];

if ($session_id) {
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

  // Check if the user has already joined two sessions
  $sql = "SELECT COUNT(*) AS session_count FROM rejoindre WHERE Id_apprenant = :user_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch();

  if ($result['session_count'] >= 2) {
    // If the user has already joined two sessions, display an error message
    echo "You have already joined the maximum number of sessions.";
  } else {
    // Check if the user is already in the session
    $sql = "SELECT * FROM rejoindre WHERE Id_apprenant = :user_id AND Id_session = :session_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
      // If the user is already in the session, display an error message
      echo "You are already in this session.";
    }else  {
        $new_session = "SELECT * FROM session WHERE Id_session = $session_id ";
        $new_session = $conn->query($new_session);
        $new_session = $new_session->fetch(PDO::FETCH_ASSOC);
    
        $nb_sessions = "SELECT *,COUNT(*) AS nb_sessions
        FROM rejoindre
        WHERE Id_Apprenant =  $user_id";
        $nb_sessions = $conn->query($nb_sessions);
        $nb_sessions = $nb_sessions->fetch(PDO::FETCH_ASSOC);
    
        $count = $nb_sessions['nb_sessions'];
    
        $id_old_session = $nb_sessions['Id_session'];
        $old_session = "SELECT * FROM session WHERE Id_session = $id_old_session";
        $old_session = $conn->query($old_session);
        $old_session = $old_session->fetch(PDO::FETCH_ASSOC);
    
        // return [$old_session, $new_session];
        if ($old_session['Date_fin'] < $new_session['Date_debut']) {
            $result = true;
          }else {
           $result = false;
        }
        if ($result) {
                  // Insert a new record into the "rejoindre" table
      $sql = "INSERT INTO rejoindre (Id_apprenant, Id_session) VALUES (:user_id, :session_id)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
      $result = $stmt->execute();

      if ($result) {
        // If the insertion is successful, display a success message
        echo "You have joined the session.";
      }
       else {
        // If the insertion fails, display an error message
        echo "Error joining the session.";
      }
        }
    
 else {
    echo "you join too sesion in the same time";

    }
  }
  }
}




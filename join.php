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
  $count = $stmt->fetch();

  if ($count['session_count'] >= 2) {
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
    if ($result){
      echo "you ar  already in the session";

    }if ($count['session_count'] == 1) {
      // If the user is already in the session, display an error message
      // echo "You are already in this session.";
     
      
        $new_session = "SELECT * FROM session WHERE Id_session = $session_id ";
        $new_session = $conn->query($new_session);
        $new_session = $new_session->fetch(PDO::FETCH_ASSOC);
        
        $old_session = "SELECT * FROM session WHERE Id_session != $session_id  ";
        $old_session = $conn->query($old_session);
        $old_session = $old_session->fetch(PDO::FETCH_ASSOC);

      

        if (($old_session['Date_fin'] < $new_session['Date_debut']) || ($old_session['Date_debut'] > $new_session['Date_fin']) ) {
            $result = true;
          }else {
           $result = false;
        }
        if ($result == true) {
          // Insert a new record into the "rejoindre" table
$sql = "INSERT INTO rejoindre (Id_apprenant, Id_session) VALUES (:user_id, :session_id)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
$result = $stmt->execute();
echo "You have joined the session.";

}   
else {
echo "you join too sesion in the same time";
var_dump($result);
}
      }else{
        $sql = "INSERT INTO rejoindre (Id_apprenant, Id_session) VALUES (:user_id, :session_id)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
$result = $stmt->execute();
echo "You have joined the session.";
var_dump($result);

      }
    }

  }
  





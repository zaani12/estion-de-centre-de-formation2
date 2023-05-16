

<?php
session_start();
// if (isset($_POST['submit'])){
if (isset($_SESSION['Id_Apprenant'])) {

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

  // Select data from the database
  $sql = "SELECT * FROM apprenant WHERE Id_Apprenant = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $_SESSION['Id_Apprenant'], PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Get the user's name
  $Nom = htmlspecialchars($result['Nom']);

  // Get the user's first name
  $Prenom = htmlspecialchars($result['Prenom']);

  // Get the user's email
  $Email = htmlspecialchars($result['Email']);
?>
<?php
  // If the user has changed their name, update the database
  if ($Nom !== htmlspecialchars($_POST['nom'])) {
    $sql = "UPDATE apprenant SET Nom = :nom WHERE Id_Apprenant = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_SESSION['Id_Apprenant'], PDO::PARAM_INT);
    $stmt->execute();
  }
    // If the user has changed their name, update the database
    if ($Prenom !== htmlspecialchars($_POST['prenom'])) {
        $sql = "UPDATE apprenant SET Prenom = :prenom WHERE Id_Apprenant = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_SESSION['Id_Apprenant'], PDO::PARAM_INT);
        $stmt->execute();
      }
    

  // If the user has changed their email, update the database
  if ($Email !== htmlspecialchars($_POST['email'])) {
    $sql = "UPDATE apprenant SET Email = :email WHERE Id_Apprenant = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_SESSION['Id_Apprenant'], PDO::PARAM_INT);
    $stmt->execute();
  }

  // Close the database connection
  $conn = null;

}
//  }
else {
  header("Location: profile.php");
  exit();
}
?>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      font-family: sans-serif;
      margin-top: 50px;
    }
  </style>
</head>
<p>  <a class='btn btn-primary' href="home.php">home</a></p>

<form action="profile.php" method="post" class="container">
  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control"  name="nom" value="<?php echo $Nom;?>">
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom" value="<?php echo $Prenom;?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control"  name="email" value="<?php echo $Email;?>">
  </div>
  <div class="mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </div>
</form>
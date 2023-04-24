<?php
include 'connect.php';
?>
<?php
session_start();
if(isset($_POST["submit"])){
    if(empty($_POST["email"]) || empty($_POST["password"])){
        echo "all inputs ar required";

        function validate($data){
          $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
   
     $uname = validate($_POST['email']);
     $pass = validate($_POST['Password']);
       echo $uname;
       // echo $uname;
   
     if (empty($uname)) {
       header("Location: index.php?error=email  is required");
         exit();
     }
     else if(empty($pass)){
           header("Location: index.php?error=Password is required");
         exit();
     }
     else{
		$stmt = $pdo->query = "SELECT * FROM members WHERE Nickname='$uname' AND Password='$pass'";
       header("Location: index.php");
       exit();
   }
}
}
?>
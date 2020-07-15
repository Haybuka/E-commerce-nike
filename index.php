<?php
/**
 * Created by PhpStorm.
 * pascal
 * By: Olamiposi
 * 14/07/2020
 * 2020
 **/

require_once('db.php');

// Once you click submit this runs
if (isset($_POST['submit'])){
	$email = $_POST['email'];

	if ($email){
		$sql = "INSERT INTO user(email)";
        $sql .= "VALUES(:email)";
        $stmt = $connecting->prepare($sql);
        $stmt->bindValue(':email',$email);
        $execute = $stmt->execute();
        if ($execute){
            echo "Success";
        }else{
         echo "Failure";
	}
}
}

// You can remove this 
if (isset($_GET['del'])){
    $id = $_GET['del']; 
    $sql = "DELETE FROM user WHERE id='$id'";
    $execute = $connecting->query($sql);
    if ($execute){
        echo "Deleted successfully";
    }else{
        echo "Delete went wrong";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>For Pascal</title>
</head>
<body>
	<form action="index.php" method="post">
	<label for="email"> Email </label>
	<input type="email" name="email" name="email" placeholder="Email">
	<button type="submit" name="submit">Submit</button>
</form>


   
<!-- You can remove this I was using it to check -->
    <?php

    $sql = "SELECT * FROM user";
    $stmt = $connecting->query($sql);
    while($data = $stmt->fetch()){
        $id = $data['id'];
    $email = $data["email"];
    ?>
        <h1>Email: <?php echo $email?></h1>
    <?php }?>
    <a href="?del=<?php echo $id;?>">Delete </a>

<!-- -->


</body>
</html>
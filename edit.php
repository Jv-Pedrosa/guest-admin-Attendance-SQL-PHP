<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = " SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $bday = $_POST['birthDay'];

  $sql = "UPDATE  student_list SET firstName = '$fname' ,  lastName = '$lname',
  birthDay = '$bday' WHERE id = '$id'";
  $con->query($sql) or die ($con->error);


  echo header("Location: details.php?ID=" .$id);
}


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Student Data System</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
<br>
<a href="index.php" class="back-button">Go back</a>
   
<center>
<div class="add-container">
<form action="" method="post">

<label>First Name:</label>
<input type="text" name="firstName" placeholder="firstname" value="
<?php echo $row['firstName']; ?>">

<label>Last Name:</label>
<input type="text" name="lastName"  placeholder="lastname" value="
<?php echo $row['lastName']; ?>">

<label>Date of Birth:</label>
<input type="text" name="birthDay" placeholder="Birthday" value="
<?php echo $row['birthDay']; ?>">

<input type="submit" name="submit" value="Update Form">
</form>
</center>

</div>
















   </body>
 </html>

<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){

  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $bday = $_POST['birthDay'];

  $sql = "INSERT INTO `student_list`( `firstName`, `lastName`, `birthDay`)
   VALUES ('$fname','$lname','$bday')";

  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  echo header("Location: index.php");
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
        <input type="text" name="firstName" placeholder="firstname">

        <label>Last Name:</label>
        <input type="text" name="lastName"  placeholder="lastname">

        <label>Date of Birth:</label>
        <input type="text" name="birthDay" placeholder="Birthday">

        <input type="submit" name="submit" value="Submit Form">
        </form>
</center>

    </div>














   </body>
 </html>

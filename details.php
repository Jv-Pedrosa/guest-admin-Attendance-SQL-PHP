<?php

if(!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "user"){
  echo "<div class='message success'> Welcome " . $_SESSION['UserLogin']."</div><br /> <br />";
}else{
  echo "you don't have access for this page";
  echo header ("Location: index.php");
}


include_once("connections/connection.php");
$con = connection();



$id = $_GET['ID'];


$sql = " SELECT * FROM student_list where id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Student Data System</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>

   <div class="wrapper">

   <div class="button-edit"> 
     <a href="index.php">Back</a>
     <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

     <form action="delete.php"  method="post">
     </div>
     <button type="submit" name="delete" class="button-delete">DELETE</button>

    

     <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
     </form>

     <br>
     <br>
     <br>

 <h1><?php echo $row['firstName'];?> <?php echo $row['lastName']; ?></h1>
 </div>

   </body>
 </html>

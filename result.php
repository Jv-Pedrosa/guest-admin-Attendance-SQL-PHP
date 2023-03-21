<?php

if(!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION['UserLogin'])){
  echo "<div class='message success'>Welcome " . $_SESSION['UserLogin'].'</div> ';
}else{
  echo "Welcome Guest";
}



include_once("connections/connection.php");
$con = connection();
$search = $_GET['search'];
$sql = " SELECT * FROM student_list WHERE firstName LIKE '%$search%' ||
lastName LIKE '%$search%' ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();
$total = $students->num_rows;


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
    <center>
     <h1>Student Management System</h1>
     </center>
     
<div class="search-container">
     <form action="result.php" method="get">
     <input type="text" name="search" id="search" class="search-input">
     <button type="submit"  class="submit-input">search</button>

   </form>
   </div>
   
     <br>
     <div class="button-container">
  <?php if(isset($_SESSION['UserLogin'])){ ?>
  <a href="logout.php">Logout</a>
  <?php } else{ ?>

    <a href = "login.php"> Login</a>
  <?php } ?>
  <a href="add.php">Add Data</a>
  <a href="index.php">Back to Home</a>
  </div>
  <?php if($row > 0) { ?>
     <table>
       <tr>
         <th></th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Birthday</th>
       </tr>
       <?php do { ?>
       <tr>
         <td><a href="details.php?ID=<?php echo $row['id'];?>">View</a></td>
         <td><?php echo  $row['firstName']; ?></td>
         <td><?php echo  $row['lastName']; ?></td>
         <td><?php echo  $row['birthDay']; ?></td>

       </tr>
     <?php }while($row = $students->fetch_assoc())?>

     <?php }else{ ?>
        <h1>No result</h1>
    <?php } ?>
     </table>

     </div>
   </body>
 </html>

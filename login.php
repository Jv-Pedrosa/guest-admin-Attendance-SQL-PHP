<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM student_users WHERE  username =
'$username' AND password = '$password'";
$user = $con->query($sql) or due ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;

if ($total > 0) {
$_SESSION['UserLogin'] = $row['username'];
$_SESSION['Access'] = $row['access'];
echo header("Location: index.php");
}else{
  echo "<div class = 'message warning'>No account found.</div>";
}
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Student Data System</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body id = "form-login">

<div class="login-container">


<table id = "login-table">
  <td>
<h1>Welcome to LOGIN </h1>
</td>
<td>
      <img src="images/morty.png" alt="" width="120" height="120">
      </td>
</div>        
</table>
<form action="" method="post">

<div class="form-element">
    <label>Username</label>
    <input type="text" name="username" placeholder="Enter Username" required autocomplete="off">
</div>

<div class="form-element">
    <label>Password</label>
    <input type="password" name="password" placeholder="Enter Password" required  value="">
</div>

<button type = "submit" name ="login"> Login</button>


</form>

</div>















   </body>
 </html>

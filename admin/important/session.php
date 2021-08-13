<?php
   include('../../config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   $_SESSION['start'] = time();
   $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
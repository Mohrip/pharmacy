<?php
session_start();

if ( isset( $_POST['uname'] ) &&  ( isset( $_POST['pass'] ) ) ) {

   include "../db_conn.php";

   $uname = $_POST['uname'];
   $pass  = $_POST['pass'];
   $data = "&uname=".$uname ;

 //nested if   
   if (empty($uname)){
      $em = "User name is required";
      header("Location: ../login.php?error=$em&$data");
      exit;
      }

   else 
      if (empty($pass)){
         $em = "Password is required";
         header("Location: ../login.php?error=$em&$data");
         exit; 
         } 
      else {
         $result = mysqli_query($conn,"SELECT * FROM  doctor WHERE email = '$uname' and password='$pass'");
         $result2 = mysqli_query($conn,"SELECT * FROM patient WHERE email = '$uname' and password='$pass'");
         $row = mysqli_fetch_array($result);
         $count = mysqli_num_rows($result);
         $row2 = mysqli_fetch_array($result2);
         $count2 = mysqli_num_rows($result2);

         
         if($count == 0 && $count2 == 0) {
            $em = "Incorrect User name or password";
            header("Location: ../login.php?error=$em&$data");
            exit;
            } 
         else if ($count != 0) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] =$row['fname']; 
            header("location:../index.php");
      }
      else {
         session_start();
         $_SESSION['id'] = $row2['id'];
         $_SESSION['fname'] =$row2['fname']; 
         header("location:../index.php");
      }
   }
}


<?php

if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['pass'])) {

$conn = mysqli_connect('localhost','root','','481_db');

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass =  $_POST['pass'];
    $status= $_POST['status'];
    $data = "fname=".$fname."&uname=".$uname ;

 //nested if   
    if (empty($fname)){
        $em = "Full name is required";
        header("Location: ../register.php?error=$em&$data");
        exit;
    }else if (empty($uname)){
        $em = "User name is required";
        header("Location: ../register.php?error=$em&$data");
        exit;
    }
        else if (empty($status)){
            $em = "status is required";
            header("Location: ../register.php?error=$em&$data");
            exit;
    }       else if (empty($pass)){
                $em = "Password is required";
                header("Location: ../register.php?error=$em&$data");
                exit; } 
        
                else {
                    //hashing password
                   // $pass = password_hash($pass , PASSWORD_DEFAULT);

                    if($status  == 1){
                        $sqldoctor = "INSERT INTO doctor (fname,email,password,status) values('$fname', '$uname', '$pass', '$status')";       
                        mysqli_query($conn ,$sqldoctor);
                    }
                    else {
                        $sqlpatient = "INSERT INTO patient (fname,email,password,status,doctor) values('$fname', '$uname', '$pass', '$status','1')";
                        mysqli_query($conn ,$sqlpatient);
                        }   
                header("Location: ../register.php?success=Your account has been created succesfully");
                exit;
                } 
            }
        else {
            header("Location: ../register.php?error=error");
            exit;
        }

?>
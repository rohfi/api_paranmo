<?php
  require 'connection.php';

  $username=$_POST['name'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);



  $checkUser="SELECT * from users WHERE email='$email'";
  $checkQuery=mysqli_query($con,$checkUser);

    if(mysqli_num_rows($checkQuery)>0){

        $response['error']="403";
        $response['message']="User exist";
    }
    else{
        $insertQuery="INSERT INTO users(name,email,password) VALUES('$username','$email','$password')";
        $result=mysqli_query($con,$insertQuery);

        if($result){

            $response['error']="200";
            $response['message']="User Created";
        }
        else
        {
            $response['error']="400";
            $response['message']="User uncreated";
        }
    }
  
  echo json_encode($response);

?>
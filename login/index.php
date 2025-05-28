<?php
  include "connection.php";
  

  if(isset($_POST['submit'])) {
         $user_name = $_POST['user_name'];
         $user_password = $_POST['user_password'];

         $sql = "SELECT USER_NAME,USER_PASSWORD FROM NAA_USER_MST WHERE USER_NAME = '$user_name' AND USER_PASSWORD = '$user_password' ";
         $result = ociparse($conn, $sql);
         ociexecute($result);
         if($user_row = oci_fetch_assoc($result)){
            if($user_row['USER_NAME']==$user_name){
                session_start();
      
                //$_SESSION['ADMIN_ID']=;
                $_SESSION['u_type']=$user_row['USER_TYPE'];
                $_SESSION['user']=$user_row['USER_NAME'];
                //$id = $_SESSION['id'];
        
                header('Location:report_list.php');
            }
         }
        

  }

?>


<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <title>Admin Login</title>
    <link rel="icon" href="img/logo.jpeg" type="image/ico">

      <style>
         /* body {
         margin: 20px auto;
         height: 100%;
         color: #6a6f8c;
         background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.1516203893666842) 0%, rgba(1, 1, 1, 0.13201254622942926) 80%), url(./img/ndc_gate2.jpg);
         opacity: 0.8;
         background-color: #feb913;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center center;
         background-attachment: fixed;
         font: 600 16px/18px 'Open Sans', sans-serif;
         overflow: hidden;
         } */
         *,
         :after,
         :before {
         box-sizing: border-box
         }
         .clearfix:after,
         .clearfix:before {
         content: '';
         display: table
         }
         .clearfix:after {
         clear: both;
         display: block
         }
         a {
         color: inherit;
         text-decoration: none
         }
         .login-wrap {
         width: 100%;
         margin: auto;
         margin-top: 20px;
         max-width: 400px;
         /* min-height: 670px; */
         min-height: 400px;
         position: relative;
         box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
         
         }
         .login-html {
         width: 100%;
         height: 120%;
         position: absolute;
         padding: 0 70px 50px 70px;
         /* background: #0051a2e8; */
         background-color: #3f85f9;
         }
         .image-holder {
         text-align: center;
         /* margin-bottom: 44px; */
         }
         .login-html .sign-in-htm,
         .login-html .sign-up-htm {
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         position: absolute;
         transform: rotateY(180deg);
         backface-visibility: hidden;
         transition: all .4s linear;
         }
         .login-html .sign-in,
         .login-html .sign-up,
         .login-form .group .check {
         display: none;
         }
         .login-html .tab,
         .login-form .group .label,
         .login-form .group .button {
         text-transform: uppercase;
         }
         .login-html .tab {
         font-size: 22px;
         margin-right: 15px;
         padding-bottom: 5px;
         margin: 0 15px 10px 0;
         display: inline-block;
         border-bottom: 2px solid transparent;
         }
         .login-html .sign-in:checked+.tab,
         .login-html .sign-up:checked+.tab {
         color: #fff;
         border-color: #3ab54a;
         }
         .login-form {
         min-height: 345px;
         position: relative;
         perspective: 1000px;
         transform-style: preserve-3d;
         }
         .login-form .group {
         margin-bottom: 15px;
         }
         .login-form .group .label,
         .login-form .group .input,
         .login-form .group .button {
         width: 100%;
         color: #fff;
         display: block;
         outline: none;
         }
         .login-form .group .input,
         .login-form .group .button {
         border: none;
         padding: 12px 18px;
         border-radius: 25px;
         background: rgba(255, 255, 255, .1);
         outline: none;
         }
         .login-form .group input[data-type="password"] {
         text-security: circle;
         -webkit-text-security: circle;
         }
         .login-form .group .label {
         color: #aaa;
         font-size: 12px;
         }
         .login-form .group .button {
         background: #3ab54a;
         margin: 25px auto;
         }
         .login-form .group label .icon {
         width: 15px;
         height: 15px;
         border-radius: 2px;
         position: relative;
         display: inline-block;
         background: rgba(255, 255, 255, .1);
         }
         .login-form .group label .icon:before,
         .login-form .group label .icon:after {
         content: '';
         width: 10px;
         height: 2px;
         background: #fff;
         position: absolute;
         transition: all .2s ease-in-out 0s;
         }
         .login-form .group label .icon:before {
         left: 3px;
         width: 5px;
         bottom: 6px;
         transform: scale(0) rotate(0);
         }
         .login-form .group label .icon:after {
         top: 6px;
         right: 0;
         transform: scale(0) rotate(0);
         }
         .login-form .group .check:checked+label {
         color: #fff;
         }
         .login-form .group .check:checked+label .icon {
         background: #3ab54a;
         }
         .login-form .group .check:checked+label .icon:before {
         transform: scale(1) rotate(45deg);
         }
         .login-form .group .check:checked+label .icon:after {
         transform: scale(1) rotate(-45deg);
         }
         .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
         transform: rotate(0);
         }
         .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
         transform: rotate(0);
         }
         .hr {
         height: 2px;
         margin: 40px 0 35px 0;
         background: rgba(255, 255, 255, .2);
         }
         .foot-lnk {
         text-align: center;
         }
         #logintg {
         display:none;
         }
         button {
         position: absolute;
         right: 10px;
         top: 5px;
         transition: all .5s ease;
         color: #fff;
         border: 3px solid white;
         font-family:'Montserrat', sans-serif;
         text-align: center;
         line-height: 1;
         font-size: 17px;
         background-color : transparent;
         padding: 5px;
         outline: none;
         border-radius: 4px;
         }
         button:hover {
         color: #001F3F;
         background-color: #fff;
         }
         .input::placeholder {
        color: white;
        opacity: 1; 
    }
      </style>
   </head>
   <body style="background-color:#fff">
        <div class="login-wrap" >
            <div class="login-html">
                <div class="image-holder" style="margin-top: 30px;">
                    <img src="img/logo.jpeg" alt="logo" width="80px" height="80px">
                </div>
                <div class="login-form">
                    
                <div class="login-form" style="margin-top: 30px;">
                    <form method="post" action="">
                    <!-- <img src="img/ndc_75.png" alt="logo" width="150" height="150"> -->

                        <div class="group">
                            <label for="user" class="label" style="color: #fff; font-weight: bold;">Admin Username</label>
                            <input id="user" type="text" class="input" name="user_name" placeholder="Enter Your Username">
                        </div>
                        <div class="group">
                            <label for="pass" class="label" style="color: #fff; font-weight: bold;">Password</label>
                            <input id="pass" type="password" name="user_password" class="input" data-type="password" placeholder="Enter Password">
                        </div>
                        <!--<div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>-->
                        <div class="group">
                            <input type="submit" class="button" value="Sign In" name="submit">
                        </div>
                        <div style="color:#ff0000"></div>

                    
                      <div class="group" style="text-align:center;">
                        <a href="https://ietian.org" class="button" style="text-align:center; display:inline-block; background:#f44336; color:white; text-decoration:none; margin-top:10px;">Home</a>
                    </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
        
   </body>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript">
      $('.toggle').click(function() {
          $('#logintg').toggle('slow');
      });
   </script>
</html>
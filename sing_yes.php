<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<style> 
    body
    {      
    
       background-color: aliceblue;
        font-family:sans-serif;
        
    }
    .perant
    {
        margin-top: 200px;
        background-color:transparent;
        width:65%;
        height:50%;
        border-radius: 30px 30px;
        border: 5px solid #572F85;
        box-shadow: 15px 15px 100px rgba(0,0,0,0.6),
                    -15px -15px 120px rgba(0,0,0,0.6);
    }
    .address
    {
        font-family:cursive;
        font-size:40px;
        font-weight:bolder;
        color: #572F85;; 
    }
    
    .name , .pas
    {
        font-size: 20px;
        background-color: #eee;
        font-family: monospace;
        border-radius: 10px 10px;
        border: 2px solid #ccc;
        height: 40px;
        outline: none;
        transition: 0.6s;
    }

    
    .but
    {
        height: 50px;
        font-size:18px;
        border-radius: 15px 15px ;
        border: none;
        background-color:#572F85;
        color:aliceblue;
        font-weight: bold;
        outline: none;
        transition: 0.6s;
        
    }
    .butback
    {
        height: 50px;
        font-size:20px;
        border-radius: 15px 15px;
        border: none;
        background-color:transparent;
        color: #C557FA;
        font-weight: bold;
        outline: none;
    }
    
    
    .name:focus, .pas:focus 
    {
        box-shadow: 8px 8px 30px #572F85,
                    -8px -8px 30px #572F85;
    }
    .but:hover
    {
        color: black;
    }
    .butback:hover
    {
        color: #572F85;
        font-weight: bold;
    }
    .pad
    {

      font-weight:bold;
        color:white;
    }

    
</style> 
</head>
<body>





<?php
session_start();
$message="";
?>
    
<div class="perant container-fluid ">
    <div class="row mt-2">
        
        <div class="col-12 ">
            <p class="address text-center">Login</p>
        </div>
        
        <div class="col-12">
            
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="row">
                    
                    <div class="col-12 col-md-4 mt-4">
                        <p class="onep text-center fw-bold fs-5">Email</p>
                    </div>
                    
                    <div class="col-12 col-md-8">
                        <input type="text" class="name w-100 mb-2" name="tetch_name">
                    </div> 
                    
                    <div class="col-12 col-md-4 mt-2">
                        <p class="twop text-center fs-5 fw-bold ">Password</p>
                    </div>
                    
                    <div class="col-12 col-md-8">
                        <input type="password" class="pas w-100" name="password">
                    </div>
                    
                    <div class="col-6 mt-5">
                        <input type="submit" name="sub" class="but w-100" value="Login">
                    </div>
                    
                    <div class="col-6 mt-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <input type="submit" name="back" value="Back" class="butback w-100">
                    </form>
                    </div>
                    
                    <div class="col-12 mt-3">
                        <p class = "text-center text-muted fs-5">! يسمح فقط للاساتذة بتسجيل الدخول</p>
                    </div>
                    
                    <div class="col-12">
                        <h4><?php echo $message;?></h4>
                    </div>    
                </div>
            </form>
            
        </div>
    </div>
</div>
  
    
<?php

include("config.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['sub'])){
    $email = $_POST['tetch_name'];
    $password = $_POST['password'];
        
$sql = "select * from acount where user ='$email' and password = '$password'";
    $result = mysql_query($sql,$conn);
    if($result){
    $num = mysql_num_rows($result);
    if($num>0)
    {
         $_SESSION['name_tetch'] = $email;
         header('Location: sing_yes2.php');
    }else
    {
         $message = "<div class='alert alert-danger text-dark fs-3 fw-bold mt-5 text-capitalize'><h3 style='text-align:center;' >Not Found Email....<h3></div>";
    }
    }else
    {
        echo(mysql_error());
    }
    }
    if (isset($_POST['back']))
    {
         header('Location: p.php');
    }
}



?>
    
    <script src="js/bootstrap.bundle.min.js"></script> 
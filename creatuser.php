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
        background-color:aliceblue;
    }
    lable
    {
        font-weight: bold; 
    }
    
    
 
    
    .i1,.i2,.i3
    {
        width: 400px;
        height: 40px;
        border:none;
        border-radius: 5px;
        font-size: 20px;
        outline: none;
        direction: rtl ;
        border: 1px solid #aaa;
        border-radius: 10px 10px;
        padding-right: 35px;
        transition: 0.6s;
    }
    
    .l1,.l2,.l3 , .l4
    {
        color: black;
    }
    
    
    .i1:focus , .i2:focus , .i3:focus
    {
       box-shadow: 5px 5px 20px #572F85,
                    -5px -5px 20px #572F85;
        border: 3px solid #572F85;
        
    }
    
    .select
    {
        height: 40px;
        font-size:20px;
        outline: none;
        border-radius: 5px;
        font-weight: bold;
    }
    .select:focus
    {
        border: 3px solid #572F85;
    }
    
    .sub
    {
        border: none;
        border-radius: 10px;
        background-color:#572F85;
        font-size: 25px;
        transition: 0.7s;
        color: white;
    }
    .sub:hover
    {
         box-shadow: 10px 10px 40px #572F85,
                    -10px -10px 60px #572F85;
        color: black;
    }
    
    
    .perant
    {
        
        
       
        border-radius: 20px 20px;
        border: 8px solid #572F85;
        box-shadow: 10px 10px 60px #aaa,
                    -10px -10px 80px #aaa;
    }
    h1
    {

        text-shadow: 5px 5px 8px #572F85;
    }
    .img1 , .img2 , .img3 , .img4
    {
        height: 35px;
        z-index: 2px;
        color: #572F85;
    }
  
    </style> 
    <link rel="stylesheet" href="w3.css">
</head>
<body>







   
<div class="perant container w-75 mt-5">
    <div class="row">
        
        <div class="col-12 text-center">
            
            <form action = "creatuser.php" method = "post">
                
                 <div class="row mt-4">
                     
                     <div class="col-12 mb-4 ">  
                         <h1 class="text-center" style="font-size:40px;">Creat Acount</h1>
                     </div>
                     
                     

                     
                     <div class="col-12 col-md-12 mt-3">
                         
                        <div class="row">
                            <div class="col-12">
                                
                                <lable class = "l1 fs-5 text-center">Email</lable>
                            </div>
                            
                            <div class="col-12">
                                <input type = "text" name = "user" class = "i1 w-100" required>
                            </div>
                            

                         </div>
                     </div>
                     
                     
                     <div class="col-12 mt-3">
                         
                        <div class="row">
                            
                            <div class="col-12">
                                <lable class = "l2 text-center fs-5">Password</lable>
                            </div>
                            
                            <div class="col-12">
                                <input type = "password" name = "pass" class = "i2 w-100" required>
                            </div>
                            

                         </div>
                     </div>
                     
                     
                     
                     <div class="col-12 mt-3">
                         
                        <div class="row">
                            
                            <div class="col-12">
                                <lable class = "l3 text-center fs-5">Connfirm</lable>
                            </div>
                            
                            <div class="col-12">
                                <input type = "password" name = "confirm" class = "i3 w-100" required>
                            </div>
                            

                         </div>
                     </div>                     
                     
                     
                     
                     <div class="col-12 mt-3">
                         
                        <div class="row">
                            
                            <div class="col-12">
                                <lable class = "l4 text-center fs-5">State User</lable>
                            </div>
                            
                            <div class="col-12">
                                <select name ="statu"  class = "select w-100">

                                <option value = "admin">Admin</option>
                                <option value="tetcher">Tetcher</option>
                                <option value="user">User</option>     

                                </select >
                            </div>
                            

                         </div>
                     </div>  
                     
                     


                     <div class="col-12 text-center mt-5 mb-5">
                     
                        <input type="submit" name="sub" value=" Creat Acount" class = "sub w-100 btn">
                     
                     </div>
            </div>
        </form>

    </div>
</div>

<?php
    
include("config.php");            
$message = "";
if(isset($_POST['sub'])){
    
    if($_POST['pass'] != $_POST['confirm']){
        $message ="not incorect password";
               echo'<div class="alert alert-danger text-dark fs-3 fw-bold text-capitalize "><h3 style=" text-align:center;" >'.$message.'<h3></div>';
    }
    else
    {       
$user = $_POST['user'];
$pass = $_POST['pass'];
$statu= $_POST['statu'];
$sql = "INSERT INTO acount VALUES('' , '$user' , '$pass', '$statu')";
        
$result = mysql_query($sql , $conn);
if ($result){
       echo'<div class="alert alert-success text-dark fs-3 fw-bold text-capitalize "><h3 style=" text-align:center;" >Succsfuly Oparation Add Acount<h3></div>';
    
    	echo"<meta http-equiv = \"refresh\"content=\"2;url=creatuser.php\">";
}else{
    echo(mysql_error());
}
    }
}
?>
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
}
    .hone
    {
        font-weight: bolder;
        font-size: 40px;
        word-spacing: 10px;
        letter-spacing: 2px;
        color:#000;
        text-shadow: 3px 3px 10px #572F85; 
        
    }
    .lable1 ,.lable2,.lable3 
    {
        font-weight: bold;
        font-size: 30px;
        color:#000;
       text-shadow: 8px 8px 8px #572F85;  
        
    }
    .text1 , .text2 
    {
        height: 40px;
        border: 1px solid #000;
        border-radius: 10px 10px;
        outline: none;
        font-size: 25px;
        direction:rtl;
        background-color: #fff;
        transition: 0.5s;
        
    }
    .text1:focus , .text2:focus
    {
        border: 4px solid #572F85;
        box-shadow: 10px 10px 15px #572F85 ; 
    }
    textarea
    {
        height: 200px;
        border: 1px solid #000;
        outline: none;
        font-size: 25px;
        direction:rtl;
        padding: 7px;
        transition: 0.5s;
        background-color: #fff;
    }
    textarea:focus
    {
        border: 4px solid #572F85;
        box-shadow: 15px 15px 20px #572F85; 
    }
    .sub
    {
        height: 50px;
        color: #fff;
        background-color:#572F85;
        border: none;
        outline: none;
        font-size:25px;
        border-radius: 10px 10px;
        transition: 0.5s;
        color: #ddd;
    }
    .sub:hover
    {
        width: 320px;
        box-shadow: 20px 20px 30px #572F85 ;
        color: #000;
    }
    .butback
    {
        border:1px solid #000;
        background-color: #000;
        border-radius: 15px 1px;
        color:#fff;
        font-size:20px;
        width: 150px;
        outline: none;
        font-weight: bold;
        transition: 0.5s;
        height: 40px;
    }
    .butback:hover
    {
        color:#572F85;
        width: 170px;
    }

    </style>
</head>
<body>
    
    
    
        <?php
session_start();
    
 if (isset($_SESSION['user']))
 {
     $name_tetcher = explode("@",$_SESSION['user']);
 }
            
    
?>

<div class="container-fluid">
    <div class="row">
        
       <div class="col-12">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="submit" name="back" value="Back" class="butback">
            </form> 
        </div>
            
         
    <div class="col-12">
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
          <div class="row mt-2">   
              
            <div class="col-12 mb-5">
                <h1 class="hone text-center">Note To Students</h1> 
            </div>
             
            <div class="col-12 mt-4">
                <h3 class="lable1 fs-5 text-center" >
                    Miss Introduction </h3>
            </div>
              
            <div class="col-12 text-center">  
                <input type="text" name="tetch" class="text2 w-50 text-center" value="<?php echo $name_tetcher[0]?>" >
            </div>
              
            <div class="col-12 mt-5">  
                <h3 class="lable2 fs-5 text-center">student mail</h3>
            </div>  
              
            <div class="col-12 text-center">   
                <input type="text" name="stu" class="text1 w-50 text-center" required>
            </div>
            
            <div class="col-12 mt-5">
                <h3 class="lable3 fs-5 text-center">Note made</h3>
            </div>
            
            <div class="col-12 ">  
                <textarea type="text" name="message" class="text3 w-100" required></textarea>
            </div> 
              
            <div class="col-12 mt-4"> 
                <input type="submit" name="sub" class="sub w-100 btn" value="Send Note">
            </div>
          </div>
        </form>
    </div>
    </div>
</div>  
<script src="js/bootstrap.bundle.min.js"></script>    
    
    
<?php
include("config.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
 if (isset($_POST['sub'])){   
$tetcher = $_POST['tetch'];
$student = $_POST['stu'];
$message = $_POST['message'];
$date = date("Y/m/d");

$sql = "INSERT INTO message VALUES('$tetcher','$student','$message','$date')";

$result = mysql_query($sql,$conn);

if($result)
{
    echo "<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize'><h3 style='text-align:center;' >The note has been sent to the student successfully<h3></div>";
    
    echo"<meta http-equiv = \"refresh\"content=\"1;url=message_single.php\">";
}else
{
    echo(mysql_error());
}
}
        if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=message_stu.php\">";
    }
    
}
?>




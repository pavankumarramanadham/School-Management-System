
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
        .lable1 ,.lable3 
    {
        font-weight: bold;
        font-size: 30px;
        color:#000;
       text-shadow: 8px 8px 8px #572F85;  
        
    }
        .text1 , .text2 
    {
        width:700px;
        height: 40px;
        border: 1px solid #000;
        border-radius: 10px 10px;
        outline: none;
        font-size: 25px;
        direction:rtl;
        padding: 7px;
        background-color: #fff;
        transition: 0.5s;
        
    }

        .text1:focus 
    {
        border: 3px solid #572F85;
        box-shadow: 10px 10px 15px #572F85 ; 
    }
        textarea
    {
        width:100%;
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
        border: 3px solid #572F85;
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
        transition: 0.8s;
        color: #ddd;
    }
    .sub:hover
    {
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
        height: 40px;
        outline: none;
        font-weight: bold;
        transition: 0.8s;
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
         
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <div class="row mt-2">  
              <div class="col-12 mb-5">
                <h1 class="hone text-center">Provide class activities</h1>
              </div>
              
               <div class="col-12  mt-4">   
                <h3 class = "lable1 fs-5 text-center">Miss Introduction</h3>
               </div>
              <div class="col-12 text-center mt-4">       
                  <input type="text" name="tetch"  class="text1 W-50 text-center" value="<?php echo $name_tetcher[0]?>"  >
              </div>
              
              <div class="col-12 mt-3">
                <h3 class = "lable3 fs-5 text-center">Note made</h3>
              </div>
              
              <div class="col-12 mt-4">
                <textarea name="area" style="" class="text3" required></textarea>
              </div>
              
              <div class="col-12 mt-4">
                <input type="submit" name="sub" value="Send Note" class="sub w-100" >
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
    if(isset($_POST['sub'])){
         $tetcher = $_POST['tetch'];
          $message_all = $_POST['area'];
            $date = date("Y/m/d");
          
$sql = "INSERT INTO message_all VALUES('$tetcher','$message_all' , '$date')";
    
$result = mysql_query($sql,$conn);
 if($result)
 {
         echo "<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize'><h3 style='text-align:center;' > Oparation Add Message To Student ". $tetcher."successfully<h3></div>";
    echo"<meta http-equiv = \"refresh\"content=\"1;url=message_all.php\">";

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
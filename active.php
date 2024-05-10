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
        }
    h1
    {
        color: rgba(0,0,0,1);
        font-size:40px;
        letter-spacing: 2px;
        word-spacing: 5px;
        text-shadow: 2px 2px 15px #572F85;
    }
    .pone , .ptwo , .pthree
    {
        font-size: 25px;
        font-weight: bold;
        text-shadow: 10px 10px 20px #ddd;
    }

    .text1 , .text2 , .text3
    {
        width: 500px;
        height: 40px;
        border: solid 2px #572F85;
        border-radius: 10px 10px;
        outline: none;
        font-size: 25px;
        direction:rtl;
        transition: 0.5s;
    }
    .text1:focus , .text2:focus , .text3:focus
    {
        box-shadow: 8px 8px 30px #572F85,
                    -8px -8px 30px #572F85;
        border: 3px solid #572F85;
    }
            .sub
    {
        height: 50px;
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
        width: 320px;
        box-shadow: 10px 10px 30px #572F85;
        color: #000;
    }
    
      .butback
    {
        border:1px solid #000;
        background-color: #000;
        border-radius: 15px 1px;
        color:#fff;
        font-size:15px;
        width: 150px;
        height: 40px;
        outline: none;
        transition: 0.5s;
        font-weight: bold;
        font-size: 20px;
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

             <input type="submit" name="back" value="Main Menu" class="butback">

            </form>
        </div>
        
    
  
 <div class="col-12 text-center">
     
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="row mt-4">
            <div class="col-12 mb-5">   
                <h1 class="text-center">activity to the student</h1>
            </div>
            
            <div class="col-12 mt-5">
                <h3 class = "pone fs-5 text-center">teacher's name</h3>
             </div>
            
            <div class="col-12 text-center ">
                <input type="text" name="tetchname"  class ="text1 w-50 text-center"  value="<?php echo $name_tetcher[0]?>">
             </div>   
                
            <div class="col-12  mt-5">  
                <h3 class = "ptwo fs-5 text-center">Active</h3>
             </div>   
            <div class="col-12 text-center ">
                <input type="text" name="activ"  class ="text2 w-50 text-center" required>
             </div>   
                
            <div class="col-12 mt-5">   
            <h3 class = "pthree fs-5 text-center">
Today's lesson</h3>
             </div>   
            <div class="col-12 text-center">
            <input type="text" name="dars"  class ="text3 w-50 text-center" required>
            </div> 
            
            <div class="col-12 mt-5">   
            <h3 class = "pthree fs-5 text-center">Date Requerd</h3>
             </div> 
            <div class="col-12 text-center">
            <input type="date" name="datereq"  class ="text3 w-50 " required>
            </div>
                
           <div class="col-12 mt-5">      
            <input type="submit" name="send" value="Send Group" class="sub w-100 btn">
            </div>
            </div>
        
    </form>
     
</div>
     </div>
    </div>
<script src="js/bootstrap.bundle.min.js"></script> 
 <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      include("config.php");
        
        if(isset($_POST['send'])){
        $tetcher = $_POST['tetchname'];
        $active = $_POST['activ'];
        $address_day = $_POST['dars'];
        $date = date('Y/m/d');
        $dataerq = $_POST['datereq'];
       
        
        
        $sql_check = "select * from active_table where tetcher = '$tetcher'";
        $result_check = mysql_query($sql_check,$conn);
        $num = mysql_num_rows($result_check);
        $arr_check = mysql_fetch_array($result_check);
            
            
        
        $sql_insert = "INSERT INTO active_table VALUES('$tetcher','$address_day','$active','$date' , '$dataerq')";
        

        

        $result_insert = mysql_query($sql_insert,$conn);
        }
        if(isset($result_insert)){ 
            echo"<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'>Sucssfuly  Oparetion send the student active</h3></div>";
             echo"<meta http-equiv = 
             \"refresh\"content=\"2;url=active.php\">";
        }else
        {
            echo(mysql_error());
        }
        }
                if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }
   
    
    
    ?>   
    
    
    


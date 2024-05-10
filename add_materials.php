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
        font-size:50px;
        letter-spacing: 2px;
        word-spacing: 5px;
        text-shadow: 2px 2px 10px #572F85;

    }
    .text1 , .text2 , .text3
    {
 
        height: 40px;
        border:2px solid #000;
        border-radius: 10px 10px;
        outline: none;
        font-size: 25px;
        padding: 7px;
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
        border-radius: 0px 1px 15px 1px;
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
<body>
    <div class="container-fluid">
        <div class="row">   
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="submit" name="back" value="Main Menu" class="butback">
                </form> 
            </div>
            
            
<div class="col-12">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="row mt-4">
            <div class="col-12 mb-5"> 
                <h1 class = "text-center">Semester registration</h1>
            </div>
            <div class="col-12 mt-5 text-center">       
                <input class = "text1 fs-5 w-50" type="text" name="materials" placeholder=" name semester article" required>
            </div>
            
             <div class="col-12 text-center mt-5">   
                <input class = "text2 fs-5 w-50" type="text" name="top" placeholder="Top Mark" required>
             </div> 
            
             <div class="col-12 text-center mt-5">
                <input class = "text3 fs-5 w-50" type="text" name="down" placeholder="Down Mark" required>
             </div>
            
             <div class="col-12 mt-5">       
                 <input  class = "sub w-100 btn"type="submit" name="subadd" value="Add Materials" >
             </div>
        </div>
    </form>
</div>
            
</div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script> 

<?php
include("config.php");

      
if($_SERVER['REQUEST_METHOD'] = 'POST') {
    
        if(isset($_POST['subadd'])){
    $materials = $_POST['materials'];
    $top = $_POST['top'];
    $down= $_POST['down'];
     $sql_add = "insert into materials values('$materials','$top','$down')";
    
    
    $result_materials = mysql_query($sql_add,$conn);
    
    if($result_materials)
    {
        echo "<h4>تم اضافة المادة الى جدول المواد الفصلية</h4>";
        echo"<meta http-equiv = \"refresh\"content=\"2;url=add_materials.php\">";

    }else
    {
        echo mysql_error();
      }
     }
                    if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }   

    }

?>
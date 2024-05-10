<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="w3.css">
    <style>
        body
        {
            background-color:aliceblue;
        }
        h1
        {
            font-size: 45px;
            font-weight: bolder;
            text-shadow: 0px 0px 8px rgba(0,0,0,0.8); 
            color: #000;
        }
        
        table
        {
            font-size: 20px;
            background-color: transparent;
            box-shadow: 100px 60px 100px #eee;
            
        }
        table th
        {
            font-size: 25px;
            font-weight: bolder;
            color: #572F85;
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
        height: 40px;
        transition: 0.5s;
    }
    .butback:hover
    {
        color:#572F85;
        width: 170px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                 <input type="submit" name="back" value="Back" class="butback">
                </form>
            </div>
            
            <div class="col-12 mb-5">
                <h1 class="col-12 text-center ">الجلسات اليومية</h1>
            </div>
    
<?php 
session_start();
include("config.php");
                      

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    
    
 if (isset($_SESSION['user']))
 {
     $name_tetcher = explode("@",$_SESSION['user']);
 }
            
    

     if(isset($_POST['sub1']))
        {
            $sql = "select * from view_session where tetcher = '$name_tetcher[0]'";
        }


$result = mysql_query($sql,$conn);
?>
<div class="col-12 text-center w-100">
    <table class="table table-hover text-center table-striped table-bordered "  >
       <thead class="thead-dark">
        <tr>
        <th>رقم الجلسة</th><th>عنوان الدرس</th><th>عدد الحضور</th><th>تاريج الجلسة</th>
        </tr>
       </thead>
    <?php

    while ($arr_display = mysql_fetch_array($result))
    {
        ?>
        <tr >
        <td style=""><?php echo $arr_display[0]?></td>
        <td><?php echo $arr_display[2]?></td><td><?php echo $arr_display[3]?></td><td ><?php echo $arr_display[4]?></td>
        </tr>
        <?php
    }
        if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=select_tetcher_session.php\">";
    }
    
}
?>
</table>
    </div>
        </div>
    </div>
  </body>
    </html>
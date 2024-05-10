
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
              background-color: #cef7e6;
            font-family:cursive;
    }
    table th 
    {
        color: rgba(0,110,120,0.7);
    }
    h1
    {
            font-size:50px;
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1);
    }
    .sp
    {
        text-decoration: underline;
        color:cadetblue; 
        font-weight: bold;
    }
</style> 
    
</head>
<body>
    <?php
    session_start();
    $user = explode('@',$_SESSION['user']);
    
   include("config.php");
    
    $sql_info = "SELECT * FROM info WHERE email= '$_SESSION[user]'";
    $arr_info = mysql_fetch_array(mysql_query($sql_info,$conn));
    
    
    
    
    $sql_mark_stu = "select * from mark_student where  email= '$_SESSION[user]'";
    $result_mark_stu = mysql_query($sql_mark_stu , $conn);
    
    
    
    $sql_sum = "select sum(mark) from mark_student WHERE email= '$_SESSION[user]'";
    $result_sum = mysql_query($sql_sum , $conn);
    
    $sum_mark = mysql_fetch_array($result_sum);
    $num =mysql_num_rows($result_mark_stu) * 100;
    if($num == 0)
    {
        $num = 1;
    }
    $check = ceil($sum_mark[0] / $num  * 100);
    $gread = ceil($sum_mark[0] / $num  * 100) . "%"; 
    
  if($check<50){$takder = " متدني جدا";}
  else if($check<60){$takder = " مقبول";}
  else if($check<75){$takder = " جيد";}
  else if($check<90){$takder = " جيد جدا";}
  else if($check<98){$takder = " ممتاز";}
    
    ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-2 mb-5">
            <h1 class="text-center"><?php  echo "Mark Student <p class='fw-bold text-danger'>( ".$user[0]." ) </p>"?></h1>
        </div>

    <br><br>
    
    
    
  
        <table class="table table-responsive table-hover table-striped table-bordered fw-bold" style="border: 3px solid #000">
    
            <th class="text-center fs-3 fw-bold">Tetcher</th>
            <th class="text-center fs-3 fw-bold">Material</th>        
            <th class="text-center fs-3 fw-bold">Mark</th>
            <th class="text-center fs-3 fw-bold">Appreciation</th>            
            
     <?php 
    while($arr_mark_student = mysql_fetch_array($result_mark_stu))
    {
        if($arr_mark_student[5]<50){$color ="red"; $final = "F";}
        else if($arr_mark_student[5]>=50){$color = "forestgreen"; $final = "A";}
        
    ?>
 <tr  style="font-size:20px;">                
<td style="text-align:center;"><?php echo $arr_mark_student[3]?></td>
<td style="text-align:center;"><?php echo $arr_mark_student[4]?></td>
<td style="color:<?php echo $color;?>;text-align:center;"><?php echo $arr_mark_student[5]?></td>   
<td style="color:<?php echo $color;?>;text-align:center;"><?php echo $final ?></td>
 </tr>         
         
            
            <?php
    }
    ?>  
            <tr><td colspan="5" style="text-align:center;"><h4><?php echo "<span class='sp'>". $gread ."</span>"."  : التقدير المئوي للمواد";?></h4></td></tr>
            <tr><td colspan="5" style="text-align:center;"><h4><?php echo "التقدير الشفوي للمواد :  <span class ='sp'>".$takder."</span>";?></h4></td></tr>
    </table>
    </div>
    </div>
    </body>
</html>
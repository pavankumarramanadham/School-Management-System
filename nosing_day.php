<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="w3.css">
    <style>
        table
        {
        }
        table th 
        {
             color:rgba(0,110,120,0.7);
        }

        body
        {
            background-color: #cef7e6;
              font-family:cursive;
        }
        h1
        {
                        font-size:50px;
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1); 
        }
        
            @keyframes nosing {
  0%   {color: red}
  25%  {color: white}
  50%  {color: red}
  75%  {color: white}
  100% {color: red} }
        
        p
        {
             animation-name: nosing;
             animation-duration: 3s;
             animation-iteration-count: infinite;
             animation-timing-function: ease-in-out;
        }
    </style>
</head>
<body>
    <?php
    session_start();
  $arr_stu = explode('@',$_SESSION['user']);
    ?>
    <div class="container-fluid" style="">
        <div class="row">

<?php
 
include("config.php");

  
$sql_info = "SELECT * FROM info WHERE email= '$_SESSION[user]'";  
$arr_info = mysql_fetch_array(mysql_query($sql_info,$conn));




$sql_day_nosing = "select * from nosing where id=$arr_info[11]";
$result_day_nosing = mysql_query($sql_day_nosing , $conn);
$num = mysql_num_rows($result_day_nosing);
if($num == 0)
{
    echo "<div class='alert alert-success text-center fs-1 fw-bold' >Not Found Absences Day</div> ";
}

else
{
?>
    
                <div class="col-12 mt-2 mb-5">
                    <h1 class="text-center fw-bolder"><?php echo "Absences Day <br> <p class='badge bg-secondary fw-bolder pt-0'>".$arr_stu[0]." <p>"?> </h1>
                </div>
            <div class="col-3"></div>
        <div class="col-6 text-center">
            <table class="table table-hover table-bordered table-striped w-100" style=" font-size: 17px;font-weight: bold;border:3px solid #000" >
                     <th>History</th><th>Day</th>
                        <?php


                    $i = 0;
                    while ($arr_day_nosing = mysql_fetch_array($result_day_nosing))
                    {
                       $arr_day = explode('/',$arr_day_nosing[3]);
                        $i+= $arr_day_nosing[1];
                        ?>

                        <tr>
                          <td><?php echo $arr_day[0]?></td>
                          <td><?php echo $arr_day[2]?></td>
                        </tr>

                    <?php

                    }
                        ?>

            </table>
        </div>   
            <div class="col-12">
                
                <p class="text-danger text-center "><?php  echo "<div class='alert alert-success text-center fs-1 fw-bold '><p class='badge bg-secondary fw-bolder mt-4'>".$i."<p></div>";?></p>
            </div>
            <?php }?>
</div>
        
    </div>
    </body>
</html>
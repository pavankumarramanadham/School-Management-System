<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>

      .address
      {

          font-size:50px;
        
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1);
      }

      body
      {
         background-color: #cef7e6;
            font-family:cursive;
      }



      
     



 

</style>
</head>
<body>
    <div class="container-fluid" >
        <div class="row">
            
            <div class="col-12 mb-5 mt-3">
                <h1 class="address text-center">Activ Student</h1>
            </div>

<?php

 @session_start() or die("");
include("config.php");

$sql1 = "select * from info where email='$_SESSION[user]'";
$result1 = mysql_query($sql1,$conn);
$arr_info = mysql_fetch_array($result1); 
            
$sql2 = "select * from active_table where tetcher = '$arr_info[10]' ";
$result2 = mysql_query($sql2,$conn);
$num1 = mysql_num_rows($result2);  
            
$arr_info = mysql_fetch_array($result1);
$user = explode('@' ,$_SESSION['user']);
$i = 0;

if($num1 != 0){ 
while($arr_active = mysql_fetch_array($result2)){
        $i = $i + 1;
    $array_valedite = explode("-" , $arr_active[4] );
    $array_valedite_now = explode("/" , date('Y/m/d'));
    
    //validate years 
    if($array_valedite[0] < $array_valedite_now[0])
    {
        $Group_list = "list-group-item-danger";
        $report = " REQUERD ";
        $text_req = "text-danger";
    }
    else if($array_valedite[0] > $array_valedite_now[0])
    {
        $Group_list = "list-group-item-primary";
        $report = " NO REQUERD ";
        $text_req = "text-primary";
    }
    else 
    {
        //validate month
        if($array_valedite[1] < $array_valedite_now[1])
        {
             $Group_list = "list-group-item-danger";  
             $report = " REQUERD ";
            $text_req = "text-danger";
        }
        else if ($array_valedite[1] > $array_valedite_now[1])
        {
            $Group_list = "list-group-item-primary";
            $report = " NO REQUERD ";
            $text_req = "text-primary";
        }
        else
        {
            //valedate day
            if($array_valedite[2] < $array_valedite_now[2])
            {
                $Group_list = "list-group-item-danger";
                $report = "REQUERD ";
                $text_req = "text-danger";
            }
            
            else 
            {
                $Group_list = "list-group-item-primary";
                $report = " NO REQUERD ";
                $text_req = "text-primary";
            }
        }
    }
    ?>
   
            <div class="col-12 col-md-4 text-center px-0 mb-4">
                <ul class="list-group fw-bold">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="my-0 fs-4 text-">ACTIVE STUDENT<p>
                    <span class="badge bg-danger rounded-pill fs-5 mt-2"><?php echo $i ?></span>
                  </li>
                  <li class="list-group-item list-group-item-warning list-group-item-action"><?php echo "Tetcher : ".$arr_active[0];?></li>
                  <li class="list-group-item list-group-item-secondary list-group-item-action"><?php echo "Adrress Lesson : ". $arr_active[1];?></li>
                  <li class="list-group-item list-group-item-dark list-group-item-action"><?php echo "Active : ". $arr_active[2];?></li>
                  <li class="list-group-item list-group-item-success list-group-item-action"><?php echo "Date : ". $arr_active[3];?></li>
                  <li class="list-group-item  list-group-item-action <?php echo $Group_list; ?> "> <?php echo "Date Requerd :" . str_replace("-","/",$arr_active[4]) ."<br><p class = 'badge bg-dark rounded-pill " .$text_req ."'>" . $report . "</p>" ;?></li>
                    
                </ul>
            </div>
            
  

<?php
}

}else 
{
echo "<div class='alert alert-success text-center fs-1 fw-bold' >Not Found Active , Thanks For Thier Action</div>";
}


?>
       </div>
    </div>   
    <script>
   
    </script>
    </body>
</html>


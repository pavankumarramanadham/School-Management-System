
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>altafwak-scool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">

<style>
    
    @keyframes alert {
  0%   {color:#009688;display:block;}
  25%  {color:black;display: none;}
  50%  {color:#009688; display: block;}
  75%  {color:black;display: none}
  100% {color:#009688;display: block}
}
    .alert
    {
        width:100%;
        font-weight:bolder;
        text-align: center;
        animation-name: alert;
        animation-duration:5s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        height: 80px;
        line-height: 50px;
    }

    .subbb
    {
        background-color: #000;
        color: aliceblue;
        border: 3px solid  rgba(0,110,120,0.7);
        height: 32px;
        border-radius: 10px 10px ;
        width: 130px;
        outline: none;
            
    }
    .subbb:hover
    {
         background-color: #aaa;
         color: #000;
        
    }
    body
    {
          font-family:cursive;
    }

</style>         
</head>
<body>




<?php
include("config.php");
    
    if (isset($_SESSION['user'])){
    $sql_info = "SELECT * FROM info WHERE email= '$_SESSION[user]'";
    $arr_info = mysql_fetch_array(mysql_query($sql_info,$conn));

    $sql_day_sing = "select * from sing where id=$arr_info[11]";
    $result_day_sing = mysql_query($sql_day_sing , $conn);
    $arr_day_sing = mysql_fetch_array($result_day_sing);
    
    
    
     $sql_tetcher= "select * from sing_num where tetcher='$arr_info[10]'";
    $result_tetcher = mysql_query($sql_tetcher , $conn);
    $arr_tetcher = mysql_fetch_array($result_tetcher);
    

    
    $sql_sum_day_nosing = "select id,count(nosing_num)from nosing where id=$arr_info[11]";
    $result_sum_day_nosing = mysql_query($sql_sum_day_nosing , $conn);
    $arr_sum_day_nosing = mysql_fetch_array($result_sum_day_nosing);
    
    
    $sum = $arr_sum_day_nosing[1];
    $color_rate = round (($arr_day_sing[1]/$arr_tetcher[1]*100));
    $rate = round (($arr_day_sing[1]/$arr_tetcher[1]*100))."%"; 
    
    if($color_rate >= 50)
    {
        $color = "#28c76f";
    }else if($color_rate < 50)
    {
        $color = "red";
    }
    
    if ($arr_info[13] == '1')
    {
        $class = "الأولى";
    }else if ($arr_info[13] == '2')
    {
        $class = "الثانية";
    }else  if ($arr_info[13] == '3')
    {
        $class = "الثالثة";
    }else if ($arr_info[13] =='4')
    {
        $class = "الرابعة";
    }
    
    
    
 $sql_mark_stu = "select * from mark_student where  email= '$_SESSION[user]'";
 $result_mark_stu = mysql_query($sql_mark_stu , $conn);
    
    
    
$sql_sum = "select sum(mark) from mark_student WHERE email= '$_SESSION[user]'";
$result_sum = mysql_query($sql_sum , $conn);
$sum_mark = mysql_fetch_array($result_sum);
$num =mysql_num_rows($result_mark_stu) * 100;
    if($num ==0)
    {
        $check = 0 . "%";
    }else
    {
        $check = ceil($sum_mark[0] / $num  * 100);
    }
    if($num ==0)
    {
        $gread = 0 . "%";
    }
    else
    {
    $gread = ceil($sum_mark[0] / $num  * 100) . "%";
    }
 if($check<50){$takder = " متدني جدا";$color_mark = "red";}
 else if($check<60){$takder = " مقبول";$color_mark = "green";}
 else if($check<75){$takder = " جيد";$color_mark = "green";}
 else if($check<90){$takder = " جيد جدا";$color_mark = "green";}
 else if($check<98){$takder = " ممتاز";$color_mark = "green";}
    
    
?>
 
    
    
        
  <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-5 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i><h4><?php echo $arr_info[0]." ".$arr_info[3] ." ".$arr_info[1]?></h4></div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                
                <a href="display_active.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-pencil-alt me-2"></i>Active</a>
                
                <a href="show_message_stu.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-alt me-2"></i>Messages</a>
                
                <a href="show_mark_student.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-address-book me-2"></i>Mark</a>
                
                <a href="logout_user.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
      

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $arr_info[0]." ".$arr_info[3] ." ".$arr_info[1]?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">#</a></li>
                                <li><a class="dropdown-item" href="#">#</a></li>
                                <li><a class="dropdown-item" href="logout_user.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        
                        <!--1-->
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded mb-md-5">
                            <div>
                                                                
                                <p class="fs-2"><?php echo $arr_info[0]?></p>
                                
                                <h3 class="fs-5"><?php echo ($arr_info[11])?></h3>

                                
                            </div>
                                <img src="<?php echo $arr_info[9]?>" alt="Person" style="width:100px;height:100px" class="border rounded-full secondary-bg p-1">
                        </div>
                    </div>
                    
                    <?php
                         $arr_age = explode('/',$arr_info[4]);
                         $date = date("Y");
                    ?>
                    
                    <!--2-->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">Age</p>
                                <h3 class="fs-5"><?php echo (($date -$arr_age[0]) )?></h3>
                                
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
                    
                    <!--3-->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">MOM</p>
                                <h3 class="fs-5"><?php echo $arr_info[2]?></h3>
                                
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
                    <!--3-->
                    <div class="col-md-3 ">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">DAD</p>             
                                <h3 class="fs-5"><?php echo $arr_info[3]?></h3>

                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                
                    <div class="col-md-3 mb-md-5">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">Class</p>
                                
                                <h3 class="fs-5"><?php echo $class?></h3>
                                
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                
            
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                 <p class="fs-2">Tetcher</p>
                                <h3 class="fs-5"><?php echo $arr_info[10]?></h3>
                               
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
      
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">Phone Scool</p>
                                <h3 class="fs-5">6915232</h3>
                                
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
  
      
                    <div class="col-md-3">
                        <div class="p-4 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo "absences " . $sum ?></h3>
                                
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><input type='submit' name="day_nosing" value="View absences" style="" class="subbb"></form>
                                
                            
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>  
                
                    
                    <div class="col-md-6">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2"><?php echo "Marks ".$takder?></p>                                
                                <h3 class="fs-5"><?php echo "<span style='color:$color_mark'>".$gread.'</span>'?></h3>

                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                
      
                    <div class="col-md-6 mb-md-5">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-2">Sing</p>
                                <h3 class="fs-5">
                                <?php echo "<span style='color:$color'>".$rate.'</span>'?>
                                </h3>
                                
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-md-5">
                    
                      <div class="alert alert-secondary mt-md-5">
                            <strong>WELCOM!</strong>Learning Is Great <a href="#" class="alert-link" style="hight:200px;">Page in Fecebook</a>.
                      </div>
                    
                    </div>
                
      </div>
            </div>
      </div>
    </div>
    

    

    
    
    
    
    
    
<?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                if(isset($_POST['day_nosing']))
                {
 echo("<meta http-equiv = \"refresh\"content=\"0;url=nosing_day.php\">");
                }
            }

    

    }
    
    else
    {
        echo "<div class='alert alert-danger text-center fs-3'>Sorry , We Can't View The Page </div>";
         echo("<meta http-equiv = \"refresh\"content=\"3;url=login.html\">");
    }
    

?>
    
    
    <script src="js/bootstrap.bundle.min.js"></script>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
            var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
</script>
    
 </body>

</html>


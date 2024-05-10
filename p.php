<?php
session_start();


?>


<html>
    
    
    <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>مدرسة التفوق الخاصة</title>
<style> 
.container-fluid
{
    padding-right: 0px;
}
.row 
{
    margin-right: 0px;
}
    .navbar-light .navbar-nav .nav-link:hover
    {
        font-size: 18px;
    }
    .navbar-light .navbar-brand:hover
    {
        color: aliceblue;
    }
    .navbar-light .navbar-brand{
        transition: 0.7s;
    }
    .navbar-light .navbar-nav .nav-link
    {
        transition: 0.5s;
    }
        </style>

    </head>
    
    <body>
        
        
        <?php
        if (isset($_SESSION['user'])){
          include("config.php");
            
            $sql_select = "select * from acount where user = '$_SESSION[user]' ";
            $result_select = mysql_query($sql_select , $conn);
            $array_info = mysql_fetch_array($result_select);
            
            if($array_info[3]=="admin"){
                
                //Page admin 
        ?>
	
<!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active me-3 btn btn-outline-dark"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1" class="me-3 btn btn-outline-dark"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2" class="btn btn-outline-dark"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image_icon/background7.jpg" alt="Los Angeles" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image_icon/background11.jpg" alt="Chicago" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
          </div> 
        </div>
        <div class="carousel-item">
          <img src="image_icon/background4.jpg" alt="New York" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
          </div>  
        </div>
      </div>

    </div>
       
        
        
        
        
        
            <!-- start navbar -->
 <div class="container-fluid">
        
       <div class="row">
            
        <nav class="navbar navbar-expand-lg navbar-light header" style="background-color:#572F85">
         
             <a class="navbar-brand" href="#"><i class="fas fa-book-open fs-1"></i></a>  
            
            <a class="navbar-brand fs-3 fw-bold pb-3" href="#">AL_Tafwak_Scool</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                
              <ul class="navbar-nav ul-nav">
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="views.php">Table Student</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="add.php">Add Student</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="add_materials.php">sing materials</a>
                </li> 
                  
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="show_mark_admin.php">check mark</a>
                </li> 
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="creatuser.php">creat acount</a>
                </li> 
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>                   
                  
                <li class="nav-item fw-bold">
                  <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
              </ul>
            </div>
          
        </nav>
        
     </div>
</div>
 <!-- end navbar -->  
        
        
        
        
        
        
        
        
        <!--جسم الصفحة -->
<div class="container-flid" style="background-color: aliceblue;">
            
    <div class="row">       
          
            <div class = " col- fs-1 text-dark text-center mt-5 fw-bold">
                <h1>Al-Tafwak Private School</h1>
            </div>
            
            
            <div class = " col-fs-3 text-dark text-center mt-5 ">
                <p>
                   <q>Welcom to Al-Tafwak School</q> 
                </p>
            </div>
            
            <div class="col- text-dark mt-5 mb-4 fs-5 text-center">
                <p>
                    <span class="fs-2 fw-bold" style="color:#572F85">information!</span><br> phone : 0943392263 <br> location : Rif-damscus/Alkswa<br>Website : <a>AL-Tafwak School@gamil.com</a> 
                </p>
            </div>
    
    </div>
       </div> 
        
                <?php
            }
            
            else if($array_info[3]=="tetcher")
            {
                
                //tetcher page 
                
            ?>
        
        
        
        
        
        
        
        
        
        
                
                <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active me-3 btn btn-outline-dark"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1" class="me-3 btn btn-outline-dark"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2" class="btn btn-outline-dark"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image_icon/background7.jpg" alt="Los Angeles" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image_icon/background11.jpg" alt="Chicago" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
          </div> 
        </div>
        <div class="carousel-item">
          <img src="image_icon/background4.jpg" alt="New York" class="d-block" style="width:100%;height:70%">
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
          </div>  
        </div>
      </div>

    </div>
       
        
        
        
        
        
            <!-- start navbar -->
 <div class="container-fluid">
        
       <div class="row">
            
        <nav class="navbar navbar-expand-lg navbar-light header" style="background-color:#572F85">
         
             <a class="navbar-brand" href="#"><i class="fas fa-book-open fs-1"></i></a>  
            
            <a class="navbar-brand fs-3 fw-bold pb-3" href="#">AL_Tafwak_Scool</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                
              <ul class="navbar-nav ul-nav">
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="viewstetch.php">Tetchers</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="sing_yes.php">SingON</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="select_tetcher_session.php">AlJlsat</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="message_stu.php">Add message</a>
                </li>
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="active.php">Add active </a>
                </li> 
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="sing_mark1.php">sing mark</a>
                </li> 
                  
                <li class="nav-item fw-bold me-1 ">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>                   
                  
                <li class="nav-item fw-bold">
                  <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
              </ul>
            </div>
          
        </nav>
        
     </div>
</div>
 <!-- end navbar -->  
        

        <!--جسم الصفحة -->
<div class="container-flid" style="background-color: aliceblue;">
            
    <div class="row">       
          
            <div class = " col- fs-1 text-dark text-center mt-5 fw-bold">
                <h1>Al-Tafwak Private School</h1>
            </div>
            
            
            <div class = " col-fs-3 text-dark text-center mt-5 ">
                <p>
                   <q>Welcom to Al-Tafwak School</q> 
                </p>
            </div>
            
            <div class="col- text-dark mt-5 mb-4 fs-5 text-center">
                <p>
                    <span class="fs-2 fw-bold" style="color:#572F85">information!</span><br> phone : 0943392263 <br> location : Rif-damscus/Alkswa<br>Website : <a>AL-Tafwak School@gamil.com</a> 
                </p>
            </div>
    
    </div>
       </div>
                
   
                
                
        <?php 
            }
        }
        else
        {
            echo "<div class='alert alert-danger text-center fs-3'>Sorry , We Can't View The Page </div>";
            echo("<meta http-equiv = \"refresh\"content=\"3;url=login.html\">");
        }
        ?>
		
		<!--تنسيق حركات الغلاف -->

		
	<script src="js/bootstrap.bundle.min.js"></script>	
        
    </body>
    
    
    
    
    
    
    
</html>

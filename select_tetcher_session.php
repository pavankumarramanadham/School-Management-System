<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        *
        {
            cursor:context-menu;
        }
        body
        {
            background-color: aliceblue;            
        }
.one,.two , .three , .four {
  border-radius: 18px;
  background-color: #572F85;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
    outline: none;
}

.one ~span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#572F85;
}

.one ~span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -95px;
  left: 40px;
  transition: 0.8s;
}

.one:hover ~span {
  padding-right: 25px;
  
}

.one:hover ~span:after {
  opacity: 1;
  right: 0;
}
        .one:hover
        {
            width: 230px;
        }
        
         .two:hover
        {
            width: 230px;
        }
        .three:hover
        {
            width: 230px;
        }
        
        .four:hover
        {
            width: 230px;
        }      
        
.two ~span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#572F85;
}

.two ~span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -95px;
  left: 40px;
  transition: 0.8s;
}

.two:hover ~span {
  padding-right: 25px;
  
}

.two:hover ~span:after {
  opacity: 1;
  right: 0;
}      
       
        
        
.three ~span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#572F85;
}

.three ~span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -95px;
  left: 40px;
  transition: 0.8s;
}

.three:hover ~span {
  padding-right: 25px;
  
}

.three:hover ~span:after {
  opacity: 1;
  right: 0;
}
       
.four ~span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#572F85;
}

.four ~span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -95px;
  left: 40px;
  transition: 0.8s;
}

.four:hover ~span {
  padding-right: 25px;
  
}

.four:hover ~span:after {
  opacity: 1;
  right: 0;
}
        

        h1
        {
            font-size:45px;
            color: rgb(0,0,0);
            cursor:context-menu;
            letter-spacing: 3px;
            
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
        
        .address
      {
            font-size:50px;
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1);
      }
        
    
    </style>
</head>
<body>
    
    <?php
session_start();
$conn = mysql_connect("localhost","root","");
mysql_select_db("dbscool",$conn);
    
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
        
        <div class="col-12 mb-5">
            <h1 class="text-center address">Teachers Sessions</h1>
        </div>
        
        <div class="col-12 text-center mb-5">
            <form action="view_sing_admin.php" method="post">
                
                <input type="submit" name="sub1" value="<?php echo " Galsat The Tetcher " . $name_tetcher[0]?>" class="one w-75">
                <span></span>

            </form>
        </div>    

    
    </div>
    </div>
<script src="js/bootstrap.bundle.min.js"></script>    
    <?php
            if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }
    
    ?>
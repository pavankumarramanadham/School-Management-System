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
        font-weight: bolder;
        font-size: 40px;
        color: rgba(0,0,0,1);
        text-shadow: 3px 3px 15px #000;
    }
.button {
  border-radius: 25px;
  background-color: #572F85;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  transition: all 0.8s;
  cursor: pointer;
  outline: none;
  font-weight: bold;
    box-shadow: 10px 10px 30px #572F85,
                -10px -10px 30px #572F85;
    border: 3px solid #000; 
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#000;
    transition: 0.8s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -100px;
  left: 10px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
  
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
        .button:hover
        {
            width: 330px;
        }
        .butback
    {
        height: 30px;
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
<div class="container-fluid">
   
    <div class="row">
        
        <div class="col-12">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
             <input type="submit" name="back" value="Main Menu" class="butback">
            </form>
        </div>
        
        <div class="col-12 text-center mt-5 mb-5">
            <h1>Giving notes to students</h1>
        </div>
        <hr>
        
        <div class="col-12  mt-5 mb-5">
            <a href="message_single.php"><button class="button btn w-100">Single note<span> </span></button></a>
        </div>
        
        <div class="col-12 mt-5">
            <a href="message_all.php"><button class="button btn w-100">group note<span> </span></button></a>
         </div>
        

        
    </div>
</div>
    
    <?php
                if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }
    
    ?>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
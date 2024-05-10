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
        margin: 0px;
        padding: 0px;
    }
    h1
    {
        font-size:50px;
        font-weight: bolder;
        color: rgba(0,0,0,1);
        text-shadow: 4px 4px 6px #aaa;
       
    }
    
    .select1
    {
        font-size:25px;
        outline: none;
        color: #572F85;
    }
    .select1:focus
    {
        border: 3px solid #572F85;
    }
     .select2:focus
    {
        border: 3px solid #572F85;
    }
    
    .select2
    {
        font-size:25px;
        color: #572F85;
        outline: none;
    }
    .sub
    {

        height:60px;
        font-size:20px;
        border-radius: 10px 15px;
        background-color:#572F85;
        color: #000;
        transition: 0.8s;
    }
    .sub:hover
    {
        width: 360px;
              box-shadow: 2px 2px 15px #aaa,
                    -2px -2px 10px #aaa;
        color: #fff;
    }
    .perant
    {
        background-color:transparent;
        width:620px;
        height:400px;
        border-radius: 30px 30px;
        box-shadow: 11px 11px 30px #000,
                    -11px -11px 30px #000;
        margin-top:150px;
    }
    .h12
    {
        color: rgba(0,0,0,1);
        text-shadow: 4px 4px 6px #aaa;
    }
    .subsing
    {
        height:50px;
        font-size:20px;
        background-color:#572F85;
    }
    .subsing:hover
    {
        color:#fff;
        box-shadow: 5px 5px 10px #aaa;
        transition: 1s;   
    }
    .mark
    {
        box-shadow: 2px 2px 10px #aaa;
        height: 35px;
        width: 100%;
        text-align: center;

    }
    ::placeholder
    {
        color:rgba(0,0,0,0.6);
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
    <link rel="stylesheet" href="w3.css">
</head>
<body>



<?php
session_start();
    
 if (isset($_SESSION['user']))
 {
     $name_tetcher = explode("@",$_SESSION['user']);
 }
            
    

include("config.php");
     
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
         if (isset($_POST['subshow'])){
             
             
        $tetcher=$_POST['tetcher'];
        $materials = $_POST['materials'];
        
        
        $sql_materials = "select * from materials where materials = '$materials'";
        $sql_info = "select * from info";
        $sql_info_tetcher = "select * from info where name_tetcher = '$tetcher'";
             
        $result_materials= mysql_query($sql_materials,$conn);
        $result_info= mysql_query($sql_info,$conn);
        $result_info_tetcher = mysql_query($sql_info_tetcher,$conn);
             
        $arr_materials = mysql_fetch_array($result_materials);
        $arr_info = mysql_fetch_array($result_info);
      
        
        ?>
        
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                 <input type="submit" name="back" value="Main Menu" class="butback">
                </form>
            </div>
            
            <div class="col-12 mt-3 mb-5">
                <h1 class="h12 text-center fw-bold"><?php echo "Sing Marks (".$materials . ")" ?></h1>
            </div>
            
            <div class="col-12 mb-5">
                <div class="row">
                    <div class="col-12 col-md-4 text-center mt-2 " style=" background-color:#572F85;border-radius: 20px;">
                        <p style="font-size:24px;color:#fff"><?php echo"Tetcher : ". "<span style = 'color:#ccc'>".$tetcher."</span>"?></p>
                     </div>   
                    
                    <div class="col-12 col-md-4 text-center mt-2 " style=" background-color:#572F85;border-radius: 20px;">
                        <p style="font-size:24px;color:#fff"><?php echo  "TOP Mark : "."<span style = 'color:#ccc;text-decoration: underline'>".$arr_materials[1] ."</span>" ?></p>
                    </div>  
                        
                    <div class="col-12 col-md-4 text-center mt-2" style=" background-color:#572F85;border-radius: 20px;">
                        <p style="font-size:24px;color:#fff" ><?php echo "DOWN Mark : "."<span style = 'color:#ccc;text-decoration: underline'>".$arr_materials[2]."</span>"?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-12 w-100 text-center">
                <table class="table table-hover w-100 table-bordered table-striped">
                    <div class="row">
                        <div class="col-12">
                        <th style="font-size:20px">الرقم الطلابي</th>
                        <th style="font-size:20px">اسم الطالب</th>
                        <th style="font-size:20px">البريد الألكتروني</th>
                        <th style="font-size:20px">العلامة</th>
                        </div>
                        <?php
                            while($arr_info_tetcher = mysql_fetch_array($result_info_tetcher))
                            {
                            ?>
                        <div class="col-12">
                            <form name="one" action="sing_mark2.php?id=<?php echo $arr_info_tetcher[11];?>" method="post">
                                <div class="row">
                                      <tr style="font-size:15px;" >
                                      <td><input type="text" name="id[]" value="<?php echo $arr_info_tetcher[11]?>" style="width:50px;border:none;background-color:#eee" readonly ></td>
                                      <td><?php echo $arr_info_tetcher[0] ." ".$arr_info_tetcher[1]?></td>
                                      <td><?php echo $arr_info_tetcher[12]?></td>
                                      <td style=""><input type="text" name="mark[]" placeholder="Mark" style="font-size:10px;" class="mark form-control" required ></td>
                                          
                                      <td style="display:none"><input type="text" name="materials"  style="display:none;width:20px;" value="<?php echo $materials;?>"></td>
                                          
                                        </tr>

                                        <?php
                                        }


                                            ?>

                                            <div class="col-12 w-100">
                                                <input type="submit" name="subsave" value="Save Mark" style="" class="subsing w-100 btn text-center" id="send_mark">
                                            </div>
                                </div>
                            </form>
                    </div>
                    </div>
                     </table>
            </div>
            
                    </div>
        </div>
    

                        <?php

                }
                 }

                else{
             $sql_option = "select * from materials";
             $result = mysql_query($sql_option,$conn);
            ?>
        
        
    <div class="perant container-fluid w-75">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                 <input type="submit" name="back" value="Main Menu" class="butback">
                </form>
            </div>

    <div class="col-12 mb-5">    
        <h1 class="text-center fw-bold">Sing Mark Student</h1>
    </div>
       <div class="col-12 mt-3"> 
           
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 mb-5">
                        <select name="materials" style="" class="select1 w-100 form-control">
                            <?php
                        while($arr_option = mysql_fetch_array($result))
                        {
                            echo"<option value =".$arr_option[0].">".$arr_option[0]."</option>";
                        } 

                            ?>  



                        </select>
                    </div>
                    
                    <div class="col-12 col-md-6 mb-4">
                        <select name="tetcher" style="" class="select2 w-100 form-control">
                             <?php echo"<option value =".$name_tetcher[0].">".$name_tetcher[0]."</option>"; ?>
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <input type="submit" name="subshow" value="Sing Mark Materials" style="" class="sub btn w-100">
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
           
                if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }
    
    ?>
    
   <script>
       
    
    </script>
    </body>
</html>


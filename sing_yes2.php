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

        background-color: aliceblue;
        
    }   
    table
    {
        box-shadow:none;
        font-size: 20px;
        border: 1px solid #ccc; 
    }
    img
    {
        width: 35px;
        height: 35px;
    }
    .hone
    {
        font-size: 50px;
        text-shadow: 10px 10px 20px #572F85;
    }
    .htwo
    {
        font-size: 28px;
        font-weight: bolder;
        color: #572F85;
        text-decoration: underline;
    }
    .hthree
    {
        font-size: 28px;
        font-weight: bolder;
        color: #572F85;
        text-decoration: underline;
    }
    .subsing
    {

        width: 180px;
        height: 40px;
        color: #fff;
        background-color:#572F85;
        border: none;
        outline: none;
        font-size:22px;
        transition: 0.7s;
        
    }
    .subsing:hover
    {
        color: #000;
        box-shadow: 5px 5px 20px #572F85,
                   -5px -5px 20px #572F85;
    }
    .textbox1
    {
        width:500px;
        height: 40px;
        border: 2px solid #aaa;
        background-color:#eee;
        font-size:22px;
        outline: none;
        border-radius: 20px 20px 20px 20px;
        transition: 0.7s;
    }
    .textbox1:focus
    {
        border: 2px solid #572F85;
        box-shadow: 1px 1px 50px #572F85,
                   -1px -1px 50px #572F85;
    }
    .check
    {
        width: 16px;
        height: 16px;
        outline: none;
    }
    .check:checked
    {
        width: 18px;
        height: 18px;
    }
    
    table th 
    {
        text-align: center;
        color:#000;
        font-weight: bolder;
        font-size: 25px;
    }
    table td:nth-of-type(4)
    {
        padding-left:30px; 
    }
    table th:nth-of-type(3)
    {
        padding-left:120px
    }
        table td:nth-of-type(3)
    {
        padding-left:110px; 
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
        transition: 0.5s;
        font-weight: bold;
        height: 40px;
    }
    .butback:hover
    {
        color:#572F85;
        width: 170px;
    }
    ::placeholder
    {
        text-align: center;
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
        
        <div class="col-12">
            <h1 class="hone text-center">Record Attendance</h1>
        </div>
    
    
<?php
session_start();
include("config.php");
 
    

    
$tetcher = explode('@',$_SESSION['name_tetch']);
    
    
$sql_sing_num = "select * from sing_num where tetcher ='$tetcher[0]' ";
$result_sing_num = mysql_query($sql_sing_num,$conn);
$arr_sing_num = mysql_fetch_array($result_sing_num);
?>
        <div class="col-6 mt-5 mb-5">   
            <h4 class="htwo w-100 text-center fs-3" ><?php echo  "Tetchers : ".$tetcher[0] ?></h4>
        </div>
        
        <div class="col-6 mt-5 mb-5"> 
            <h4 class="hthree w-100 text-center fs-3"><?php echo "Number Sessions : " .$arr_sing_num[1] ?></h4>
        </div>



<br><br>


    
<?php

	$sql = "select * from info where name_tetcher = '$tetcher[0]'";
	$result = mysql_query($sql,$conn);
    $sql_view = "select * from sing where tetcher = '$tetcher[0]' ";
    $result_view = mysql_query($sql_view,$conn);
    if(!$result_view){
        echo mysql_error();
    }
	?>
	<table class="table table-hover table-bordered text-center">
        <th style = "color:#572F85">الرقم الشخصي</th>
        <th style = "color:#572F85">الاسم</th>
        <th style = "color:#572F85">الكنية</th>
        <th style = "color:#572F85">الحضور</th>
       <th  style = "padding-left:47px;color:#572F85">التفقد</th>
      
	<?php
	while($arry_tetch= mysql_fetch_array($result))
	{
          $arr_view = mysql_fetch_array($result_view);
	?>
    <form action = "sing_yes2.php?id=<?php echo $arry_tetch[0];?>" method = "post">
        <tr style = "font-size:20px">
            <td style = ""><?php echo $arry_tetch[11]?></td>   
            <td style = ""><?php echo $arry_tetch[0]?></td>
            <td style = ""><?php echo $arry_tetch[1]?></td>
            <td><?php echo $arr_view[1]; ?></td>
            <td><img src="image_icon/ok.png"> <input name="checkbox[]" type="checkbox"  value="<?php echo $arry_tetch[11]; ?>" class="check">
            <img src="image_icon/no.png"> <input name="checkbox1[]" type="checkbox"  value="<?php echo $arry_tetch[11];?>" class="check"></td>
        </tr>
<?php	
        
}
        
?>


                <div class="col-12 mb-2 text-center">
                    <input type="text" name="address" placeholder="Address Lesson" class="textbox1 w-50 " required>  
                </div>

                <div class="col-12 w-100">
                    <input type ='submit' name='supok' value = 'Sing' align='center' class="subsing w-100 text-center">
                </div>
                
        
        </form>
    </table>


<?php
$student_number = 0;
if ($_SERVER['REQUEST_METHOD']=='POST'){
if (isset($_POST['supok'])){
    $sql_num_sizon = "update sing_num set sing_number = sing_number+1 where tetcher = '$tetcher[0]'";
    mysql_query($sql_num_sizon,$conn);
    $date = date("Y-m-d /h:i:s/D");
if(	isset($_POST['checkbox'])){
    $checkbox=$_POST['checkbox'];
	
	for($i=0;$i<count($checkbox);$i++){
		$del_id = $checkbox[$i];
        
		$sql_sing = "select * from sing where id = $del_id";
        $result_sing = mysql_query($sql_sing);
        $num = mysql_num_rows($result_sing);
        
        if ($num==0)
        {
            $nums = 1 ;
            $sql_insert ="insert into sing values ('$tetcher[0]','$nums','$del_id')";
            mysql_query($sql_insert,$conn);
        }else if ($num == 1)
        {
            $sql_update = "update sing set sing_num = sing_num + 1 where id = $del_id";
            mysql_query($sql_update,$conn);
        }
        
	}
    
    $student_number=count($checkbox);
}

    
    
    
    
    
    
    if(	isset($_POST['checkbox1'])){
    $checkbox1=$_POST['checkbox1'];
	
	for($j=0;$j<count($checkbox1);$j++){
		$del_ids = $checkbox1[$j];
        
		$sql_nosing = "select * from nosing where id = $del_ids";
        $result_nosing = mysql_query($sql_nosing);
        $num_nosing = mysql_num_rows($result_nosing);
        
        
            $nums1 = 1 ;
            $sql_insert_nosing ="insert into nosing values ('$tetcher[0]','$nums1','$del_ids','$date')";
            mysql_query($sql_insert_nosing,$conn);
        
        
	}

    }

    
    
    
    
    
    
    
    
    
    
    
    
    $tetcher = $tetcher[0];
    $address = $_POST['address'];
    $num_session = $arr_sing_num[1]+1;
    $sql_admin = "insert into view_session values('$num_session','$tetcher','$address','$student_number','$date')";
   $result_admin = mysql_query($sql_admin , $conn);
    if(!$result_admin)
    {
        echo (mysql_error());
    }
    echo"<meta http-equiv =\"refresh\"content=\"2;url=sing_yes2.php\">";
}
        if (isset($_POST['back']))
    {
         echo"<meta http-equiv =\"refresh\"content=\"0;url=p.php\">";
    }

}
    

?>
        
    </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script> 
    </body>
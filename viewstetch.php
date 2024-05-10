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
    font-family: 'Courier New', monospace;
}
    
    select
    {
        border: none;
        outline: none;
    }

    .subok
    {
        border: none;
        border-radius: 10px 10px;
        width: 160px;
        height: 50px;
        color: #000;
        font-weight: bold;
        font-size:20px;
        transition: 0.5s;
        outline: none;
    }
    .subok:hover
    {
        width:180;
        box-shadow: 10px 10px 35px #572F85;
        color: white;
    }

    img
    {
        width:200px;
        height: 200px;
    }
        .butback
    {
      
        border:1px solid #000;
        background-color: #000;
        border-radius: 15px 1px;
        color:#fff;
        font-size:15px;
        width: 150px;
        height: 40px;
        outline: none;
        transition: 0.5s;
        font-weight: bold;
        
    }
    .butback:hover
    {
        color:#572F85;
        width: 170px;
    }
</style>
</head>
    
<body>
<?php
session_start();
include("config.php");
    
 if (isset($_SESSION['user']))
 {
     $name_tetcher = explode("@",$_SESSION['user']);
 }
            

    
?>
    
<div class="conainer-fluid">
    
    <div class="row">
            <div class="col-4 w-100">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

            <input type="submit" name="back" value="Main Menu"class="butback">


            </form>
    </div> 
        
        <div class="col-12 text-center">
            <i   class="fas fa-book-reader" style="font-size:200px;color:#572F85"></i>
        </div> 
        
        <div class="col-12 text-center">
            <form action = "viewstetch.php" method = "post">
                <div class="row mt-5">
                <div class="col-12  mt-5">    
                    <select name = "tetchs" style= "height:45px;font-size:25px;font-weight:bold;color:#572F85; box-shadow: 10px 10px 35px #572F85,-10px -10px 35px #572F85" class="w-75">
                        
                     <?php echo "<option value =" . $name_tetcher[0] . ">" . $name_tetcher[0] ."</option>" ?>
                        
                    </select>
                </div>
                
                <div class="col-12 mt-5">
                    <input type = "submit" name = "show" class = "btn subok w-75" value = "Show table" style = "background-color:#572F85; border:none" >
                </div>
            </div>
            </form>
            </div>


<?php
    //ضل الجدول ........................................

if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['show']))
{
	$tetchar = $_POST['tetchs'];
	switch($tetchar)
	{
		case 'reem':
		$name = "reem";
		$sql = "select * from info where name_tetcher = 'reem'";
		break;
		case 'alaa':
		$name = "alaa";
		$sql = "select * from info where name_tetcher = 'alaa'";
		break;
		case 'nadya':
		$name = "nadya";
		$sql = "select * from info where name_tetcher = 'nadya'";
		break;
		case 'rama':
		$name = "rama";
		$sql = "select * from info where name_tetcher = 'rama'";
		break;
	}
	
	$result = mysql_query($sql,$conn);
	echo"<div class='col-12 text-center'><h2 style = 'font-size:40px;color:#000;text-shadow:10px 10px 10px #572F85' class='text-center'>Table Student Your tetcher</h2></div>"."<div class='col-12 text-center'><h2 style ='color:#000;font-size:40px;text-shadow:15px 15px 20px #572F85;' class='text-center fw-bold'>$name</h2></div>";
	?>
	<table class="table table-hover table-bordered" style = 'font-size:20px'>
	<th style = "color:#572F85">ID<th style = "color:#572F85">
	First_Name<th style = "color:#572F85">Last_Name<th style = "color:#572F85">
	Father<th style = "color:#572F85">Location<th style = "color:#572F85">
	phone1<th style = "color:#572F85">phone2</th> 
	<?php
	while($arry_tetch= mysql_fetch_array($result))
	{
	?>
	<tr style = "color:#000;font-size:20px">
	<td style = "color:#572F85"><?php echo $arry_tetch[11]?></td> <td><?php echo $arry_tetch[0]?></td> 
	<td><?php echo $arry_tetch[1]?></td><td><?php echo $arry_tetch[3]?></td>
	<td><?php echo $arry_tetch[6]?></td>
	<td><?php echo $arry_tetch[7]?></td><td><?php echo $arry_tetch[8]?>
	</tr> </table>
<?php	
}
echo"</table>";
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
 
 
 
 
 
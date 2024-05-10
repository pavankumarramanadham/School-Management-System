<?php
include("config.php");
if (isset($_POST['save']))
{
$idu = $_POST['id'];
$fnameu = $_POST['fname'];
$lnameu = $_POST['lname'];
$motheru = $_POST['mother'];
$fatheru = $_POST['father'];
$birthu = $_POST['birth'];
$placu = $_POST['plac'];
$locationu = $_POST['location'];
$phone1u = $_POST['phone1'];
$phone2u = $_POST['phone2'];
$tetchu = $_POST['tetch'];
$imageu = $_POST['image'];


$sqlsave = "update info set first_name = '$fnameu' , last_name = '$lnameu' , mother = '$motheru' ,
			father = '$fatheru', 
			birth = '$birthu' , place = '$placu' , location = '$locationu' , phone1 = '$phone1u'
			, phone2 = '$phone2u' , image = '$imageu' , 
			name_tetcher = '$tetchu' WHERE id = '$idu'";
			
			if (mysql_query($sqlsave ,$conn))
			{
				echo("<h2 style = 'color: #8dc500; text-align:center'>تم حفظ التعديلات بنجاح</h2>");		
				echo ("<meta http-equiv = \"refresh\"content=\"2;url=views.php\"> ");
			}else
			{
				echo(mysql_error());
			}



}


?>
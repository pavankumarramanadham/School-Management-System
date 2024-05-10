<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
body
{
  font-family:monospace;
    background-color: aliceblue;
}

* {
  box-sizing: border-box;
}
      .up ,.del
      {
        width:100px;
        height: 40px;
        background-color:  #572F85;
        border: none;
        border-radius: 5px 5px;
        text-align:center;
        color: #FFF;
        letter-spacing: 1px;
        box-shadow: 2px 2px 5px #AAA;
          transition: 0.5s;
          outline: none;
      }  

      .up:hover ,.del:hover
      {
          width:110px;
          color: black;
      }
      
      .check
      {
          width: 20px;
          height: 20px;
           outline: none;
      }
      .ll
      {
          font-weight:bold;
          font-size:20px;
          color: rgba(0,0,0,0.7)
      }
      .search
      {
        height:36px;
        width: 320px;
        font-size:20px;
        direction: rtl;
        outline:none;
        padding-right: 22px;
        border: 1px solid #aaa;
        border-radius: 8px 8px 8px 8px;  
          transition: 0.6s;
      }
      .search:focus
      {
          box-shadow: 8px 8px 20px #572F85;
          border: 3px solid #572F85; 
      }
      
      .btsearch
      {
         width:100px;
        height: 36px;
        background-color:#572F85;
        border: none;
        text-align:center;
        color: #FFF;
        letter-spacing: 1px;
        box-shadow: 2px 2px 5px #AAA;
        transition: 0.5s;
           outline: none;
      }  
      .btsearch:hover
      {
          color: black;
      }
      
      
      .checkt
      {
          width: 30px;
          height: 30px;
          margin-top: 8px;
           outline: none;
      }
      
      .delt
      {
          background-image:  url(image_icon/no.png);
          background-repeat: no-repeat;
          background-size: cover;
          border-radius: 50%;
          width: 40px;
          height:40px;
          border: none;
           background-color: #eee;
           outline: none;
      }
      
            .editt
      {
          background-image: url(image_icon/update.png);
          background-repeat: no-repeat;
          background-size: cover;
          border-radius: 50%;
          width: 40px;
          height:40px;
          border: none;
           background-color: #eee;
           outline: none;
      }
      .editt:focus
      {
          border:2px solid #000;
      }
      .editt:hover , .delt:hover
      {
         box-shadow: 2px 2px 8px #000,
                    -2px -2px 8px #000;
      }
      
      table th 
      {
          font-weight: bold;
          font-size: 22px;
          text-align: center;
          margin-right: 5px;
      }
      
      table td 
      {
          font-size: 19px;
          line-height: 30px;
      }
      
      
      .btnedit
      {
          background-image: url( image_icon/ok1.png);
          background-repeat: no-repeat;
          background-size: cover;
          border-radius: 10px ;
          width: 60px;
          height:60px;
          border: none;
           background-color: #eee;
           outline: none;
          background-color: #ddd;
      }
      .btnedit:hover
      {
                   box-shadow: 2px 2px 8px #000,
                    -2px -2px 8px #000;
          background-color: aquamarine;
      }
      .textedit
      {
          width: 210px;
          border-radius: 8px;
          margin-bottom: 5px;
          outline: none;
          padding-left: 5px;
      }
      .textedit:focus
      {
     box-shadow: 2px 2px 8px #572F85,
                -2px -2px 8px #572F85;
      }
    
</style>
</head>
<body>

<div class="container-fluid mb-5">
<div class="row mb-5 mt-2">
    
<div class="col-12">  
<form action ='views.php' method = 'post'>
    <div class="row">
        
    <div class="col-4 col-md-4 mb-2 text-center">
    <input type ='submit' name='subup' value = 'UpDate' align='center' class="up">
    </div>    
    
    <div class="col-4 col-md-4  mb-2 text-center">
	<input type ='submit' name='subdele' value = 'Delete'  align='center' class="del">
    </div>
 

       <div class="col-4 col-md-4  mb-2 text-center">     
           <input type ='submit' name='subserch' value = 'Search' class="btsearch btn">      
          </div>  
       <div class="col-12 col-md-12  mb-2 text-center">
          <input type="text" placeholder="search.." name="se" class="search text-center w-75">
        </div>
     </div>
            
    
        
        
            <div class="row ">
            <div class="col-3 ml-2">
                    <input type="checkbox" name="all" class="check" id="check" >

                   <lable class="ll">All</lable>
                </div>

        </div> 
  
    
    
    </form>
    </div>
</div>
</div>
    
<?php


include("config.php");











//البحث عن طريق الاسم

 if(!empty($_POST['subserch'])){
$name		= $_POST['se'];		  
$sqlserch	= "SELECT * FROM info WHERE first_name like '%$name%'";
if(!empty(mysql_fetch_array( mysql_query($sqlserch,$conn)))){
$resultserch	= mysql_query($sqlserch,$conn);
	echo("<table  class='table table-responsive table-hover table-bordered bg-white'>");
    
echo("<th><th><th><th> ID<th>FName<th>LName<th>Mom<th>Bab<th>BirthDay<th> Place <th> Location<th> Phone<th> Phone2<th>Tetchers");	
while($arrserch = mysql_fetch_array($resultserch))
		{
?>
	<form method = "post" action = "views.php?id=<?php echo ($arrserch[11]);?>" >
	<tr>
	<td ><input name="checkbox[]" type="checkbox"  value="<?php echo $arrserch[11]; ?>" class="checkt"></td>
	<td><button name ="edite" class="editt" style = "" value="<?php echo $arrserch[11]; ?>"></button></td>
	<td><button name ="delete[]" value = "<?php echo $arrserch[11]?>" class="delt" style = ""></button></td>
	<td  style='color:#572F85;font-weight: bold;'><?php echo $arrserch[11]?></td> <td  style='color:#572F85;font-weight: bold;'><?php echo $arrserch[0]?></td> <td><?php echo $arrserch[1]?></td> 
	<td><?php echo $arrserch[2]?></td><td><?php echo $arrserch[3]?></td><td><?php echo $arrserch[4]?></td>
	<td><?php echo $arrserch[5]?></td><td><?php echo $arrserch[6]?></td><td><?php echo $arrserch[7]?></td>
	<td><?php echo $arrserch[8]?><td  style='color:#572F85;font-weight: bold;'><?php echo $arrserch[10]?></td>
	</tr>
	</form>
<?php
	
		}
echo("</table>");

		}else
		{
    
    //تحتاج لصيانة برمجية 
			echo'<div class="alert alert-danger text-dark fs-3 fw-bold mt-5 text-capitalize "><h3 style=" text-align:center;" >not found is name<h3></div>';
    
			echo"<meta http-equiv = \"refresh\"content=\"3;url=views.php\">";

		}
}







//عرض الجدول العام للمدير


else{
echo("<table  class='table table-responsive table-hover table-bordered bg-white' >");
echo("<th><th><th><th> ID<th>FName<th>LName<th>Mom<th>Bab<th>BirthDay<th> Place<th> Location<th> Phone<th> Phone2<th>Tetcher<th>Alshoba");		
$sqlview = "SELECT * FROM info";
$resultview = mysql_query($sqlview,$conn);
$numse = mysql_num_rows($resultview);
while($arrview = mysql_fetch_array($resultview))
{
?>
	<form method = "post" action = "views.php?id=<?php echo $arrview[11]?>">
	<tr>
	<td ><input name="checkbox[]" type="checkbox"  value="<?php echo $arrview[11]; ?>" class="checkt"></td>
        <td><button name ="edite" class="editt" value="<?php echo $arrview[11]; ?>"  ></button></td>
	<td><button name ="delete[]" value = "<?php echo $arrview[11]?>" class="delt" style = ""></button></td>
	<td style='color:#572F85;font-weight: bold;'><?php echo $arrview[11]?></td> <td style='color:#572F85;font-weight: bold;'><?php echo $arrview[0]?></td> <td><?php echo $arrview[1]?></td> 
	<td><?php echo $arrview[2]?></td><td><?php echo $arrview[3]?></td><td><?php echo $arrview[4]?></td>
	<td><?php echo $arrview[5]?></td><td><?php echo $arrview[6]?></td><td><?php echo $arrview[7]?></td>
	<td><?php echo $arrview[8]?></td><td style='color:#572F85;font-weight: bold'><?php echo $arrview[10]?></td>
        <td><?php echo $arrview[13]?></td>
	</tr>
    </form>    
<?php

}
echo("</table>");
}
  
  
  
    
    
    
 
    
//عرض الحقول للتعديل عليها بعد الضغط على تعديل


if(!empty($_POST['subup']))
{
    if(gettype($_POST['se']) == gettype(6))
    {
	$sqlup 	  = "SELECT * FROM info WHERE id=$_POST[se]";
	$resultup = mysql_query($sqlup , $conn);
	$nu       = mysql_num_rows($resultup);
	if($nu < 1 )
	{
	echo"<div class='alert alert-danger text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'>Not Found ID in The Table...</h3></div>";
		echo"<meta http-equiv = \"refresh\"content=\"2;url=views.php\">";
		
	}
	
	else{
		$arrup = mysql_fetch_array($resultup);	
		echo("<form action = 'changdata.php' method = 'post'>");
			echo("<table>");
				echo("	<tr><td style='color:green'><input type ='text' class = 'textedit' name = 'id'  value =$arrup[11] readonly></td></tr>
						<tr><td><input type ='text'  name = 'fname' class = 'textedit' value =$arrup[0] ></td></tr>
						<tr><td><input type = 'text' name = 'lname' class = 'textedit' value = $arrup[1]></td></tr>
						<tr><td><input type = 'text' name = 'mother' class = 'textedit' value = $arrup[2]></td></tr>
						<tr><td><input type = 'text' name = 'father'class = 'textedit' value = $arrup[3]></td></tr>
						<tr><td><input type = 'text' name = 'birth' class = 'textedit' value = $arrup[4]></td></tr>
						<tr><td><input type = 'text' name = 'plac'  class = 'textedit' value = $arrup[5]></td></tr>
						<tr><td><input type = 'text' name = 'location' class = 'textedit'  value = $arrup[6]></td></tr>
						<tr><td><input type = 'text' name = 'phone1' class = 'textedit' value = $arrup[7]></td></tr>
						<tr><td><input type = 'text' name = 'phone2' class = 'textedit' value = $arrup[8]></td></tr>
						<tr><td><input type = 'text' name = 'tetch' class = 'textedit' value = $arrup[9]></td></tr>
						<tr><td><input type = 'text' name = 'image' class = 'textedit' value = $arrup[10]></td></tr>
						<tr><td><input type = 'submit' name = 'save' value=' ' class='btnedit'></td></tr>
			        ");
			echo("</table>");
		echo("</form>");	
	}
}else
    {
        	echo"<div class='alert alert-warning text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'> You Can't Search with letter !!! </h3></div>";
            echo"<meta http-equiv = \"refresh\"content=\"2;url=views.php\">";
    }


}
    
    
    
    
    
    
  

//الحذف الفردي من خلال كبسة الحذف الفردية


if(isset($_POST['delete'])){
    $delete=$_POST['delete'];
	
	for($i=0;$i<count($delete);$i++){
		$del_ids = $delete[$i];
		$sqldele = "DELETE FROM info WHERE id='$del_ids'";
		$resultdele=mysql_query($sqldele , $conn);
	}
	if($resultdele){	
	echo"<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'>Sucssfuly Oparetion Delete...</h3></div>";
}
	echo"<meta http-equiv = \"refresh\"content=\"2;url=views.php\">";
	
}






//تعديل الفردي على السطر من خلال كبسة التعديل
if(isset($_POST['edite'])){

   
    $edite=$_POST['edite'];
    
    	for($s=0;$s<count($edite);$s++){
		$del_ids = $edite[$s];
		$sqlups    = "SELECT * FROM info WHERE id='$edite'";
		$resultups = mysql_query($sqlups , $conn);
	}
		$arrups = mysql_fetch_array($resultups);
		echo("<form action = 'changdata.php' method = 'post'>");
			echo("<table>");
				echo("	<tr><td style='color:green'><input type ='text'  name = 'id'  value =$arrups[11] readonly class = 'textedit'></td></tr>
						<tr><td><input type ='text' class = 'textedit'  name = 'fname'  value =$arrups[0] ></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'lname'  value = $arrups[1]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'mother' value = $arrups[2]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'father' value = $arrups[3]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'birth'  value = $arrups[4]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'plac'   value = $arrups[5]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'location' value = $arrups[6]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'phone1' value = $arrups[7]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'phone2' value = $arrups[8]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'tetch'  value = $arrups[9]></td></tr>
						<tr><td><input type = 'text' class = 'textedit' name = 'image'  value = $arrups[10]></td></tr>
						<tr><td><input type = 'submit' name = 'save'   value = ' ' class='btnedit' style='margin-left:70px;'></td></tr>
			        ");
			echo("</table>");
		echo("</form>");	
}








//الحذف عن طريق الشيك بوكس الجماعية
if(isset($_POST['subdele'])){
    if(isset($_POST['checkbox'])){
        
        $checkbox=$_POST['checkbox'];
        for($j=0;$j<count($checkbox);$j++)
        {
            $del_id = $checkbox[$j];
            $sql_deleee = "delete from info where id = $del_id";
            $result_deleee= mysql_query($sql_deleee);
            }
	           echo"<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'>Sucssfuly Oparetion Delete...</h3></div>";
                echo("<meta http-equiv = \"refresh\"content=\"3;url=views.php\">");
     }else
        {
                echo"<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'>Not Found Componant Check...!</h3></div>";
                echo("<meta http-equiv = \"refresh\"content=\"3;url=views.php\">");
        }

        }

//



    ?>   

    
    <script>
    var mymin_check = document.getElementById('check'),
        mychildren_check = document.getElementsByClassName('checkt'),
        i=0,
        j=0;
       mymin_check.onchange = function(){
        if(mymin_check.checked == true)
        {
            for( i ; i < mychildren_check.length ; i++)
            {
                mychildren_check[i].checked = true;
            }
        }
                   if(mymin_check.checked == false)
        {
            for( j ; j < mychildren_check.length ; j++)
            {
                mychildren_check[j].checked = false;
            }
        }
        i=0;
        j=0;
        
       };
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    
  <style>
      
      input[type=text]
      {
          width:250px;
          height: 40px;
          border: none;
          box-shadow: 5px 5px 10px #aaa,
                     -5px -5px 10px #aaa;
          border-radius: 5px 5px ;
          background-color: #eee;
          font-size: 20px;
          outline: none;
          transition: 0.5s;
      }
      input[type=text]:focus
      {
        box-shadow: 2px 2px 15px #572F85,
                    -2px -2px 15px #572F85;
        border: 3px solid #572F85; 
      }
     
      

      select
      {
          font-size: 25px;
          outline: none;
           background-color: #eee;
      }
      
      select:hover
      {
          border: 3px solid #572F85; 
      }
      
      input[type=file]
      {
          outline: none;
          font-size:20px;
          font-weight:bold;
          color:rgba(0,0,0,0.4);
          border: 1px solid rgba(0,0,0,0.4) ;
          background-color: #eee;
          
      }
      .btn
      {
          font-size: 25px;
          outline: none;
          background-color: #572F85;
          border:none;
          transition: 0.8s;
          color: white;
      }
      .btn:hover
      {
          color:black;
          background-color: #572F85;
      }
      .l1
      {
          font-size: 20px;
          color: rgba(0,0,0,0.6);
      }
      h1
      {
          text-shadow: 4px 4px 6px rgba(0,0,0,0.1);
          color: #572F85;
      }
      ::placeholder
      {
          text-align: center;
      }
      

</style>
</head>
<body>
<?php 
    
include("config.php");
    
$sql_name_tetchers = "select * from acount where statu = 'tetcher'";
$result_tetxhers = mysql_query($sql_name_tetchers,$conn);   
    
?>
<div class="container">
    
    <div class="row">   
        <div class="col-12">
            <h1 class="text-center fs-1 fw-bold">Add New Student</h1>
        </div>
        <hr>
        
        <form name = "form1" action = "add.php" method="post" enctype="multipart/form-data">
            
            <div class="row mt-4">
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="id_student" placeholder = "ID" class="w-75" required>
                </div>
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="name1" placeholder ="FName" class="w-75" required> 
                </div>
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="name2" placeholder = "LName " class="w-75" required>
                </div>   

                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="mother" placeholder = "Mother" class="w-75" required>
                </div> 
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="Father" placeholder = "Father" class="w-75" required>
                </div>  
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="birth_day" placeholder = "Parth Day" class="w-75" required>
                </div>   
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="class" placeholder = "Class" class="w-75" required>
                </div>
                
                <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="plac" placeholder = "Parth Day" class="w-75" required>
                  </div>    
                
                 <div class="col-6 col-md-4 mb-5 text-center">
                  <input type="text" name="phone2" placeholder = "Phone" class="w-75" required >
                 </div> 
                
                <div class="col-6 col-md-4 mb-5 text-center">   
                  <input type="text" name="phone1" placeholder = "Mobaile" class="w-75" required >
                 </div> 
                
                <div class="col-12 col-md-4 mb-5 text-center">
                  <input type="text" name="location" placeholder = "Location Student" class="w-75" style="" required>
                </div> 
                
                <div class="col-12 col-md-4 mb-5 text-center">
                  <input type="text" name="email" placeholder = "Email" class="w-75" style="" required>
                </div>   
                
                
                <div class="col-6 col-md-6 mb-5 text-center">
                    <select name = "tetch" class="w-75">
                            <?php
                        while($arr_option = mysql_fetch_array($result_tetxhers))
                        {
                            $array_name = explode("@" , $arr_option[1] );
                            echo"<option value =".$array_name[0].">".$array_name[0]."</option>";
                        } 
                            ?>  
                    </select>
                </div>
                  
                 <div class="col-6 col-md-6 mb-5 text-center">
                    <input type="file" name="image" class="w-75" style="" required>
                 </div>
                
                <div class="col-12 text-center">
                  <input type="submit" value="Add Student" name = "add" class="btn btn-success w-100" style="">
                </div>
                
            </div>
        </form>
    </div>
</div>    
    
   
<?php
//الاضافة على جدول المدير





if(isset($_POST['add']))
{
   if($_FILES['image']['error']>0) {
       echo("Error".$_FILES['image']['error']."<br>");
   }else{ 
       move_uploaded_file($_FILES['image']['tmp_name'],"up/".$_FILES['image']['name']."");
	
$fname    = $_POST['name1'];
$lname    = $_POST['name2'];
$mother   = $_POST['mother'];
$Father   = $_POST['Father'];
$birth    = $_POST['birth_day'];
$plac 	  = $_POST['plac'];
$location = $_POST['location'];
$phone1	  = $_POST['phone1'];
$phone2	  = $_POST['phone2'];
$email = $_POST['email'];    
$class    = $_POST['class'];       
$tetch    = $_POST['tetch'];
$id_stu   = $_POST['id_student'];       
$image="up/".$_FILES['image']['name'];   //مسار الصورة رح تنعرض عند المدير وبصفحة الطالب


$sqladd1 = "insert into info values('$fname','$lname','$mother','$Father','$birth','$plac','$location','$phone1','$phone2','$image','$tetch','$id_stu',
'$email','$class')";
$result = mysql_query($sqladd1,$conn);
if($result){	
    
    echo'<div class="alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize "><h3 style=" text-align:center;" >Succsfuly Oparation Add General....<h3></div>';
	echo"<meta http-equiv = \"refresh\"content=\"3;url=add.php\">";
		}
	}
}

?>





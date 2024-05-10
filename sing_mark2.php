<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>



<?php
include("config.php");

if($_SERVER['REQUEST_METHOD']=='POST')
{
   
       $sar = $_POST['mark'];
       $id = $_POST['id'];
       $materials = $_POST['materials'];
       $date = date('Y-m');
        
   
        for($i=0 ; $i<count($id);$i++)
    {
            $sql = "select * from info where id ='$id[$i]'";
            $result = mysql_query($sql,$conn);
            $arr_info = mysql_fetch_array($result);
            $sql_add = "insert into mark_student values ('$id[$i]','$arr_info[0]','$arr_info[12]','$arr_info[10]','$materials','$sar[$i]','$date')";
            $result_add = mysql_query($sql_add,$conn);

            }
                if($result_add)
            {
                ?>
<div class='alert alert-success text-dark fs-3 fw-bold mt-5 text-capitalize '><h3 style = ' text-align:center'><?php echo "OK , Oparation Add Mark Successfly ".$materials?></h3></div>;
<?php
              echo"<meta http-equiv = \"refresh\"content=\"2;url=sing_mark1.php\">";
    
    }
    
}


?>
    
    </body>
</html>
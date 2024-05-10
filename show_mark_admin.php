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
    }
    .i1
    {

        height:50px;
        font-size:20px;
        direction: rtl;
        outline:none
    }
    .i2
    {
        height:50px;
        font-size:20px;
        direction: rtl;
        outline:none
    }
    .i3
    {
        height:50px;
        font-size:20px;
        direction: rtl;
        outline:none
    }
    .i1,.i2,.i3
    {
        border: 1px solid #aaa;
        border-radius: 10px 10px;
        transition: 0.6s;
        
    }
    .i1:focus,.i2:focus,.i3:focus
    {
        box-shadow: 5px 5px 20px #572F85,
                   -5px -5px 20px #572F85;
        border: 3px solid #572F85;
    }                
    .h1
    {

        text-shadow: 2px 2px 10px #572F85; 
    }
    .sub
    {

        border: 1px solid #fff;
        font-size:25px;
        border-radius: 5px 5px;
        background-color: #572F85;
        transition: 0.6s;
    }
    .sub:hover
    {
        color:#fff;
        box-shadow: 5px 5px 20px #572F85,
                   -5px -5px 20px #572F85;
    }
    img
    {
        width: 40px;
        height: 40px;
        border: none;
        z-index: 2;
    }
    
    ::placeholder
    {
        color: rgba(0,0,0,0.6);
    }
</style> 
    <link rel="stylesheet" href="w3.css">
    
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="" class="h1 text-center">علامات الطلاب الفصلية</h1>
                        </div>
                    </div>
                          <div class="col-12">
                                <div class="row mb-5 mt-5">


                                    <div class="col-4">  
                                        <input type="search" name="search1" placeholder="المادة العلمية" class="i1 w-100">
                                    </div>

                                    <div class="col-4">
                                        <input type="search" name="search2" placeholder="المعلمة المشرفة" class="i2 w-100">
                                    </div>

                                    <div class="col-4">
                                        <input type="search" name="search3" placeholder="اسم الطالب"  class="i3 w-100">
                                    </div>    

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" name="subsearch" value="أظهار النتائج" class="sub w-100" >
                                    </div>
                                </div>
                            </div>
                        
            </form>
        </div>
    </div>
</div>
    
    
    
<?php
include("config.php");
//عرض العلامات 
$sql_show = "select * from mark_student ";
$result_show = mysql_query($sql_show,$conn);


//زر البحث عن العلامات 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['subsearch']))
    {
    ?>
      <br><br><br><br>
    <table class= "w3-table-all w3-card-4" style="box-shadow:none">
<th style="font-size:20px">الرقم الطلابي</th>
<th style="font-size:20px">اسم الطالب</th>
<th style="font-size:20px">المعلمة المشرفة</th>
<th style="font-size:20px">المادة العلمية</th>        
<th style="font-size:20px">العلامة</th>
<th style="font-size:20px">تاريخ التسجيل</th>
    <?php
        $tetcher_sear = $_POST['search2'];
        $materials_sear = $_POST['search1'];
        $student_sear = $_POST['search3'];
        
        if(empty($_POST['search1']) and !empty($_POST['search3']) and !empty($_POST['search2']) ){
        $sql_search = "select * from mark_student where name ='$student_sear' and tetcher ='$tetcher_sear' ";
        }
        else if(empty($_POST['search2']) and !empty($_POST['search3']) and !empty($_POST['search1'] ) )
        {
         $sql_search = "select * from mark_student where name ='$student_sear' and materials='$materials_sear' ";
        }
        
        
        else if(empty($_POST['search3']) and !empty($_POST['search2']) and !empty($_POST['search1']))
        {
        $sql_search = "select * from mark_student where tetcher ='$tetcher_sear' and materials='$materials_sear' ";
        }
        
        
        else if (!empty($_POST['search3']) and !empty($_POST['search2']) and !empty($_POST['search1'] ))
        {
         $sql_search = "select * from mark_student where tetcher ='$tetcher_sear' and materials='$materials_sear' and name ='$student_sear' ";
        }
        
        
        
        
        else if(empty($_POST['search3']) and empty($_POST['search1']) and !empty($_POST['search2']))
        {
        $sql_search = "select * from mark_student where tetcher ='$tetcher_sear' ";
        }
        else if(empty($_POST['search3']) and empty($_POST['search2']) and !empty($_POST['search1']))
        {
        $sql_search = "select * from mark_student where materials ='$materials_sear' ";
        }
        else if(empty($_POST['search1']) and empty($_POST['search2']) and !empty($_POST['search3']))
        {
        $sql_search = "select * from mark_student where name ='$student_sear' ";
        }
        
        
        
        
        $result_search = mysql_query($sql_search , $conn);
        
        if($result_search)
        {
           while($arr_search = mysql_fetch_array($result_search))
           {
               if($arr_search[5]>=50){$color="green";}else if($arr_search[5]<50){$color="red";}
               ?>
 <tr style="font-size:18px;" >
<td><?php echo $arr_search[0]?></td>
<td><?php echo $arr_search[1]?></td>
<td><?php echo $arr_search[3]?></td>      
<td><?php echo $arr_search[4]?></td>
<td style="color:<?php echo $color; ?>"><?php echo $arr_search[5]?></td>
<td><?php echo $arr_search[6]?></td>    
</tr>
        
    
    
    <?php
               
           }
        ?>
    </table>
        <?php
        }else
        {
            echo("<h4 style='color:green'>لا يوجد معلومات مطابقة في جدول العلامات</h4>");
        }
        
    }
}else{



?>

  <br><br><br><br>
    <table class="w3-table-all w3-card-4" style="box-shadow:none">
<th style="font-size:20px">الرقم الطلابي</th>
<th style="font-size:20px">اسم الطالب</th>
<th style="font-size:20px">المعلمة المشرفة</th>
<th style="font-size:20px">المادة العلمية</th>        
<th style="font-size:20px">العلامة</th>
<th style="font-size:20px">تاريخ التسجيل</th>       
<?php       
    while($arr_mark_student = mysql_fetch_array($result_show))
  {
  ?>
<tr style="font-size:18px;" >
<td><?php echo $arr_mark_student[0]?></td>
<td><?php echo $arr_mark_student[1]?></td>
<td><?php echo $arr_mark_student[3]?></td>      
<td><?php echo $arr_mark_student[4]?></td>
<td><?php echo $arr_mark_student[5]?></td>
<td><?php echo $arr_mark_student[6]?></td>    
</tr>
        
<?php
    }    
?>     
</table>   
    
    <?php
}
    
    ?>
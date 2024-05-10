<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
       .address
      {
            font-size:40px;
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1);
      }

      body
      {
            background-color: #cef7e6;
            font-family:cursive;
      }


</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 mb-5">
<?php
session_start();
$email = $_SESSION['user'];


include("config.php");



$sql_stu = "select * from info where email = '$email'";
$result =mysql_query ($sql_stu,$conn);
$arr_info = mysql_fetch_array($result);




$sql = "select * from message_all where tetchers = '$arr_info[10]'";
$result2 =mysql_query($sql,$conn);
$num = mysql_num_rows($result2);



    
    echo "<h1 class='address text-center'>Notes Group</h1></div>";
    $i = 0;
    while($arr_message =mysql_fetch_array($result2)){
        $i++;
    ?>
            
        <div class="col-12 col-md-4 text-center px-0 mb-4 mt-4">
                <ul class="list-group fw-bold">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="my-0 fs-4 text-">NOTE GROUP<p>
                    <span class="badge bg-danger rounded-pill fs-5 mt-2"><?php echo $i?></span>
                  </li>
                  <li class="list-group-item list-group-item-warning list-group-item-action"><?php echo "Tetcher : ".$arr_message[0];?></li>
                  <li class="list-group-item list-group-item-secondary list-group-item-action"><?php echo "To Students All : ". $arr_message[1];?></li>   <li class="list-group-item list-group-item-secondary list-group-item-action"><?php echo "Date : ". $arr_message[2];?></li>
                </ul>
            </div>  

<?php
    }
?>
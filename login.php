<?php
$data_json = file_get_contents("php://input");
$data_sending = json_decode($data_json); //error in convert


session_start();
$data_request = (Object)[];
$error = "";
echo json_encode($data_json);
include "config.php";

sleep(1);

//valdite Email

$email= $data_sending->email;
              if(empty($email))
          {
             $error .= "Plase Enter Email ..!<br>";
          }else
          {
            
              if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-])/",$email))
              {
                  $error .= "Plase Enter a Valid Email ..! <br>";
              }
          }




//valdite password 
$password= $data_sending->password;

if(empty($password))
{
    $error .= "Plase Enter The Password ..! <br>";
}
else{
   if(strlen($password)>8)
    {
        $error .= "Password Letter Most than 8 Char..! <br>";
    }
}







if ($error == "")
{
   

$sql_select = "select * from acount where user = '$data_sending->email'";
    
$result_select = mysql_query($sql_select , $conn);
//$num = mysql_num_rows($result_select) or die("");

    if($result_select)
    {
        $array_info = mysql_fetch_array($result_select);
        if($array_info[1]!=$data_sending->email)
        {
        $data_request->data_valdite = "no";
        $data_request->message = "Email is not found..!";
        echo json_encode($data_request);
        }
        
        
        else if($array_info[2]!=$data_sending->password)
        {
        $data_request->data_valdite = "no";
        $data_request->message = "password is not corect a email..!";
        echo json_encode($data_request);
        }
        
        
        else
        {
        if($array_info[3]=="user")
        {
        $data_request->data_valdite = "yes";
        $data_request->message = "Welcom To Web Site...";
        $_SESSION['user'] = $data_sending->email;
        $data_request->state = "user";
        echo json_encode($data_request);
        }
            
        else
        {
        $data_request->data_valdite = "yes";
        $data_request->message = "Welcom To Web Site Admin...";
        $_SESSION['user'] = $data_sending->email;
        $data_request->state = "admin";
        echo json_encode($data_request);
        }
            
            
            
        }
    }
    else
    {
        $data_request->message = "Not Found Is Acount In DataBase ..!";
        $data_request->data_valdite = "no";
        echo json_encode($data_request);
    }  
    
}

else
{
    $data_request->message = $error;
    $data_request->data_valdite = "no";
    echo json_encode($data_request);   
}












?>
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
          font-family:cursive;
    }
span
{
    width: 50px ;
    height: 50px;
    border-radius: 50%;
    background-color: #c1f5dd; 
     animation-name: example;
     animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    
}
    span:nth-of-type(1)
    {
      position:absolute;
      left: 40%;
      top: 300px;
      animation-delay: 0.2s;
    }
        span:nth-of-type(2)
    {
      position:absolute;
      left: 44%;
      top: 300px;
        animation-delay:0.4s;
    }
        span:nth-of-type(3)
    {
      position:absolute;
      left: 48%;
      top: 300px;
        animation-delay: 0.6s;
    }
        span:nth-of-type(4)
    {
      position:absolute;
      left: 52%;
      top: 300px;
        animation-delay: 0.8s;
    }
        span:nth-of-type(5)
    {
      position:absolute;
      left: 56%;
      top: 300px;
      animation-delay: 1s;
    }

    body
    {
        background-color:rgba(0,0,0,0.7);
        position: relative;
    }
@keyframes example {
  0%   {background-color:#c1f5dd; top:300px;}
  25%  {background-color:black; top:340px;}
  50%  {background-color:#c1f5dd; top:300px;}
  75%  {background-color:black; top:340px;}
  100% {background-color:#c1f5dd;top:300px;} }
    @keyframes example1 {
  0%   {color: #c1f5dd}
  25%  {color: black}
  50%  {color: #c1f5dd}
  75%  {color: black}
  100% {color: #c1f5dd} }
    h4
    {
        text-align: center;
        font-size: 40px;
        animation-name: example1;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }
</style>         
</head>
<body>
       <?php
        session_start();
        session_unset();
     echo"<meta http-equiv = \"refresh\"content=\"6;url=login.html\">";
    ?>

    <h4 class="text-center"><br> Sing Out </h4>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
        

</body>
</html> 
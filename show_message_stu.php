<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
      body
      {
            background-color: #cef7e6;
            font-family:cursive;
      }
      h1
      {
            font-size:50px;
          text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
          color: rgba(0,0,0,1);  
      }
      a button 
      {
  border-radius: 25px;
  background-color: rgba(0,110,120,0.7);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 300px;
  transition: all 0.8s;
  cursor: pointer;
  outline: none;
  font-weight: bold;
    
  border: 1px solid #000; 
      }
    a  button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size:100px;
  color:#cef7e6;
    transition: 0.8s;
}

 a button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: -90px;
  left: 10px;
  transition: 0.8s;
}

a button:hover span {
  padding-right: 25px;
  
}

a button:hover span:after {
  opacity: 1;
  right: 0;
}
       a button:hover
        {
           border: 4px solid #000;
            color: #000;
        }


</style>
</head>
<body>





<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-2 mb-5">
            <h1 class="text-center">Message Student</h1>
        </div>
        
        <div class="col-12 text-center mb-5 mt-5">
            <a href="display_message.php"><button class="w-75 text-center ">رؤية  الملاحظات فردية <span></span></button></a>
        </div>
         
        <div class="col-12 text-center mb-5 mt-5">
            <a href="display_message_all.php"><button class="w-75 text-center ">رؤية  الملاحظات جماعية<span></span></button></a>
        </div>
    </div>
    </div>
    </body>
</html>
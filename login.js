
        
//Oparetion sing UP after Run The Valedite 
//عملية تسجيل الحساب بعد تنفيذ الفالديت 
        
  var myform = document.getElementById("myform"),
      inputs = document.getElementsByTagName("input"),
      singup_button = document.getElementById("sub"),
      data = {};
singup_button.addEventListener( "click" , function(){
    for(var i=0 ; i<inputs.length ; i++)
    {
        singup_button.disabled = true;
    singup_button.value = "Loding...Plase Wait";
        var input_name = inputs[i].name;
        
        switch(input_name)
        {        
            case "user":
                data.email = inputs[i].value; 
                break;
                
            case "pass":
                data.password = inputs[i].value; 
                break;
        }
    }
   send_sing(data , "login");
});



//send inforamation with ajax
//ارسال معلومات الحساب عبر اجاكس

function send_sing(data,type)
{
    var ajax_sing = new XMLHttpRequest();
    ajax_sing.onload = function()
    {
        if(ajax_sing.readyState==4 || ajax_sing.status==200)
           {
            alert(ajax_sing.responseText);
            singup_button.disabled = false;
            singup_button.value = "Login";
           }

    }
    data.type_send = type;
    var data_json = JSON.stringify(data);
    ajax_sing.open("POST","login.php",true);
    ajax_sing.send(data_json);
}




//Process information data ajax from validate php
function result_requst(result)
{
    
    var data_request = JSON.parse(result);
    if(data_request.data_valdite == "no")
       {
        var message_alert = document.getElementsByClassName("alert");
         message_alert[0].innerHTML = data_request.message; 
        message_alert[0].style.display = "block";
           
           
           
           
           //action input error
           var input_error = document.getElementsByTagName("input");
           
          
           //action password
           if(data_request.message.match("Password Letter Most than 8 Char..! <br>")||data_request.message.match("Plase Enter The Password ..! <br>"))
           {
               input_error[1].style.border = "solid 2px #f8d7da";
               input_error[1].style.boxShadow = "0.5px 0.5px 8px red";
           }
           else
           {
               input_error[1].style.border = "solid 2px #d5dadf";
                input_error[1].style.boxShadow = "none";               
           }
           
           
           //action email
           if(data_request.message.match("Plase Enter a Valid Email ..! <br>")||data_request.message.match("Plase Enter Email ..!<br>"))
           {
               input_error[0].style.border = "solid 2px #f8d7da";
               input_error[0].style.boxShadow = "0.5px 0.5px 8px red";               
           }
           else
           {
               input_error[0].style.border = "solid 2px #d5dadf";
               
                input_error[0].style.boxShadow = "none";               
           }           
           
       }
       else
       {
           
        var message_alert = document.getElementsByClassName("alert");
              
        message_alert[0].innerHTML  = data_request.message;
        message_alert[0].classList.remove("alert-danger");
        message_alert[0].classList.add("alert-success");   
        message_alert[0].style.display = "block";
           
           
            if(data_request.state=="user")
           {
            setTimeout(function(){
            window.location ="form_user.php";
                   },3000);
           }
    
            else if(data_request.state=="admin")
                    {
                        setTimeout(function(){
                        window.location ="p.php";
                        },3000);
                    }
           else if(data_request.state=="admin")
           {
                        setTimeout(function(){
                        window.location ="p.php";
                        },3000);
           }

           
       }
}


    
        
                          
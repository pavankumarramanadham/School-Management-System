        var mybutton = document.getElementById("show"),
            myinput = document.getElementById("password");
        if (myinput.value == "")
        {
            mybutton.style.display = "none";
        }
myinput.onkeydown = function()
{
    mybutton.style.display = "block";
};

        
         mybutton.onclick = function(){
        if(mybutton.innerHTML=='<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6 six\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\"></path><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z\"></path></svg> ')
        {
            mybutton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 six" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>' ;
            myinput.type = "text";
            
        }else
        {
            mybutton.innerHTML ='<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 six" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> ';
            myinput.setAttribute("type" , "password");
        }
         };
        
        
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
            result_requst(ajax_sing.responseText);
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

           
       }
}


    
        
                          
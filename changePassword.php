<?php
session_start();
require_once 'Class/user.php';
include 'header.php';
$validate = false; 

?>
<body style="background-color: #282c34;">
<div class="row">
<div class="col-6">
    
    </div>
</div>


</div>
<div  id="content"style = "background-color : white; border-radius : 20px;border : 3px solid black; margin-left : 3vw; width: 50vw; margin-top : 4vh;padding-top : 3vw; padding-left : 2vw; min-width : 250px">
    <h2 style="margin-bottom :2vh"><?php echo $changePasswordTitle?></h2>
    <form id="formulaire"  method='post' >

            
            <div>

            </div>
        </form>
        
    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

<script>
    
    
    $("#newPassword").click(()=>{
        let password = $("#password").val()
        let password2 = $("#password2").val()
        if(password.length > 7 && password2.length >7){
            if(password === password2){
                let data = password
                var request = new XMLHttpRequest();
                var formData = new FormData();
               formData.append("password", data);
        request.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              alert(this.response);
              window.location.replace("https://games-online.herokuapp.com/");
              
          }
        };
        request.open("POST", "handleRequest/ChangePassword-verif.php", true);
        request.send(formData);
                    
           

   
        
    }else{
        alert(<?php echo $errorChangePassword ?>)
    }
} else {
    alert(<?php echo $errorChangePassword2 ?>)
}
})




</script>
</body>

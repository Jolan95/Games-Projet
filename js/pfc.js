$(document).ready(()=>{
    let score1 = 0
    let score2 = 0
  function win(){
        score1++
        $("h2").text(<?php  echo $won ?>+" !!!")
        $("#choix1").css('border', '1vh solid green')
        $("#choix2").css('border', '1vh solid red')
        $('h2').css('color', 'green')
  }
  function tied(){
        $("h2").text(<?php echo $tied ?>+" !")
        $("#choix1").css('border', '1vh solid yellow')
        $("#choix2").css('border', '1vh solid yellow')
        $('h2').css('color', 'darkyellow')
  }
  function lose(){
        score2++
        $("#choix1").css('border', '1vh solid red')
        $("#choix2").css('border', '1vh solid green')
        $("h2").text(<?php echo $lost ?>+" !")
        $('h2').css('color', 'red')
  } 
  function displayScore(){
      $('#score1').text(score1)
      $('#score2').text(score2);
      $('#choix1').text("")
      $('#choix2').text("")
  }
  function getRandom(){
        return Math.floor(Math.random()* 3)
  }
  $('button').click(function(){
      let ia = getRandom();
      $("#choix1").removeClass('pierre')
      $("#choix1").removeClass('ciseaux')
      $("#choix1").removeClass('papier')
      $('#choix1').addClass($(this).attr("id"));
      let choix = $(this).attr("id");
      switch(ia){
            case 0:
              $("#choix2").removeClass('pierre')
              $("#choix2").removeClass('ciseaux')
              $("#choix2").removeClass('papier')
              $("#choix2").addClass('pierre');
          break;
            case 1 : 
                $("#choix2").removeClass('pierre')
                $("#choix2").removeClass('ciseaux')
                $("#choix2").removeClass('papier')
                $("#choix2").addClass('papier');
            break;
            case 2 : 
                $("#choix2").removeClass('pierre')
                $("#choix2").removeClass('ciseaux')
                $("#choix2").removeClass('papier')
                $("#choix2").addClass('ciseaux');
            break;
      }
      if(choix === "pierre" && ia === 0){
            tied()
      }
      if(choix === "papier" && ia === 0){
            win()
      }
      if(choix === "ciseaux" && ia === 0){
            lose()
      }
      if(choix === "pierre" && ia === 1){
            lose()
      }
      if(choix === "papier" && ia === 1){
            tied()
      }
      if(choix === "ciseaux" && ia === 1){
            win()
      }
      if(choix === "pierre" && ia === 2){
            win()
      }
      if(choix === "papier" && ia === 2){
            lose()
      }
      if(choix === "ciseaux" && ia === 2){
            tied()
      }
      displayScore()
  })
})
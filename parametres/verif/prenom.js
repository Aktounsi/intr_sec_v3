/*******************************     PRENOM     **********************************/  
$(function () {
    $('#prenom').focusout(function(){
        
                            
                            $('#erreurprenom').next("#okprenom").fadeOut();
                            $('#plprenom').next("#erreurprenom").fadeOut();
                                
                })

/////////////////////////////////////////////////////////////////////////////////////////                
    $('#prenom').keyup(function(){
        prenom = $('#prenom').val();
        $.ajax({
            type:"POST",
            url:"verif/prenom.php",
            data:'prenom=' + prenom,
            success:function(data){
                    
                    if(data == 4){
                            $('#plprenom').next("#erreurprenom").fadeIn().text('Champ non valide');
                            $('#erreurprenom').next("#okprenom").fadeOut();
                                }
                    if(data == 3){
                            $('#erreurprenom').next("#okprenom").fadeIn().text('Ce champ est valide');  
                            $('#plprenom').next("#erreurprenom").fadeOut();  
                                    }    }
                })
                              })
});   
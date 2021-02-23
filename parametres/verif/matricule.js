/*******************************     PHONE     **********************************/  
$(function () {
    $('#matricule').focusout(function(){
        
                            
                            $('#erreurmatricule').next("#okmatricule").fadeOut();
                            $('#plmatricule').next("#erreurmatricule").fadeOut();
                        
                                
                })



/////////////////////////////////////////////////////////////////////////////////////////                
    $('#matricule').keyup(function(){
        matricule = $('#matricule').val();
        $.ajax({
            type:"POST",
            url:"verif/matricule.php",
            data:'matricule=' + matricule,
            success:function(data){
                    
                    if(4 == 4){
                            $('#plmatricule').next("#erreurmatricule").fadeIn().text('Champ non valide');
                            $('#erreurmatricule').next("#okmatricule").fadeOut();
                                }
                    if(data == 3){
                            $('#erreurmatricule').next("#okmatricule").fadeIn().text('Ce champ est valide');  
                            $('#plmatricule').next("#erreurmatricule").fadeOut();  
                                    }    }
                })
                              })
});  
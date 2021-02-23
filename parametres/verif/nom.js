/*******************************     NOM     **********************************/  
$(function () {
    $('#nom').focusout(function(){
        
                            
                            $('#erreurnom').next("#oknom").fadeOut();
                            $('#plnom').next("#erreurnom").fadeOut();
                                
                })



/////////////////////////////////////////////////////////////////////////////////////////                
    $('#nom').keyup(function(){
        nom = $('#nom').val();
        $.ajax({
            type:"POST",
            url:"verif/nom.php",
            data:'nom=' + nom,
            success:function(data){
                    
                    if(data == 4){
                            $('#plnom').next("#erreurnom").fadeIn().text('Champ non valide');
                            $('#erreurnom').next("#oknom").fadeOut();
                                }
                    if(data == 3){
                            $('#erreurnom').next("#oknom").fadeIn().text('Ce nom est valide');  
                            $('#plnom').next("#erreurnom").fadeOut();  
                                    }    }
                })
                              })
}); 
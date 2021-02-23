/*******************************     MDP     **********************************/  
$(function () {
    $('#mdp').focusout(function(){
        
                            
                            $('#erreurmdp').next("#okmdp").fadeOut();
                            $('#plmdp').next("#erreurmdp").fadeOut();
                        
                                
                })



/////////////////////////////////////////////////////////////////////////////////////////                
    $('#mdp').keyup(function(){
        mdp = $('#mdp').val();
        $.ajax({
            type:"POST",
            url:"verif/mdp.php",
            data:'mdp=' + mdp,
            success:function(data){
                    
                    if(data == 0){
                            $('#plmdp').next("#erreurmdp").fadeIn().text('Mot de passe trop court');
                            $('#plmdp').fadeOut();
                            $('#faible').fadeOut();  
                            $('#moyen').fadeOut(); 
                            $('#okmdp').fadeOut(); 
                                }
                    if(data == 3){
                            $('#erreurmdp').next("#okmdp").fadeIn().text('Mot de passe valide');
                            $('#plmdp').fadeOut();
                            $('#faible').fadeOut();  
                            $('#moyen').fadeOut(); 
                            $('#erreurmdp').fadeOut(); 
                                    }
                    if(data == 1){
                            $('#okmdp').next("#faible").fadeIn().text('Mot de passe faible');  
                            $('#plmdp').fadeOut();
                            $('#erreurmdp').fadeOut();  
                            $('#moyen').fadeOut(); 
                            
                                                }
                    if(data == 2){
                            $('#faible').next("#moyen").fadeIn().text('Mot de passe moyen');  
                            $('#plmdp').fadeOut();
                            $('#faible').fadeOut();  
                            $('#erreurmdp').fadeOut(); 
                            $('#okmdp').fadeOut();  
                                                            } 
                    if(data == 4){
                            $('#erreurmdp').next("#okmdp").fadeIn().text('Mot de passe fort');  
                            $('#plmdp').fadeOut();
                            $('#faible').fadeOut();  
                            $('#moyen').fadeOut(); 
                            $('#erreurmdp').fadeOut();  
                                                                        }                              }
                })
                              })
});             
   
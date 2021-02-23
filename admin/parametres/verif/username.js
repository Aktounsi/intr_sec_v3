/*******************************     username     **********************************/ 
        $(function () {
                $('#username').focusout(function(){
                    
                                        
                                        $('#erreur').next("#ok").fadeOut();
                                        $('#pl').next("#erreur").fadeOut();
                                            
                            })
                                          


//////////////////////////////////////////////////////////////////////////////////////////////////


                $('#username').keyup(function(){
                    username = $('#username').val();
                    $.ajax({
                        type:"POST",
                        url:"verif/username.php",
                        data:'username=' + username,
                        success:function(data){
                                
                                if(data == 1){
                                        $('#pl').next("#erreur").fadeIn().text('Ce pseudo existe déjà');
                                        $('#erreur').next("#ok").fadeOut();
                                            }
                                if(data == 0){
                                        $('#ok').fadeIn().text('Ce pseudo est valide');  
                                        $('#erreur').fadeOut();  
                                                }
                                if(data == 2){$('#pl').next("#erreur").fadeIn().text('Ce pseudo n\'est pas valide' );
                                                      $('#erreur').next("#ok").fadeOut();}             
                                             }
                            })
                                          })
            });



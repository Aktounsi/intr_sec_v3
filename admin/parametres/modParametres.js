$(document).ready(function(){

	let form = $('#form');
    $(form).on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
            //type: $(this).attr('method'),
            type: "POST",
			data: $(this).serialize(),
			dataType: 'json',
			success: function(response){
				console.log(response);
////////////////////////////////////////////////////

//////////////////////////////////////////////


				if(response.success)
				{  
					swal.fire(
                        {
                        //type: response.type,
                        title: response.title,
                        text: response.success,
                        confirmButtonText: 'Ok',
                        type: response.type,
                        icon: response.type,
                        confirmButtonColor: "#5cb85c",
                    }
                    ).then((result) => {
						if(result.value){
                            document.location.reload(true);
                              
						}
                    });
                    
				}
			} ,
			error: function(err){
                console.log(err);
                setTimeout(function () {
                    history.go(0);
                  }, 3500);
			}
		});
	});
});


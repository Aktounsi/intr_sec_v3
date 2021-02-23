$(document).ready(function(){

	let form = $('#form');
    $(form).on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),

			dataType: 'json',  // what to expect back from the PHP script, if anything
			data:  new FormData(this),
   		contentType: false,
      cache: false,
   		processData:false,

			//data: $(this).serialize(),
			//dataType: 'json',
			success: function(response){
				console.log(response);
////////////////////////////////////////////////////

//////////////////////////////////////////////


				if(response.success)
				{
					swal.fire({
						title: response.type+'!',
						text: response.success,
						type: response.type,
                        confirmButtonText: 'Ok',
                        icon: response.type,
                        confirmButtonColor: "#5cb85c",
					}).then((result) => {
						if(result.value){
							document.location.reload(true);
						}
					});
				}
			},
			error: function(err){
				console.log(err);
			}
		});
	});
});
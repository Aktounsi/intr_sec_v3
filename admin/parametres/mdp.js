$(document).ready(function(){

	let form = $('#form');
    $(form).on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function(response){
				console.log(response);
////////////////////////////////////////////////////

//////////////////////////////////////////////


				if(response.success)
				{
					swal.fire({
						title: 'Erreur!',
						text: response.success,
						type: 'error',
                        confirmButtonText: 'Ok',
                        icon: 'error',
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
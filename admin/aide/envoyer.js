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
						title: 'Succès!',
						text: response.success,
						type: 'success',
                        confirmButtonText: 'Ok',
                        icon: 'success',
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
$(document).ready(function(){
	var base_url = 'http://127.0.0.1:8000';

	$('#logOffMenu').click(function(){
		$.ajax({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			method: 'GET',
			url: base_url + '/employee/employee-logOff',
			data : {
			},
			dataTye : 'json',
			success: function(response){
				if(response.responseCode === 1){
					alert(response.message);
					$('#logOffMenu').hide();
				}else{
					alert(response.message);
				}
			},
			error: function(error){

			}
		})
	});
});
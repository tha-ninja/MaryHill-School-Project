$(document).ready(function(){
window.appDomain = $('meta[name=base-url]').attr('content');


})


$('#btn_add').on('click',function(){
	$('#add_form')[0].reset()
	$('#add_modal').modal('show')
})


function edit_case(case_id) {
	// body...
	console.log(appDomain)
	$.ajax({
		type:'ajax',
		method:'post',
		url:appDomain + '/get_case',
		data:{case_id:case_id},
		dataType:'json',
		success: function(response){
			$('#case_id').val(response.case_id)
			$('#case').val(response.case)
			$('#type').val(response.type)
			$('#points').val(response.points)
			
		$('#add_modal').modal('show')
		},error:function(jqXHR, textStatus, errorThrown){
		console.log( jqXHR.responseText + textStatus + errorThrown);
		}
	})
}

function edit_user(user_id) {
	// body...
	
	$.ajax({
		type:'ajax',
		method:'post',
		url:appDomain + '/get_user',
		data:{user_id:user_id},
		dataType:'json',
		success: function(response){
			$('#id').val(response.id)
			$('#name').val(response.name)
			
			$('#email').val(response.email)
			
		$('#add_modal').modal('show')
		},error:function(jqXHR, textStatus, errorThrown){
		console.log( jqXHR.responseText + textStatus + errorThrown);
		}
	})
}
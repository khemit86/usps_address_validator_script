//function for check the errors on form
function validation(){
	error_msg = '<div class="error_msg" style="color:red;">This field is required.</div>';
	error_flag = true
	$(".error_msg").remove();
	if($("#address_line_1").val() == ''){
		$("#address_line_1").after(error_msg);
		error_flag = false
	}
	if($("#address_line_2").val() == ''){
		$("#address_line_2").after(error_msg);
		error_flag = false
	}
	if($("#city").val() == ''){
		$("#city").after(error_msg);
		error_flag = false
	}
	if($("#state").val() == ''){
		$("#state").after(error_msg);
		error_flag = false
	}
	if($("#zip_code").val() == ''){
		$("#zip_code").after(error_msg);
		error_flag = false
	}
	return 	error_flag;		
}	

$(document).ready(function(){
	//check the address is valid or not through usps api
	$("#address_form_validate").click(function(){
		if(validation()){
			$("#address_form_validate").val('VALIDATE....');
			$("#address_form_validate").prop('disabled',true);
			$(".error_msg").remove();
			$("#error_msg").html('');
			$(".alert-success").remove();
			$.ajax({
				type:'POST',
				url: "check_usps_address.php",
				dataType: 'json',
				data:$('#address_form').serialize(),
				success: function(result){
					$("#address_form_validate").val('VALIDATE');
					$("#address_form_validate").prop('disabled',false);
					if(result['error_msg'] != ''){
						$("#error_msg").html(result['error_msg']);
					}else{
						$("#original_address").val(result['data']['original_address'])
						$("#usps_address").val(result['data']['usps_address'])
						$("#address").val(result['data']['usps_address'])
						$('#show_address_popup').modal('show'); 
					}		
				}
			});
		}	
	});
	
	// save the address into database
	$("#save_address").click(function(){
		$(".alert-success").remove();
		$.ajax({
			type:'POST',
			url: "insert_address_opreation.php",
			dataType: 'json',
			data:$('#save_address_form').serialize(),
			success: function(result){
				if(result == '1'){
					$("#address").after('<br><div class="alert alert-success" role="alert">Adresses saved successfully.</div>');
				}	
			}
		});
	});
	
	//Show the original address or usps address base on tab selection
	$(".tab").click(function(){
		if($(this).attr('id') == 'pills-original-tab'){
			$('#pills-original-tab').addClass('active')
			$('#pills-usps-tab').removeClass('active')
			$("#address").val($("#original_address").val())
		}else{
			
			$('#pills-usps-tab').addClass('active')
			$('#pills-original-tab').removeClass('active')
			$("#address").val($("#usps_address").val())
		}		
	});
	
});
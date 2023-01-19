<?php
include_once('db_connection.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Address Validator</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" /> 
    </head>

    <body id="main">
	<div class="container ">
		<div class="row">
			<div class="col-md-12"> 
				<div class="row justify-content-center">
					<div class="col-md-6">
						<span class="anchor" id="formRegister"></span>
						<div class="mb-5"></div>
						<!-- form Address Validator -->
						<div class="card card-outline-secondary">
						  <div class="card-header">
							<h3 class="mb-0">Address Validator</h3>
							<small class="form-text text-muted" id="passwordHelpBlock">Validate/Standardizes addresses using USPS.</small>
						  </div>
						  <div class="card-body">
							<form autocomplete="off" class="form" role="form" id="address_form">
							  <div class="form-group">
								<label for="inputName">Address Line 1</label> 
								<input class="form-control" name="address_line_1" id="address_line_1" placeholder="Address Line 1" type="text">
							  </div>
							  <div class="form-group">
								<label for="inputEmail3">Address Line 2</label> 
									<input class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2"  type="text">
							  </div>
							  <div class="form-group">
								<label for="inputEmail3">City</label> 
									<input class="form-control" name="city" placeholder="City" id="city" type="text">
							  </div>
							  <div class="form-group">
								<label for="inputEmail3">State</label> 
									<select class="form-control" name="state"  id="state">
									<option value="">(Select))</option>
									<?php
									$result = $conn -> query("SELECT * FROM states order by Name ASC");
									if($result -> num_rows > 0){
										while($row = $result->fetch_array(MYSQLI_ASSOC)){
											echo '<option value="'.$row['Code'].'">'.$row['Name'].'</option>';
										}	
									}	
									?>
									</select>
							  </div>
							  <div class="form-group">
								<label for="inputEmail3">Zip Code</label> 
									<input class="form-control" name="zip_code" placeholder="Zip Code" id="zip_code"  type="text">
							  </div>
							  
							  <div class="form-group">
								<input class="btn btn-primary" id="address_form_validate" type="button" value="VALIDATE" style="cursor:pointer">
								<div id="error_msg" style="color:red"><div>
							  </div>
							</form>
						  </div>
						</div><!-- /form Address Validator -->
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="modal fade" id="show_address_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h5 class="modal-title" id="exampleModalLabel">Save Address</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
					<small class="">Which address format do you want to save?.</small>
					<div>
						<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link tab" id="pills-original-tab" data-toggle="pill" href="javascript:;" role="tab">ORIGINAL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active tab" id="pills-usps-tab" data-toggle="pill" href="javascript:;" role="tab">STANDARDIZED (USPS) </a>
							</li>
						</ul>
					</div>
					<div>
						<form autocomplete="off" class="form" role="form" id="save_address_form">
							<div class="form-group">
								<label for="email1"></label>
								<input type="hidden" id ="usps_address" />
								<input type="hidden" id ="original_address" />
								<textarea class="form-control" id="address" name="address" cols="5" rows="5" readonly></textarea>
							</div>
							<div class="modal-footer border-top-0 d-flex justify-content-center">
								<button type="button" class="btn btn-primary" style="cursor:pointer;" id="save_address">Save</button>
							</div>
						</form>
				
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>	
	<script src="js/script.js"></script>			
    </body>
</html>

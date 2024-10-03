<!DOCTYPE html>
<html lang="en">
<head>
<title>資訊系統登入後臺</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

<!-- css files -->
<link href="{{ asset('public/backstage/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('public/backstage/css/loginstyle.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->

<!-- online fonts -->
<link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!-- online fonts -->

<body>
<div class="container demo-1">
	<div class="content">
        <div id="large-header" class="large-header">
			<h1>資訊系統後臺</h1>
				<div class="main-agileits">
				<!--form-stars-here-->
						<div class="form-w3-agile">
							<h2>登入</h2>
							<form action="#" method="post">
							    @csrf
								<div class="form-sub-w3">
									<input type="text" id="Username" name="Username"  placeholder="Username " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" id="Password" name="Password" placeholder="Password" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<p class="p-bottom-w3ls"><a class href="#">忘記密碼</a></p>
								<div class="clear"></div>
								<div class="submit-w3l">
									<input type="button" id="loginbtn" value="登入">
								</div>
							</form>
							<div class="social w3layouts">
								<div class="heading">
									<h5>tomtopchang</h5>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
				<!--//form-ends-here-->
				</div><!-- copyright -->
					<div class="copyright w3-agile">
						<p> © 2024 github laravel <a href="https://github.com/tomtopchang/larproinform" target="_blank">larproinform</a></p>
					</div>
					<!-- //copyright --> 
        </div>
	</div>
</div>	

</body>
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$('#loginbtn').click(function() {
		var form_data = new FormData();
    	form_data.append('username', $('#Username').val());
    	form_data.append('password', $('#Password').val());
		form_data.append('_token', '{{ csrf_token() }}');
		$.ajax({
        	url: '{{ route("login")}}', // point to server-side PHP script 
        	dataType: 'text',  // what to expect back from the PHP script, if anything
        	cache: false,
        	contentType: false,
        	processData: false,
        	data: form_data,
        	type: 'post',
			success: function(response){
				console.log(1);
				response = JSON.parse(response);
				console.log(response.success);
				if(response.success === 'true'){
					console.log(2);
					Swal.fire({
  						position: "top-end",	
  						icon: "success",
  						title: response.info,
  						showConfirmButton: false,
  						timer: 1500
					});
					window.location.href='/dashboard';
				}else {
					Swal.fire({
  						icon: "error",
  						title: "錯誤",
  						text: response.error
					});
				}
			}
		});
	});
</script>
</html>
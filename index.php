<!DOCTYPE html>
<html lang="es">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Prueba Técnica</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icono.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" id="div-login">
			<div class="wrap-login100  p-b-30">
				
					
					<div>
						<img id="log" src="images/logo2.png">
					</div>

					<div class="text-center p-t-55 p-b-30">
						<span class="txt1">
							Iniciar Sesión
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="user" id="user" placeholder="Usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" >
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="btnsub" id="sendx" name="submit" value="Entrar">
					</div>

					

				
			</div>
			
		</div>
		<div class="container-login100" id="div-cliente">
			<div class="wrap-login100  p-b-30">
				
					
					<div>
						<h5 id="cliente"></h5>
					</div>

				
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');

	  $("#sendx").click(function(){
		sendLogin();
	  });

	  $('#pass').keypress(function (e) {
		  if (e.which == 13) {
		    sendLogin();
		  }
		});

	 function sendLogin(){
	 	var user = $('#user').val();
		var pass = $('#pass').val();

		$.get("rest.php", {user: user,pass:pass}, function(data){
		  	console.log(data.status);
		  	var datos = JSON.parse(data);
		  	if(datos.status == 2){
		  		$('#div-login').css('display','none');
		  		$('#cliente').html('Bienvenido '+datos.cliente);

		  	}else{
		  		alert(datos.msg);
		  	}
		    
		});
	 }

	</script>
</body>

</html>


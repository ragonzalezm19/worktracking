<?php 
	require 'variables.php';
	include $Path.'assets/session/session_login.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php' ?> 
	</head>
	<body class="login example1">
		<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="logo" style="color: #FFFFFF;">WorckTracking
			</div>
			<div class="box-login">
				<h3>Inicio de Sesión</h3>
				<p>
					Por favor ingrese su usuario y clave
				</p>
				<form class="form-login" method="post" action="<?php echo $Path ?>app/Home/">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> Hay algunos errores. Por favor verifique.
					</div>
					<div class="errorWrongLogin alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> Usuario/Contraseña incorrecta.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario">
								<i class="fa fa-user"></i>
							</span>
							<!-- To mark the incorrectly filled input, you must add the class "error" to the input -->
							<!-- example: <input type="text" class="login error" name="login" value="usuario" /> -->
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input id="clave" name="clave" type="password" class="form-control password" placeholder="Clave">
								<i class="fa fa-lock"></i>
								<!-- <a class="forgot" href="#">
									He olvidado mi clave.
								</a> -->
							</span>
						</div>
						<div class="form-actions">
							<!-- <label for="remember" class="checkbox-inline">
								<input type="checkbox" class="grey remember" id="remember" name="remember">
								Recordarme.
							</label> -->
							<button type="submit" class="btn btn-bricky pull-right">
								Ingresar <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<!-- <div class="new-account">
							Don't have an account yet?
							<a href="#" class="register">
								Create an account
							</a>
						</div> -->
					</fieldset>
				</form>
			</div>
			<!-- <div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div> -->
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="copyright" style="color: #FFFFFF;">
				2015 &copy;
			</div>
		</div>
	</body>
	<?php include 'script.php' ?>
</html>
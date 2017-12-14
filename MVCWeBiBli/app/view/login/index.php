 <!DOCTYPE html>
 <html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styleLogin.css" />
		<script type="text/javascript" src="js/jslogin.js"></script>

	</head>
	<center><span class="titre" style="font-size:10vw;">WeBibli</span></center>

	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" style="color:#3B5999" id="login-form-link" onclick="change('register-form','login-form','login-form-link','register-form-link')">Se connecter</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link" onclick="change('login-form','register-form','register-form-link','login-form-link')">S'inscrire</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" method="post" role="form" <?php if (!isset($focus)) echo ('style="display: block;" '); else echo ('style = "display : none;" ') ?>>
									<div class="form-group">
										<input type="mail" name="emailL" id="username" tabindex="1" class="form-control" placeholder="Adresse mail" value="" >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
												<h3 style="color:red"><?php if (isset($err)) echo($err); ?></h3>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a tabindex="5" class="forgot-password">Mot de passe oublié ?</a>
												</div>
											</div>
										</div>
									</div>
									</form>
								<form id="register-form" method="post" role="form" <?php if (!isset($focus)) echo 'style="display: none;"' ?>>
									<div class="form-group">
										<input type="text" name="nom" id="username" tabindex="1" class="form-control" placeholder="Nom" value="">
									</div>
									<div class="form-group">
										<input type="text" name="prenom" id="email" tabindex="1" class="form-control" placeholder="Prenom" value="">
									</div>
									<div class="form-group">
										<input type="mail" name="emailS" id="username" tabindex="1" class="form-control" placeholder="Adresse mail" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmez votre mot de passe">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="S'inscrire"/>
												<h3 style="color:red"><?php if (isset($err2)) echo($err2); ?></h3>
											</div>
										</div>
									</div>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>
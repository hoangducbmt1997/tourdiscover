
<!-- Sign in  Form -->
<div class="main-login">
	<section class="sign-in">
		<div class="container">
			<div class="signin-content">
				<div class="signin-image col-6">
					<img src="<?= public_url('site/') ?>image/Untitled-1.png"
						alt="sing up image"> <a href="<?= site_url('user/register') ?>"
						class="signup-image-link">Create an account</a>
				</div>
				<div class="signin-form col-6">
					<div class="content-signin-form">
						<h2 class="form-title">Sign in</h2>
						<form method="POST" class="register-form" id="login-form">
							<div class="form-group">
								<label for="your_name"><i class="fas fa-user"></i></label> <input
									type="email" name="email" id="email" placeholder="Email" />
								
							</div>
							<div class="form-group">
								<label for="your_pass"><i class="fas fa-lock-alt"></i></label> <input
									type="password" name="password" id="password"
									placeholder="Password" />
								
							</div>
							<div class="form-group">
								<input type="checkbox" name="remember-me" id="remember-me"
									class="agree-term" /> <label for="remember-me"
									class="label-agree-term"><span><span></span></span>&nbsp;&nbsp;&nbsp;&nbsp;Remember
									me</label>
							</div>
							<div class="form-group form-button-login">
								<input type="submit" name="signin" id="signin"
									class="form-submit" value="Log in" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
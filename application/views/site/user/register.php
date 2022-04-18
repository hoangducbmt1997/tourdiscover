
    <div class="main-register">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form " >
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" action="<?= site_url('user/register') ?>" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?= set_value('name') ?>"/>
                                <div class="error" id="name-error"><?= form_error('name')?></div>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"  value="<?=set_value('email') ?>"/>
                                <div class="error" id="email-error"><?= form_error('email')?></div>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fas fa-lock-alt"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <div class="error" id="password-error"><?= form_error('password')?></div>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="fal fa-lock-alt"></i></label>
                                <input type="password" name="re_password" id="re_password" placeholder="Repeat your password"/>
                                <div class="error" id="re_password-error"><?= form_error('re_password')?></div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>&nbsp;&nbsp;&nbsp;I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                <div class="error" id="re_password-error"><?= form_error('agree-term')?></div>
                            </div>
                            <div class="form-group form-button-register">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image ">
                        <figure><img src="<?= public_url('site/') ?>image/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
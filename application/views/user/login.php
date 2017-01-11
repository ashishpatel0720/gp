<!-- MAIN -->
		<main class="site-main">
            <div class="container"> 
                <div class="block-form-login">
                    <div class="block-form-create centered center-block">
                        <div class="block-content">
                             <div class="page-title-base">
                               <h1 class="title-base">Login</h1>
                            </div>
                            <p>Please enter email & password to login here </p>
                            <p class="error"> <?php echo $login_err; ?></p>
                            <form action="/user/login" method="POST">
                                <div class="form-group">
                                 <input type="text" class="form-control" name="email" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"><span>Remember me!</span>
                                    </label>
                                </div>
                                <button type="submit" name="_lgn" class="btn btn-inline">Login</button>
                            </form>
                            <div class="padding-top-20">Forgot password ? <a href="/user/password-reset" title="Password Reset">Click here</a>
                            </div>

                            <div class="padding-top-10 padding-bottom-20">Not registered ? <a href="/user/signup" title="Register">Signup here</a>
                            </div>

                        </div>
                        
                    </div><!-- block Registered-->

                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    <!-- Forgot your password ? <a href="#">Click Here</a> -->
                </div><!-- Forgot your password -->

            </div>
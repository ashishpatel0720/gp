<!-- MAIN -->
		<main class="site-main">

            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="/">Home </a></li>
                    <li class="active">Login</li>
                </ol>
            </div> <!-- breadcrumb -->
            <div class="container">

                
                <div class="block-form-login">
 
                    <!-- block Registered-->
                    <div class="block-form-registered">
                       
                        <div class="block-title">
                          Login
                        </div>
                        <div class="block-content">
                            <p>If you have an account please enter the email & password her</p>
                            <p class="error"> <?php echo $login_err; ?></p>

                            <form action="/cp/login" method="POST">
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
                        </div>
                        
                    </div><!-- block Registered-->

                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    <!-- Forgot your password ? <a href="#">Click Here</a> -->
                </div><!-- Forgot your password -->

            </div>
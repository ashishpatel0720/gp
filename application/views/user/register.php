<!-- MAIN -->
		<main class="site-main">
            <div class="container">

                
                <div class="block-form-login">

                    <!-- block Create an Account -->
                    <div class="block-form-create centered center-block">
                        <div class="block-content">
                             <div class="page-title-base">
                               <h1 class="title-base">Signup</h1>
                            </div>

                            <p>Please enter following details to create an account!</p>
                            <form action="/user/signup" method="post" accept-charset="utf-8">
                              
                            <div class="form-group">
                                <input type="text" class="form-control" required name="fname" placeholder="First Name">
                                <?php if (!empty(form_error('fname'))) echo form_error('fname');?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="mname" placeholder="Middle Name (Optional)">
                                <?php if (!empty(form_error('mname'))) echo form_error('mname');?>
                            </div>
                            

                            <div class="form-group">
                                <input type="text" class="form-control" required name="lname" placeholder="Last Name">
                                <?php if (!empty(form_error('lname'))) echo form_error('lname');?>
                            </div>
                            

                            
                            <div class="form-group">
                                <input type="email" class="form-control" required name="email" placeholder="Email">
                                <?php if (!empty(form_error('email'))) echo form_error('email');?>
                            </div>                   
                           
                            <div class="form-group">
                                <input type="password" class="form-control" required name="password1" placeholder="Password">
                             <?php if (!empty(form_error('password2'))) echo form_error('password2');?>
                             
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" required name="password2" placeholder="Re-Enter Password">
                                <?php if (!empty(form_error('password2'))) echo form_error('password2');?>
                            </div>
                              <div class="form-group">
                            </div>

                            <button type="submit" class="btn btn-inline">Register</button>
                            </form>
                             <div class="padding-top-20 padding-bottom-20">Already registered ? <a href="/user/login" title="Login">Login here</a>
                            </div>
                        </div>
                    </div><!-- block Create an Account -->
                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    <!-- Forgot your password ? <a href="#">Click Here</a> -->
                </div><!-- Forgot your password -->

            </div>
<!-- MAIN -->
		<main class="site-main">

            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Authentication</li>
                </ol>
            </div> <!-- breadcrumb -->

            <div class="page-title-base container">
                <h1 class="title-base">authentication</h1>
            </div>

            <div class="container">

                
                <div class="block-form-login">

                    <!-- block Create an Account -->
                    <div class="block-form-create">
                        <div class="block-title">
                            Create an Account
                        </div>
                        <div class="block-content">

                            <p>Please enter following details to create an account!</p>
                            <?php echo validation_errors(); ?>
                            <form action="/cp/signup" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_title" placeholder="Name or Title">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>                   
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_no" placeholder="Contact No.">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Re-Enter Password">
                            </div>
                            <button type="submit" class="btn btn-inline">Register</button>
                            </form>
                        </div>
                    </div><!-- block Create an Account -->
                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    <!-- Forgot your password ? <a href="#">Click Here</a> -->
                </div><!-- Forgot your password -->

            </div>
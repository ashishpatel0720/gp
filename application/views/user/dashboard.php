
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="/static/site/images/core/avatar_1.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                       <?php echo $this->session->userdata('USER_NAME'); ?>
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->

								<!-- STAT -->
								<div class="row list-separated profile-stat">
										<div class="col-md-4 col-sm-4 col-xs-6">
												<div class="uppercase profile-stat-title"> 37 </div>
												<div class="uppercase profile-stat-text"> Projects </div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
												<div class="uppercase profile-stat-title"> 51 </div>
												<div class="uppercase profile-stat-text"> Tasks </div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
												<div class="uppercase profile-stat-title"> 61 </div>
												<div class="uppercase profile-stat-text"> Uploads </div>
										</div>
								</div>
								<!-- END STAT -->
								<div>
										<h4 class="profile-desc-title">About Me</h4>
										<span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
										<div class="margin-top-20 profile-desc-link">
												<i class="fa fa-globe"></i>
												<a href="http://www.keenthemes.com">www.keenthemes.com</a>
										</div>
										<div class="margin-top-20 profile-desc-link">
												<i class="fa fa-twitter"></i>
												<a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
										</div>
										<div class="margin-top-20 profile-desc-link">
												<i class="fa fa-facebook"></i>
												<a href="http://www.facebook.com/keenthemes/">keenthemes</a>
										</div>
								</div>

                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#home"  data-toggle="tab">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#menu1"  data-toggle="tab">
                            <i class="glyphicon glyphicon-user"></i>
                            Account Settings </a>
                        </li>
                        <li>
                            <a href="#" target="">
                            <i class="glyphicon glyphicon-ok"></i>
                            Tasks </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->


            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>HOME</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <h3>Menu 3</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
               </div>

        </div>
    </div>
</div>

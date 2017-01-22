<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grabpustak</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style /static/site/css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/css/style.css">
    <script type="text/javascript" src="<?php echo $this->config->item('site_url'); ?>static/site/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/datatables/extensions/Buttons/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/mdl/material.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/mdl/material.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('site_url'); ?>static/site/css/courses.css">

</head>

<body class="<?php if(isset($page_type) && !empty($page_type)) echo $page_type; ?>">
    <div class="wrapper">
        <!-- HEADER -->
        <header class="site-header header-opt-8">

            <!-- header-content -->
            <div class="header-content">
                <div class="container">

                    <div class="row">

                        <div class="col-md-3 nav-left">
                            <!-- logo -->
                            <strong class="logo">
                                <a href="/"><img src="/static/site/images/core/logo.png" alt="logo"></a>
                            </strong>
                            <!-- logo -->
                        </div>

                        <div class="col-md-5 col-lg-6  nav-mind">
                            <!-- block search -->
                            <div class="block-search">
                                <div class="block-title">
                                    <span>Search</span>
                                </div>
                                <div class="block-content">
                                    <form action="/search">

                                        <div class="categori-search  ">
                                            <select data-placeholder="All Categories" name="f" class="categori-search-option">
                                                <option value="all">All Categories</option>
                                                <option value="books">Books</option>
                                                <option value="student-notes">Student Notes</option>
                                                <option value="teacher-notes">Teacher Notes</option>
                                                <option value="old-papers">Old Papers</option>
                                            </select>
                                        </div>
                                        <div class="form-search">
                                            <div class="box-group">
                                                <input type="text" class="form-control" name="q" placeholder="Search here...">
                                                <button class="btn btn-search" type="submit"><span>search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- block search -->

                        </div>

                        <div class="col-md-4 col-lg-3  nav-right">

                            <a href="/user" class="link-login"><span>My Account</span></a>
                            <!-- <a href="/favorites" class="link-favorites"><span>Favorites</span></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-content -->

            <div class="header-nav mid-header">
                <div class=" container">
                    <div class="box-header-nav">
                        <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Categories</span><i aria-hidden="true" class="fa fa-bars"></i>
                        </span>
                        <div class="block-nav-categori">
                            <div class="block-title">
                                <span>Categories</span>
                            </div>
                            <div class="block-content">
                                <ul class="ui-categori">
                                    <?php foreach ($categories as $key=> $main) { ?>
                                    <li class="parent">
                                        <a href="#">
                                            <span class="icon"><img src="/static/site/images/icon/icon/nav-cat1.png" alt="nav-cat"></span>
                                            <?php echo $key;?>
                                        </a>
                                        <span class="toggle-submenu"></span>
                                        <div class="submenu" style="background-image: url(/static/site/images/icon/icon/bgmenu.jpg);">
                                            <ul class="categori-list clearfix">
                                                <?php foreach ($main as $skey=>$subcat) { // var_dump($main); ?>
                                                <li class="col-sm-3">
                                                    <strong class="title"><a href="/search?sc=<?php echo $skey; ?>"><?php echo $skey; ?></a></strong>
                                                    <ul>
                                                        <?php foreach ($subcat as $key=> $value) { ?>
                                                        <li>
                                                            <a href="/search?sc=<?php echo $skey; ?>&sb=<?php echo $value; ?>">
                                                                <?php echo $value; ?> </a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>

                                    <?php } ?>
                                </ul>

                                <div class="view-all-categori">
                                    <a class="open-cate btn-view-all">All Categories</a>
                                </div>
                            </div>

                        </div>

                        <!-- menu -->
                        <div class="block-nav-menu">
                            <ul class="ui-menu">
                                <li class="parent parent-megamenu active">
                                    <a href="/">Home   </a>
                                </li>
                                <li>
                                  <a href="/courses">Courses</a>
                                </li>
                                <li>
                                    <a href="/books">Books</a>

                                </li>
                                <li>
                                    <a href="/search?f=student-notes,teacher-notes">Notes</a>

                                </li>
                                <li>
                                    <a href="/about">About Us</a>

                                </li>
                                <li class>
                                    <a href="/contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- menu -->


                        <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i>
                        </span>

                        <div class="block-search">
                            <div class="block-title">
                                <span>Search</span>
                            </div>
                            <div class="block-content">
                                <div class="form-search">
                                    <form>
                                        <div class="box-group">
                                            <input type="text" class="form-control" placeholder="Search here...">
                                            <button class="btn btn-search" type="button"><span>search</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown setting">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>Settings</span> <i aria-hidden="true" class="fa fa-user"></i></a>
                            <div class="dropdown-menu  ">
                                <ul class="account">
                                    <li><a href="/user">My Account</a>
                                    </li>
                                    <li><a href="/user/login">Login/Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </header>
        <!-- end HEADER -->

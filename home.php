        <!-- MAIN -->
        <div class="site-main">

            <div class="container">
                <div class="block-section-top block-section-top8">
                    <div class="block-nav-categori">
                        <div class="block-title">
                            <span>Categories</span>
                        </div>
                               <div class="block-content">
                                <ul class="ui-categori">
                                <?php foreach ($categories as $key => $main) {
                                 ?>
                                    <li class="parent">
                                        <a href="#">
                                            <span class="icon"><img src="/static/site/images/icon/icon/nav-cat1.png" alt="nav-cat"></span>
                                            <?php echo $key;?>
                                        </a>
                                        <span class="toggle-submenu"></span>
                                        <div class="submenu" style="background-image: url(/static/site/images/media/icon/bgmenu.jpg);">
                                        <ul class="categori-list clearfix">
                                            <?php foreach ($main as $skey=>$subcat) {
                                                // var_dump($main);
                                             ?>
                                                <li class="col-sm-3">
                                                    <strong class="title"><a href="/search?sc=<?php echo $skey; ?>"><?php echo $skey; ?></a></strong>
                                                    <ul>
                                                       <?php foreach ($subcat as $key => $value) { ?>
                                                        <li><a href="/search?sc=<?php echo $skey; ?>&sb=<?php echo $value; ?>"> <?php echo $value; ?> </a></li>
                                                       <?php } ?>
                                                    </ul>
                                                </li>
                                               <?php } ?>
                                            </ul>
                                        </div>
                                    </li>

                                 <?php }   ?>
                                </ul>

                                <div class="view-all-categori">
                                    <a  class="open-cate btn-view-all">All Categories</a>
                                </div>
                            </div>
                    </div>

                    <!-- block slide top -->
                    <div class="block-slide-main  slide-opt-8">

                        <!-- slide -->
                        <div class="owl-carousel " 
                            data-nav="true" 
                            data-dots="true" 
                            data-margin="0" 
                            data-items='1' 
                            data-autoplayTimeout="700" 
                            data-autoplay="true" 
                            data-loop="true">
                            <div class="item item1" style="background-image: url(/static/site/images/core/banner.jpg);">
                                <div class="description">
                                    <span class="title">JUST FIND YOUR BOOKS AND START READING</span>
                                    <span class="des">NO SUBSCRIPTION, NO SIGNUP </span>
                                    <a href="/search" class="btn">Browse</a>
                                </div>
                                
                            </div>
                            <div class="item item2" style="background-image: url(/static/site/images/core/banner-01.jpg);" >
                                <div class="description">
                                    <span class="title">WE ARE THE BEST IN ONLINE BOOK</span>
                                    <span class="des">ARE YOU READY TO START RIGHT NOW ? </span>
                                    <a href="#" class="btn">Read Novels</a>
                                </div>
                                
                            </div>
                        </div> <!-- slide -->

                    </div><!-- block slide top -->

                    <!-- banner top -->
                    <div class="banner-slide">
                        <a href="/search?f=books"><img alt="banner-slide" src="/static/site/images/core/banner.jpg"></a>
                        <a href="/search?f=student-notes"><img alt="banner-slide" src="/static/site/images/core/notes_banner.jpg"></a>
                        <a href="/search?f=teacher-notes"><img alt="banner-slide" src="/static/site/images/core/teacher_notes_banner.jpg"></a>
                    </div><!-- banner top -->

                </div>
            </div>

            <!-- colums -->
            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        <!-- Featured books -->
                        <div class="block-featured-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">Featured Books</span>
                            </div>
                        <div class="block-content">
                            
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="5" 
                                data-responsive='{
                                "0":{"items":1},
                                "360":{"items":2},
                                "480":{"items":3},
                                "768":{"items":4},
                                "992":{"items":4},
                                "1200":{"items":5}
                                }'>
                                
                        <?php foreach ($top_books as $key => $value) {
                         ?>
                                <div class="book-item book-item-opt-3">
                                    <div class="book-item-info">
                                        <div class="book-item-photo">
                                            <a class="book-item-img" href="/books/<?php echo $value['book_alias']; ?>"><img  src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>" alt="<?php echo $value['book_title']; ?>"></a>
                                            
                                        </div>
                                        <div class="book-item-detail">
                                            <strong class="book-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title'];?> </a></strong>
                                            <div class="book-item-actions">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <?php 
                                    }
                                    ?>
                            </div>    
                                        
                        </div>
                    </div><!-- block-deals-of -->

                        <!-- banner -->
                 <!--        <div class="block-banner-main effect-banner1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="#" class="box-img"><img src="" alt="banner1"></a>
                                </div>
                               
                            </div>
                        </div> --><!-- banner -->

                        <!-- bestseller prodcut -->
                        <div class="block-bestseller-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">Top Books</span>
                            </div>
                            <div class="block-content">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="10" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":2},
                                    "480":{"items":3},
                                    "768":{"items":4},
                                    "992":{"items":4},
                                    "1200":{"items":5}
                                }'>


                         <?php foreach ($top_books as $key => $value) {
                         ?>
                                <div class="book-item book-item-opt-4">
                                    <div class="book-item-info">
                                        <div class="book-item-photo">
                                            <a class="book-item-img" href="/books/<?php echo $value['book_alias']; ?>"><img  src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>" alt="<?php echo $value['book_title']; ?>"></a>
                                            
                                        </div>
                                        <div class="book-item-detail">
                                            <strong class="book-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title'];?> </a></strong>
                                            <div class="book-item-actions">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <?php 
                                    }
                                 ?>
                                </div>
                            </div>
                        </div>

                        <div class="block-hot-categori-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">TOp Rated Categories</span>
                            </div>
                            <div class="block-content">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="10" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":2},
                                    "480":{"items":3},
                                    "768":{"items":4},
                                    "992":{"items":4},
                                    "1200":{"items":5}
                                }'>

                                 <?php foreach ($top_books as $key => $value) {
                                ?>
                                    <div class=" book-item ">
                                        <div class="book-item-info">
                                            <div class="book-item-photo">
                                                <a class="book-item-img" href="#"><img alt="book name" src="/static/site/images/core/cover.jpg"></a>
                                            </div>
                                            <div class="book-item-detail">
                                                <strong class="book-item-name"><a href="#">IITJEE  </a></strong>
                                                <a class="btn " href="#"><span>View</span></a>

                                            </div>
                                        </div>
                                    </div>
                                  <?php 
                                    }
                                 ?>

                                </div>
                            </div>
                        </div><!-- hot categori  -->

                        <!--featured brand -->
                        <div class="block-featured-brand-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">Featured Publishers</span>
                            </div>
                            <div class="block-content">
                                <div  class="owl-carousel callback-page1" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":1},
                                    "480":{"items":1},
                                    "768":{"items":1},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                }'>
                                    <div class=" book-item ">
                                        <div class="book-item-info ">
                                            <div class="book-item-photo ">
                                                <a class="book-item-img" href="#"><img alt="book name" src="/static/site/images/core/cover.jpg"></a>
                                            </div>
                                            <div class="book-item-detail ">
                                                <strong class="book-item-name"><a href="#">Penguin India </a></strong>
                                                <strong class="book-item-subname"><a href="#">IITJEE   </a></strong>
                                                <div class="book-item-des">BEST IN IITJEE BOOKS.</div>
                                                <a class="btn " href="#"><span>READ NOW </span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" book-item ">
                                        <div class="book-item-info ">
                                            <div class="book-item-photo ">
                                                <a class="book-item-img" href="#"><img alt="book name" src="/static/site/images/core/cover.jpg"></a>
                                            </div>
                                            <div class="book-item-detail ">
                                                <strong class="book-item-name"><a href="#">mcGraw Hill </a></strong>
                                                <strong class="book-item-subname"><a href="#">IITJEE AND ENGINEERING   </a></strong>
                                                <div class="book-item-des">FIND BEST COURSE BOOK</div>
                                                <a class="btn " href="#"><span>BROWSE</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-page">
                                    <span class="page" id="callback-page1">
                                        <span class="currentItem"><span class="result cus"></span></span>/
                                        <span class="owlItems"><span class="result"></span></span>
                                    </span>
                                </div>
                            </div>
                            
                        </div><!-- featured brand  -->

                    </div>
                    <?php /*
                    ?>
                    <div class="col-md-3">

                        <div class="block-book-sidebar-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">Popular Books</span>
                            </div>
                            <div class="block-content">
                                <div class="owl-carousel callback-page2" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="5" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":1},
                                    "480":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                }'>

                                    <div class="item">

                             <?php foreach ($top_books as $key => $value){
                                ?>
                                        <div class=" book-item book-item-opt-4">
                                            <div class="book-item-info">
                                                <div class="book-item-photo">
                                                    <a class="book-item-img" href="#"><img alt="book name" src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>"></a>
                                                    
                                                </div>
                                                <div class="book-item-detail">
                                                    <strong class="book-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title']; ?></a></strong>
                                                    <div class="book-item-price">
                                                        <span class="price">View</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                                    ?>
                                    </div> 
 
                                </div>
                            </div>
                            <div class="block-footer">
                                <span class="page" id="callback-page2">
                                    <span class="currentItem"><span class="result cus"></span></span>/
                                    <span class="owlItems"><span class="result"></span></span>
                                </span>
                            </div>
                        </div><!-- popular prodcut -->
                        <?php */ ?>
                        <!-- You May Like -->
                        <div class="block-book-sidebar-opt8">
                            <div class="block-title heading-opt2">
                                <span class="title">You May Like</span>
                            </div>
                            <div class="block-content">
                                <div class="owl-carousel callback-page3" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="5" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":1},
                                    "480":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                }'>
                                 <div class="item">

                             <?php foreach ($top_books as $key => $value){
                                ?>
                                        <div class=" book-item book-item-opt-4">
                                            <div class="book-item-info">
                                                <div class="book-item-photo">
                                                    <a class="book-item-img" href="#"><img alt="book name" src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>"></a>
                                                    
                                                </div>
                                                <div class="book-item-detail">
                                                    <strong class="book-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title']; ?></a></strong>
                                                    <div class="book-item-price">
                                                        <span class="price">View</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                                    ?>
                                    </div> 
 

                                </div>
                            </div>
                            <div class="block-footer">
                               <span class="page" id="callback-page3">
                                    <span class="currentItem"><span class="result cus"></span></span>/
                                    <span class="owlItems"><span class="result"></span></span>
                                </span>
                            </div>
                        </div><!-- popular You May Like -->

                    </div>
                </div>
            </div><!-- colums -->
        </div>

   
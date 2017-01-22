
<!-- MAIN -->
<main class="site-main">

    <!-- breadcrumb -->
    <div class="container breadcrumb-page">
        <ol class="breadcrumb">
            <li><a href="/">Home </a></li>
            <li class="active">Contact</li>
        </ol>
    </div> <!-- breadcrumb -->

    <div class="container">
        <div class="block-googlemap">

            <img src="/static/site/images/core/manit.jpeg" alt="Bhopal">
        </div>

        <div class="row">
            <div class="col-md-8">

                <!-- block  contact-->
                <div class="block-contact-us">
                    <div class="block-title">
                        contact us
                    </div>

                    <?php
                            $errors=validation_errors("<div class='alert alert-danger'>",'</div>');
   if($errors)
                                echo $errors;
                             elseif($message=="success")
                                echo "<div class='alert alert-success'>".'Message sent Successfully.'."</div>";
                            elseif($message=="sql_error")
                                echo "<div class='alert alert-warning'>".'Some Error Occured.'."</div>";
                            elseif($message="no_message")
                                echo "<div class='alert alert-info'>".'Contact us by filling form.'."</div>";
                          ?>
                    <form action="/contact" method="post">
                    <div class="block-content row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" placeholder="Name *" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Email *" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Mobile Number*" name="mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Place*" name="place" class="form-control">
                            </div>

                        </div>
                        <div class="col-sm-7">

                            <div class="form-group">
                                <input type="text" placeholder="Subject*" name="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" rows="5" class="form-control" name="message"></textarea>
                            </div>
                            <div class="text-right">
                                <input class="btn btn-inline" type="submit">
                            </div>
                        </div>
                    </div><!-- block  contact-->
                    </form>
            </div>

            <div class="col-md-4">

                <!-- block  contact-->
                <div class="block-address">
                    <div class="block-title">
                        address
                    </div>
                    <div class="block-content ">
                        <p>
                            <b class="title">Address</b>
                            Hostel 6 MANIT, Bhopal, Madhya Pradesh 462003
                        </p>
                        <p>
                            <b class="title">Phone number</b>
                            +91-9755984443
                        </p>
                        <p>
                            <b class="title">opening hours</b>
                            24 &times; 7
                        </p>
                    </div>

                </div><!-- block  contact-->
            </div>
        </div>

    </div>

</main><!-- end MAIN -->
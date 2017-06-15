<script src="/static/ckeditor/ckeditor.js"></script>
<script src="/static/ckeditor/samples/js/sample_less.js"></script>
 <link rel="stylesheet" href="/static/ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="/static/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

<!-- MAIN -->
		<main class="site-main">
            <div class="container">
                <div class="block-form">
                    <!-- block Create an course -->
                    <div class="block-form-course centered center-block">
                        <div class="block-content col-sm-12 col-md-8 col-lg-8">
                             <div class="page-title-base">
                               <h1 class="title-base">Create New Course</h1>
                            </div>

                            <p>Please enter following details to create the course - </p>
                            <form action="/courses/create_course" method="post" accept-charset="utf-8">

                            <div class="form-group">
                                <input type="text" class="form-control" required name="course_title" placeholder="Course Title">
                                <?php if (!empty(form_error('course_title'))) echo form_error('course_title');?>
                            </div>

                             <div class="form-group">
                              <textarea name="course_desc" id="editor" class="form-control" rows="3" placeholder="Course Description"></textarea>
                                <?php if (!empty(form_error('course_desc'))) echo form_error('course_desc');?>

                             </div>

                            <button type="submit" class="btn btn-inline">Create Now</button>
                            <a href="/courses" type="cancel" class="btn btn-inline">Cancel</a>
                            </form>
                         </div>
                      </div>
                    </div><!-- block Create an Account -->
                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    <!-- Forgot your password ? <a href="#">Click Here</a> -->
                </div><!-- Forgot your password -->

            </div>

<script type="text/javascript">
       initSample();
</script>

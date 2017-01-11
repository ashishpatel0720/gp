<!-- MAIN -->
		<main class="site-main">

            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div> <!-- breadcrumb -->

            <div class="page-title-base container">
                <h1 class="title-base">Hi, <?php echo $this->session->userdata('PUBLISHER_TITLE'); ?></h1>
            </div>

            <div class="container">
                <div class="block-forgot-pass">
                 
                <a href="/cp/upload_book" class="btn btn-primary btn-lg">Upload Book</a>
                <a href="/cp/list_book" class="btn btn-primary btn-lg">List Book</a>
                    
                   </div>
            </div>
<!-- MAIN -->
		<main class="site-main">
            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Book Uploaded</li>
                </ol>
            </div> <!-- breadcrumb -->

            <div class="page-title-base container">
                <h1 class="title-base"><?php echo $this->session->flashdata('msg')['type']; ?></h1>
            </div>

            <div class="container">
                <div class="block-forgot-pass">
                   <h2><?php echo $this->session->flashdata('msg')['msg']; ?></h2>
                </div>

            </div>
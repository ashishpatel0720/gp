<style type="text/css">
/*    .modal-body {
        max-height: calc(100vh - 210px);
        overflow: hidden;
    }*/
    .modal {
        padding: 0;
        top: 0;
        margin-top:0;
        z-index: 1212121 !important;
    }
    .modal-content {
        border: none;
        border-radius: 0px !important;
    }
    .modal-content,
    .modal-body,
    .modal-dialog {
        width: 100%;
        height: 100%;
    }
    .modal-content,
    .modal-dialog {
        padding: 0;
        margin: 0;
    }
    .modal-body {
        background: #ffffff;
        overflow: auto;
    }

    #book__{
        margin: 0 auto;
        text-align: center;
        max-width: 800px;

    }
</style>

<!-- MAIN -->
<main class="site-main">

    <!-- breadcrumb -->
    <div class="container breadcrumb-page">
        <ol class="breadcrumb">
            <li><a href="#">Home </a>
            </li>
            <li><a href="/books">Books</a>
            </li>
            <li class="active">
                <?php echo $book[ "book_title"]; ?>
            </li>
        </ol>
    </div>
    <!-- breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="ct_book_detail_top">
                    <h4><?php echo $book["book_title"]; ?></h4>
                    <ul>
                        <li>
                            <img src="/static/site/images/icon/scholarship.png" alt="">
                            <p>
                                <span>Publisher</span>
                                <span><?php echo $book["publisher_title"]; ?></span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span>Category</span>
                                <span><?php echo $book["sub_category_title"]; ?> </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span>Subject</span>
                                <span><?php echo $book["subject_title"]; ?> </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span>Author</span>
                                <span><?php echo $book["book_author"]; ?> </span>
                            </p>
                        </li>
                        <?php if(!empty($book[ "book_isbn"])): ?>
                        <li>
                            <p>
                                <span>ISBN</span>
                                <span><?php echo $book["book_isbn"]; ?> </span>
                            </p>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <a class="read_now_btn" href="/reader<?php if(!empty($book['is_html'])) echo '_html'; ?>/<?php  echo $book['book_alias'];?>"><span>Read Book</span></a>
                </div>
            </div>
            </div>
            <div class="row">

            <div class="col-sm-7 col-md-6 col-lg-5">

                <div class="product-media media-horizontal">

                    <div class="image_preview_container images-large">
                        <img src="<?php echo $this->config->item('book_images_path').$book['book_alias'].'/'.$book['book_alias'].'.png'; ?>" alt="">
                    </div>

                </div>
                <!-- image product -->
            </div>

            <div class="col-sm-5 col-md-6 col-lg-7">

                <div class="product-info-main">

                    <div class="product-overview">
                        <div class="overview-label">Quick overview</div>
                        <div class="overview-content">
                            <?php echo $book[ "book_long_desc"]; ?>
                        </div>
                    </div>

                </div>
                <!-- detail- product -->

            </div>
            <!-- Main detail -->

        </div>
    </div>


    <!-- block-related product -->
    <div class="block-related container">
        <div class="block-title">
            <strong class="title">RELATED Books</strong>
        </div>
        <div class="block-content ">
            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":4}}'>

                <?php foreach ($related_books as $key=> $value) { ?>
                <li class="product-item product-item-opt-4">
                    <div class="product-item-info">
                        <div class="product-item-photo">
                            <a class="product-item-img" href="/books/<?php echo $value['book_alias']; ?>"><img  src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>"></a>

                        </div>
                        <div class="product-item-detail">
                            <strong class="product-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title'];?> </a></strong>
                            <div class="product-item-actions">

                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>

            </ol>
        </div>
    </div>
    <!-- block-related product -->

</main>
<!-- end MAIN -->






     <!-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAABHNCSVQICAgIfAhkiAAAAA9JREFUKJFjYBgFo4A6AAACTAABTpSMTQAAAABJRU5ErkJggg==" class="img_alpha" alt=""> -->
<script type="text/javascript" charset="utf-8">
    var book_data_ = 'b - <?php echo $book["book_id"]." | ".$book["book_title"];?>';
    var ratio = 1.33;
</script>
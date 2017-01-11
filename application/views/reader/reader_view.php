<style type="text/css">
/*    .modal_-body {
        max-height: calc(100vh - 210px);
        overflow: hidden;
    }*/
    .modal_ {
        padding: 0;
        top: 0;
        margin-top:0;
        z-index: 1212121 !important;
    }
    .modal_-content {
        border: none;
        border-radius: 0px !important;
    }
    .modal_-content,
    .modal_-body,
    .modal_-dialog {
        width: 100%;
        height: 100%;
    }
    .modal_-content,
    .modal_-dialog {
        padding: 0;
        margin: 0;
    }
    .modal_-body {
        background: #ffffff;
        overflow: auto;
    }

    #book__{
        margin: 0 auto;
        text-align: center;
        max-width: 800px;

    }

.modal_-open {
  overflow: hidden;
}
.modal_ {
  position: relative;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  /* display: none; */
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  outline: 0;
}
.modal_.fade .modal_-dialog {
  -webkit-transition: -webkit-transform .3s ease-out;
       -o-transition:      -o-transform .3s ease-out;
          transition:         transform .3s ease-out;
  -webkit-transform: translate(0, -25%);
      -ms-transform: translate(0, -25%);
       -o-transform: translate(0, -25%);
          transform: translate(0, -25%);
}
.modal_.in .modal_-dialog {
  -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
       -o-transform: translate(0, 0);
          transform: translate(0, 0);
}
.modal_-open .modal_ {
  overflow-x: hidden;
  overflow-y: auto;
}
.modal_-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}
.modal_-content {
  position: relative;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  outline: 0;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
          box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}
.modal_-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}
.modal_-backdrop.fade {
  filter: alpha(opacity=0);
  opacity: 0;
}
.modal_-backdrop.in {
  filter: alpha(opacity=50);
  opacity: .5;
}
.modal_-header {
  position: fixed;
  top:0;
  min-height: 16.42857143px;
  padding: 15px;
  border-bottom: 1px solid #e5e5e5;
}
.modal_-header .close {
  margin-top: -2px;
}
.modal_-title {
  margin: 0;
  line-height: 1.42857143;
}
.modal_-body {
  position: relative;
  padding: 15px;
}
.modal_-footer {
  padding: 15px;
  text-align: right;
  border-top: 1px solid #e5e5e5;
}
.modal_-footer .btn + .btn {
  margin-bottom: 0;
  margin-left: 5px;
}
.modal_-footer .btn-group .btn + .btn {
  margin-left: -1px;
}
.modal_-footer .btn-block + .btn-block {
  margin-left: 0;
}
.logo{
    max-height: 30px;
}
.lazy-hidden {
    background: #eee url('/static/site/images/loading.gif') no-repeat 50% 50%;
}

</style>

<!-- MAIN -->
<main class="site-main">

<div class="modal_ fade in" id="book_read_modal_" style="padding:0;">
    <div class="modal_-dialog">
        <div class="modal_-content">
        <div class="modal_-header">
                <h4 class="modal-title text-center">
                <a href="/books/<?php echo $book['book_alias']; ?>" class="pull-left"><i class="glyphicon glyphicon-menu-left"></i> Back </a>


                <span class="text-center"> <?php echo $book['book_title']; ?></span>
              
                <a href="/" class="pull-right"><img src="/static/site/images/core/logo.png" class="logo" alt="grabpustak"></a></h4>
            </div>

            <div class="modal_-body" id="modal_-body">
                <div id="book__">
                    <?php 
                  $book_pages = count(glob('static/book_images/'.$book['book_alias'].'/*.png'));
                  // echo $book_pages;
                  // exit;
                    for ($i=1; $i < $book_pages; $i++){ ?>
                    <div class="book_image_list">
                    
                    <div style="position: relative; left: 0px; -webkit-user-select: none;">
                      <img class="lazy" data-src="/books/<?php echo $book['book_alias'].'/content/'.base64_encode(base_convert($i,10,35)).'/'.$hash; ?>" style="-webkit-user-select: none;">
                    </div>
                    </div>
                
                     <?php } ?>
                

                </div>
            </div>
        </div>
    </div>
</div>





</main>
<!-- end MAIN -->






     <!-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAABHNCSVQICAgIfAhkiAAAAA9JREFUKJFjYBgFo4A6AAACTAABTpSMTQAAAABJRU5ErkJggg==" class="img_alpha" alt=""> -->
<script type="text/javascript" charset="utf-8">
    var book_data_ = 'b - <?php echo $book["book_id"]." | ".$book["book_title"];?>';
    var ratio = 1.33;
</script>
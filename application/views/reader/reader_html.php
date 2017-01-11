<?php //<!-- Arvind Dhakad 08/12/2016 &copy; --> ?>
<style type="text/css">
.button_ss{
  padding: 10px;
  font-size: 15px;
  padding-top: 30px;
  padding-bottom: 30px;
}

</style>
<link rel="stylesheet" type="text/css" href="/static/book_html/<?php echo $book['book_alias']; ?>/base.min.css">
<link rel="stylesheet" type="text/css" href="/static/book_html/<?php echo $book['book_alias']; ?>/fancy.min.css">
<link rel="stylesheet" type="text/css" href="/static/book_html/<?php echo $book['book_alias']; ?>/main.css">
<!-- <button id="next" class="button_ss" style="position:fixed;z-index:12222;top:50%;right:0px;float:right;">NEXT</button>
<div id="book">
<div id="sidebar">
<div id="outline">
</div>
</div>
<div id="page-container">
 
</div>
</div>
<button id="prev" class="button_ss" style="position:fixed;z-index:12222;top:50%;left:0px">Previous</button>

 -->


<style type="text/css">
/*    .modal_-body {
        max-height: calc(100vh - 210px);
        overflow: hidden;
    }*/
    .modal_ {
        padding: 0;
        top: 0;
        margin-top:0;
        z-index: 600 !important;
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
        padding-bottom: 20px;
    }
    .modal_-body {
        background: #ffffff;
        overflow: auto;
    }

    #book__{
        margin: 0 auto;
        text-align: center;
        max-width: 760px;
        padding-bottom: 30px;
    }
    
    .modal_-open {
      overflow: hidden;
    }
    .modal_ {
      position: fixed;
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
      padding-bottom: 60px;
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
    .control_small{
      padding: 15px;
      max-width: 320px;
    }
    .controlb{
      text-align: center;
      margin: auto auto;
      border: none;
      background: transparent;
      margin-left: 10px;

    }
    .controlb:focus{
      border: none;
      background: transparent;
      outline: none;
    }
    #loader{
        position: fixed;
        width: 100%;
        max-width: 760px;
        height: 100%;
        background:rgba(145, 161, 175, 0.56);
        z-index: 400;
        margin: 0 auto;
        right: 0;
        left: 0;
    }
    #loader svg{
      margin: 0 auto;
        display: block;
        top: 50%;
        position: relative;
        z-index: 1000;
    }


</style>

<!-- MAIN -->
<main class="site-main">

<div class="modal_ fade in" id="book_read_modal_" style="padding:0;">
    <div class="modal_-dialog">
        <div class="modal_-content">
        <div class="modal_-header">
                <h4 class="modal-title text-center">
                <a href="/books/<?php echo $book['book_alias']; ?>" class="pull-left"><i class="glyphicon glyphicon-menu-left"></i> <span class="hidden-xs">Back </span></a>


                <span class="text-center"><?php echo substr($book['book_title'],0,300); ?></span>
              
                <a href="/" class="pull-right"><img src="/static/site/images/core/logo.png" class="logo" alt="grabpustak"></a></h4>

          </div>

        <div class="modal_-body" id="modal_-body">

      
          <div class="ele">
               <div class="control_small center-block">
                   <button class="controlb prev" data-go="-1"><i class="glyphicon glyphicon-step-backward"></i> <span class="hidden-xs_">Back </span></button>                   
                   <button class="controlb zoomin"><i class="glyphicon glyphicon-zoom-in"></i> <span class="hidden-xs_"></span></button>

                   <button class="controlb zoomout"><i class="glyphicon glyphicon-zoom-out"></i> <span class="hidden-xs_"></span></button>

                   <button class="controlb next" data-go="1"><i class="glyphicon glyphicon-step-forward"></i> <span class="hidden-xs_">Next </span></button>
               </div>
          </div>
               <div>
       <!--  <div id="loader">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
          <rect x="0" y="0" width="4" height="10" fill="#333">
          <animateTransform attributeType="xml"
          attributeName="transform" type="translate"
          values="0 0; 0 20; 0 0"
          begin="0" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="10" y="0" width="4" height="10" fill="#333">
          <animateTransform attributeType="xml"
          attributeName="transform" type="translate"
          values="0 0; 0 20; 0 0"
          begin="0.2s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="20" y="0" width="4" height="10" fill="#333">
          <animateTransform attributeType="xml"
          attributeName="transform" type="translate"
          values="0 0; 0 20; 0 0"
          begin="0.4s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          </svg></div> -->

                    <div id="book__">
                        <div id="sidebar">
                        <div id="outline">
                        </div>
                        </div>
                        <div id="page-container">
                        </div>              
                      </div>
                </div>
                      <div class="ele">
                    <div class="control_small center-block">
                     <button class="controlb prev" data-go="-1"><i class="glyphicon glyphicon-step-backward"></i> <span class="hidden-xs_">Back </span></button>                   
                       <button class="controlb zoomin"><i class="glyphicon glyphicon-zoom-in"></i> <span class="hidden-xs_"></span></button>

                     <button class="controlb zoomout"><i class="glyphicon glyphicon-zoom-out"></i> <span class="hidden-xs_"></span></button>

                     <button class="controlb next" data-go="1"><i class="glyphicon glyphicon-step-forward"></i> <span class="hidden-xs_">Next </span></button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/static/book_html/<?php echo $book['book_alias']; ?>/theViewer.min.js"></script>
<script src="/static/book_html/<?php echo $book['book_alias']; ?>/compatibility.min.js"></script>
<script>
try{
theViewer.defaultViewer = new theViewer.Viewer({});
}catch(e){}
</script>


<script type="text/javascript">
$(function() {

  var loaded = [];
  var hashishash = '<?php echo $hash; ?>';
  <?php $page = $this->input->get('page', TRUE); ?>
  var count = <?php echo (!empty($page)) ? $page : '1'; ?>;
  var max_ = <?php echo $total_pages; ?>;
  load_page = function(page_id,this_){
      if($.inArray(page_id, loaded)!== -1){
        $('#book__').html(fetch_cached(page_id));
        history.pushState({},null, '?page='+page_id);
        return true; 
    }
      $.ajax({
      url: '/reader_html/<?php echo $book['book_alias']; ?>/content/page_html/'+(page_id),
      type: 'POST',
      contentType: 'Content-type: text/html; charset=utf-8',
    })
    .done(function(data) {
      if(data.whetheriswhether)
        {
        $('#book__').html(data.content);
        history.pushState({},null, '?page='+page_id);
        cache_ele(page_id,data);
      }else{

      }
    })
    .fail(function() {
      $('#book__').html('<h4>Unable to load</h4>');
      // console.log("error");
    });

  };
  cache_ele = function(page_id,data){
    if($.inArray(page_id, loaded)===-1){
      $('body').append($('<div>',{id:"cached_"+page_id,'data-data':data.content}));
     loaded.push(page_id);
     }
     return true;
  }
  fetch_cached = function(page_id){
    var ele = $('#cached_'+page_id);
    if(ele.length>0){
      return ele.data('data');
    }
  }

  load_page(count,null);
  $('.control_small .next').click(function(event) {
    if(count>=max_){
      $(this).attr('disabled', 'true');
      return;
    };
    load_page(++count,this);
  });
    $('.control_small .prev').click(function(event) {
    if(count<2){
       return;
    };
      if(count<=max_){
      $('.control_small .next').removeAttr('disabled');
    };
    load_page(--count,this);
  });
});

</script>
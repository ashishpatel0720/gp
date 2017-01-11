<script src="/static/ckeditor/ckeditor.js"></script>
<script src="/static/ckeditor/samples/js/sample.js"></script>
<script src="/static/ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="/static/ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="/static/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<link rel="stylesheet" href="/static/site/select2/css/select2.css">

		<!-- MAIN -->
		<main class="site-main">
            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="/">Home </a></li>
                    <li class="active">Upload Book</li>
                </ol>
            </div> <!-- breadcrumb -->
            <div class="page-title-base container">
                <h1 class="title-base">Book Uploader</h1>
            </div>
            <div class="container">
                <div class="block-form-login">
                    <!-- block Create an Account -->
                    <div class="block-form-create" style="width: 60%;">
                        <div class="block-title">
                            Upload Book
                        </div>
                        <div class="block-content">
                <form action="/cp/process_book_upload" enctype="multipart/form-data" class="form-horizontal left" method="POST" role="form">
               <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Book Title:</label>
                  <div class="col-sm-10"><input type="text" name="title" id="title" class="form-control" required="" placeholder="Title"></div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="author">Author:</label>
                  <div class="col-sm-10"><input type="text" name="author" id="author" class="form-control" required="" placeholder="Author"></div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="isbn">Book ISBN:</label>
                  <div class="col-sm-10"><input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN"></div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="publication_date">Publication Year :</label>
                  <div class="col-sm-10"><input type="date" name="publication_date" id="publication_date" placeholder="Publication Year" class="form-control" value="">   </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="type_select">Book Type :</label>
                  <div class="col-sm-10">
                  <select name="book_type" id="type_select" style="width: 100%">
                <?php
                $types = $this->config->item('book_type');
                foreach ($types as $key => $value) {
                  echo '<option value="'.$value.'">'.$key.'</option>';
                }
                 ?>
               </select> </div>
               </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="publication_date">Book Category :</label>
                  <div class="col-sm-10">
                  <select name="book_type_main" id="main_category_select" style="width: 100%">
                <?php
                // var_dump($main_categories);
                foreach ($main_categories as $key => $value) {
                  echo '<option value="'.$value['main_category_id'].'">'.$value['main_category_title'].'</option>';
                }
                 ?>
               </select> </div>
               </div>
                 <div class="form-group">
                 <label class="control-label col-sm-2" for="subcategory">Book Sub Category :</label>
                 <div class="col-sm-10">
                 <select name="book_type_sub" id="sub_category_select" style="width: 100%">
                   
                 </select>
               </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="subjects">Book Subject :</label>
                 <div class="col-sm-10">
                 <select name="book_cat_subject" id="subjects" style="width: 100%">
                   
                 </select>
               </div>
               </div>
        

               <div class="form-group">
                  <label class="control-label col-sm-2" for="pdf_book">Upload Book :</label>
                  <div class="col-sm-10"><input type="file" name="pdf_book" id="pdf_book" value="" placeholder="pdf Book"></div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="editor">Book Description</label>
                  <div class="col-sm-10">
                  <textarea name="book_description" id="editor" class="form-control" rows="3" placeholder="Book Description"></textarea></div>
               </div>
              <div class="form-group">
               <div class="col-sm-2"></div>
               <div class="col-sm-10">
                <button type="submit" class="btn btn-inline">Register</button>

                  <!-- <button type="submit" class="btn btn-danger btn-block">Submit</button> -->
               </div>
               </div>
            </form>
           </div>
           </div><!-- block Create an Account -->
          </div>
        </div>
	</main><!-- end MAIN -->
<script>
   initSample();

$(document).ready(function() {
  $("#main_category_select").select2({
          placeholder:'Subcategory',
  });
  $("#type_select").select2({
          placeholder:'Type',
  });
  $('#sub_category_select').select2({
          placeholder:'Subcategory',
  });
  $("#sub_category_select").prop("disabled", true); 

  $('#subjects').select2({
          placeholder:'Subject',
  });
  $("#subjects").prop("disabled", true);

});
$('#main_category_select').on('select2:select', function (evt) {
  // console.log($('#main_category_select').val());

  $.ajax({
    url: '/handler/load_subcategories/'+$('#main_category_select').val(),
    type: 'get',
    dataType: 'json',
  })
  .done(function(data) {
   if(data.length>0){
    $("#sub_category_select").prop("disabled", false);
    $('#sub_category_select').select2('destroy');
    $("#sub_category_select").html("<option></option>");
    $('#sub_category_select').select2({
      placeholder:'Subcategory',
      data: data
    });
  }
  else{
    alert('No subcategory found please contact to web admin');
      $("#sub_category_select").prop("disabled", true);
  }
  })
  .fail(function() {
    console.log("error");
  });
  
});

$('#sub_category_select').on('select2:select', function (evt) {
  // console.log($('#main_category_select').val());

  $.ajax({
    url: '/handler/load_subjects/'+$('#sub_category_select').val(),
    type: 'get',
    dataType: 'json',
  })
  .done(function(data) {
   if(data.length>0){
    $("#subjects").prop("disabled", false);
    $('#subjects').select2('destroy');
    $("#subjects").html("<option></option>");
    $('#subjects').select2({
      placeholder:'Subject',
      data: data
    });
  }
  else{
    alert('No Subject found please contact to web admin');
      $("#subjects").prop("disabled", true);
  }
  })
  .fail(function() {
    console.log("error");
  });
  
});

</script>
<!-- "'<option disabled="disabled">Please select an option<option>'" -->
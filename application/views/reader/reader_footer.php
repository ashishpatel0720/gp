    </div>

    <script src="/static/site/select2/js/select2.full.js"></script>    
    <!-- Boostrap --> 
    <script type="text/javascript" src="/static/site/js/bootstrap.js"></script>

    <!-- sticky -->
    <script type="text/javascript" src="/static/site/js/jquery.sticky.js"></script>

    <!-- OWL CAROUSEL Slider -->    
    <script type="text/javascript" src="/static/site/js/owl.carousel.js"></script>

    <!-- Countdown -->    
    
    <script type="text/javascript" src="/static/site/js/jquery.countdown.min.js"></script>
    
    
    <!-- modernizr -->
    <script src="/static/site/js/modernizr.js"></script>


    <!-- elevatezoom --> 
    <script type="text/javascript" src="/static/site/js/jquery.elevateZoom.min.js"></script>

    <!-- fancybox -->
    <script src="/static/site/js/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="/static/site/js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="/static/site/js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

    <!-- arcticmodal -->
    <script src="/static/site/js/arcticmodal/jquery.arcticmodal.js"></script>

    <!-- Chosen jquery-->    
    
    <script type="text/javascript" src="/static/site/js/chosen.jquery.js"></script>
    
    <!-- Main -->  
    <script type="text/javascript" src="/static/site/js/main.js"></script>
    <script type="text/javascript" src="/static/site/js/blazy.min.js"></script>
    <script type="text/javascript" src="/static/site/js/lazy_load.min.js"></script>

  

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//grabpustak.in/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '3']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();

  // var bLazy = new Blazy({ 
  //       selector: 'img' // all images
  //   });

</script>
<noscript><p><img src="//grabpustak.in/piwik/piwik.php?idsite=3" style="border:0;" alt="" /></p></noscript>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        $(window).resize(function(event) {
            // ('.book_image_').height($(window).width()*ratio);
        });
    });
</script>


<script type="text/javascript">
$(function() {
    var pixelSource = 'http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif';
    var useOnAllImages = true;
    // Preload the pixel
    var preload = new Image();
    preload.src = pixelSource;
    $('#book__ img').on('mouseenter touchstart', function(e) {
        // Only execute if this is not an overlay or skipped
        var img = $(this);
        if (img.hasClass('protectionOverlay')) return;
        if (!useOnAllImages && !img.hasClass('protectMe')) return;
        // Get the real image's position, add an overlay
        var pos = img.offset();
        var overlay = $('<img class="protectionOverlay" src="' + pixelSource + '" width="' + img.width() + '" height="' + img.height() + '" />').css({position: 'absolute', zIndex: 9999999, left: pos.left, top: pos.top}).appendTo('#book__').bind('mouseleave', function() {
            setTimeout(function(){ overlay.remove(); }, 0, $(this));
        });
        if ('ontouchstart' in window) $(document).one('touchend', function(){ setTimeout(function(){ overlay.remove(); }, 0, overlay); });
    });
});
</script>
</body>
</html>

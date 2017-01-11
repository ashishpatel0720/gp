
(function($) {
    "use strict";

    $(document).ready(function() {

        var   status1 = $("#callback-page1");
        var   status2 = $("#callback-page2");
        var   status3 = $("#callback-page3");
        function callback1(event) {
                        
            var items     = event.item.count;    
            var item      = event.item.index +1;     
            

            updateResult1(".currentItem", item );
            updateResult1(".owlItems", items);
                
                
        }
        function callback2(event) {
                        
            var items     = event.item.count;    
            var item      = event.item.index +1;     
            

            updateResult2(".currentItem", item );
            updateResult2(".owlItems", items);
                
                
        }
        function callback3(event) {
                        
            var items     = event.item.count;    
            var item      = event.item.index +1;     
            

            updateResult3(".currentItem", item );
            updateResult3(".owlItems", items);
                
                
        }
        function updateResult1(pos,value){
            status1.find(pos).find(".result").text(value);
        }
        function updateResult2(pos,value){
            status2.find(pos).find(".result").text(value);
        }
        function updateResult3(pos,value){
            status3.find(pos).find(".result").text(value);
        }

        
        $(".cms-rtl .owl-carousel").each(function(index, el) {
            var config = $(this).data();
            config.navText = ['',''];
            config.smartSpeed="800";
            config.rtl="true";
            
            if($(this).hasClass('dotsData')){
                config.dotsData="true";  
            }
            if($(this).hasClass('callback-page1')){
                config.onChanged=callback1; 
            }
            if($(this).hasClass('callback-page2')){
                config.onChanged=callback2; 
            }
            if($(this).hasClass('callback-page3')){
                config.onChanged=callback3; 
            }
            $(this).owlCarousel(config);
           
        });
        
        $(".owl-carousel").each(function(index, el) {
            var config = $(this).data();
            config.navText = ['',''];
            config.smartSpeed="800";
            
            if($(this).hasClass('dotsData')){
                config.dotsData="true";  
            }
            if($(this).hasClass('callback-page1')){
                config.onChanged=callback1; 
            }
            if($(this).hasClass('callback-page2')){
                config.onChanged=callback2; 
            }
            if($(this).hasClass('callback-page3')){
                config.onChanged=callback3; 
            }
           
            $(this).owlCarousel(config);
            
        });

        

        /*  [Mobile Search ]
        - - - - - - - - - - - - - - - - - - - - */
        

        $(".block-search .block-title").on( 'click', function() {
            $( this ).parent().toggleClass('active');
            return false;
        });

        /*  [Mobile menu ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".ui-menu .toggle-submenu").on( 'click', function() {
        
            $( this ).parent().toggleClass('open-submenu');
            return false;
        }) ;
        
        $("[data-action='toggle-nav']").on( 'click', function() {
            $( this ).toggleClass('active');
            $(".block-nav-menu").toggleClass("has-open");
            $("body").toggleClass("menu-open");
            return false;
            
        }) ;

        /*  [Mobile categori ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".block-nav-categori .block-title").on( 'click', function() {
            $( this ).toggleClass('active');
            $( this ).parent().toggleClass('has-open');
            $("body").toggleClass("categori-open");
            return false;
        }) ;

        $(".ui-categori .toggle-submenu").on( 'click', function() {
            $( this ).parent().toggleClass('open-submenu');
            return false;
        }) ;

        /*  [Mobile click service ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".service-opt-1 .block-title").on( 'click', function() {
            
            $( this ).parent().toggleClass('active');
            return false;
        }) ;

       
        /*  [animate click -floor ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".block-title .action ").on('click', function(e) {

            // prevent default anchor click behavior
            e.preventDefault();

            // store hash
            var hash = this.hash;

            // animate
            $('html, body').animate({
                scrollTop: $(hash).offset().top
                }, 500, function(){

                // when done, add hash to url
                // (default click behaviour)
                window.location.hash = hash;
            });

        });

        /*  [COUNT DOWN ]
        - - - - - - - - - - - - - - - - - - - - */
        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                var fomat ='<div class="box-count box-days"><div class="number">%D</div><div class="text">Days</div></div><div class="box-count box-hours"><div class="number">%H</div><div class="text">Hours</div></div><div class="box-count box-min"><div class="number">%M</div><div class="text">Mins</div></div><div class="box-count box-secs"><div class="number">%S</div><div class="text">Secs</div></div>';
                $this.html(event.strftime(fomat));
           });
        });
        
        /*  [Button Filter books  ]
        - - - - - - - - - - - - - - - - - - - - */
        //open filter
        $(".btn-filter-books").on( 'click', function() {
            $( this ).toggleClass('active');
            $( "#layered-filter-block" ).toggleClass('active');
            $( "body" ).toggleClass('filter-active');
            return false;
        }) ;

        //Close filter
        $("#layered-filter-block .close-filter-books").on( 'click', function() {
            $( ".btn-filter-books" ).removeClass('active');
            $( "#layered-filter-block" ).removeClass('active');
            $( "body" ).removeClass('filter-active');
            return false;
        }) ;

        //toggle filter options
        $("#layered-filter-block .filter-options-title").on( 'click', function() {
            $( this ).toggleClass('active');
            $( this ).parent().toggleClass('active');
            return false;
        }) ;
        
        /* ------------------------------------------------
                Arctic modal
        ------------------------------------------------ */

        if($.arcticmodal){
            $.arcticmodal('setDefault',{
                type : 'ajax',
                ajax : {
                    cache : false
                },
                afterOpen : function(obj){

                    var mw = $('.modal_window');
                    
                    mw.find('.custom_select').customSelect();

                    mw.find('.book_preview .owl_carousel').owlCarousel({
                        margin : 10,
                        themeClass : 'thumbnails_carousel',
                        nav : true,
                        navText : [],
                        rtl: window.ISRTL ? true : false
                    });

                    Core.events.bookPreview();

                    addthis.toolbox('.addthis_toolbox');
                    
                }
            });
        }
            
        /* ------------------------------------------------
                Fancybox
        ------------------------------------------------ */

        if($.fancybox){
            $.fancybox.defaults.direction = {
                next: 'left',
                prev: 'right'
            }
        }

        if($('.fancybox_item').length){
            $('.fancybox_item').fancybox({
                openEffect : 'elastic',
                closeEffect : 'elastic',
                helpers : {
                    overlay: {
                        css : {
                            'background' : 'rgba(0,0,0, .6)'
                        }
                    },
                    thumbs  : {
                        width   : 50,
                        height  : 50
                    }
                }
            });
        }

        if($('.fancybox_item_media').length){
            $('.fancybox_item_media').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                helpers : {
                    media : {}
                }
            });
        }

        /* ------------------------------------------------
                Elevate Zoom
        ------------------------------------------------ */

        if($('#img_zoom').length){
            $('#img_zoom').elevateZoom({
                zoomType: "inner",
                gallery:'thumbnails',
                galleryActiveClass: 'active',
                cursor: "crosshair",
                responsive:true,
                easing:true,
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 500,
                lensFadeIn: 500,
                lensFadeOut: 500
            });

            $(".open_qv").on("click", function(e) { 
                var ez = $(this).siblings('img').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                e.preventDefault();
            });

        }

        /*  [ input number ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".btn-number").on( 'click', function(e) {
       
            e.preventDefault();
            
            var fieldName = $(this).attr('data-field');
            var type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    
                    if(currentVal > input.attr('minlength')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('minlength')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('maxlength')) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('maxlength')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
    
        /*  [ tab detail ]
        - - - - - - - - - - - - - - - - - - - - */
        $(".book-info-detailed  .block-title").on( 'click', function() {
            
            $( this ).parent().toggleClass('has-active');
            return false;
        }) ;

        /*  [ Back to top ]
        - - - - - - - - - - - - - - - - - - - - */
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
        $('.back-to-top').on( 'click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: 0
            }, 500);
        });

        /*  [ All Categorie ]
        - - - - - - - - - - - - - - - - - - - - */
        $(document).on('click','.open-cate',function(){
            $(this).closest('.block-nav-categori').find('li.cat-link-orther').each(function(){
                $(this).slideDown();
            });
            $(this).addClass('colse-cate').removeClass('open-cate').html('Close');
            return false;
        })
        /* Close Categorie */
        $(document).on('click','.colse-cate',function(){
            $(this).closest('.block-nav-categori').find('li.cat-link-orther').each(function(){
                $(this).slideUp();
            });
            $(this).addClass('open-cate').removeClass('colse-cate').html('All Categories');
            return false;
        })

        /*  [ All Categorie ]
        - - - - - - - - - - - - - - - - - - - - */
        $(document).on('click','.col-categori .btn-show-cat',function(){
            $(this).closest('.col-categori').find('li.cat-orther').each(function(){
                $(this).slideDown();
            });
            $(this).addClass('btn-close-cat').removeClass('btn-show-cat').html('Close <i class="fa fa-angle-double-right" aria-hidden="true"></i>');
            $(this).parent().addClass('open');
            return false;
        })
        /* Close Categorie */
        $(document).on('click','.col-categori .btn-close-cat',function(){
            $(this).closest('.col-categori').find('li.cat-orther').each(function(){
                $(this).slideUp();
            });
            $(this).parent().removeClass('open');
            $(this).addClass('btn-show-cat').removeClass('btn-close-cat').html('All Categories <i class="fa fa-angle-double-right" aria-hidden="true"></i>');
            return false;
        })

        /*  [ All Categorie Sticky]
        - - - - - - - - - - - - - - - - - - - - */
        

        $(document).on('click','.nav-toggle-cat',function(){
            $('.is-sticky .header-nav ').find('.block-nav-categori .block-content .ui-categori ').slideToggle();
            $('.is-sticky .header-nav ').find('.block-nav-categori .block-content .view-all-categori ').slideToggle();
           
            return false;
        })
        

        /*  [ Sticky Menu ]
         - - - - - - - - - - - - - - - - - - - - */
        $('.mid-header ').sticky({ topSpacing: 0 });

        /*  [ Banner top ]
         - - - - - - - - - - - - - - - - - - - - */
        $('.qc-top-site  .close').on( 'click', function() {
            
            $(this).parents(".qc-top-site").slideUp("slow");
            $(this).parents(".qc-top-site").addClass('close-bn');
            $(".qc-top-site ").css({"min-height":"0","opacity":"0"});
            return false;
        }) ;

        /*  [ Sticky Menu ]
         - - - - - - - - - - - - - - - - - - - - */
        

        if($('.categori-search-option').length){
            $(".categori-search-option").chosen({
            
            });
        }

    }); 
   
})(jQuery);


new function(settings) { 
  // Various Settings
  var $separator = settings.separator || '&';
  var $spaces = settings.spaces === false ? false : true;
  var $suffix = settings.suffix === false ? '' : '[]';
  var $prefix = settings.prefix === false ? false : true;
  var $hash = $prefix ? settings.hash === true ? "#" : "?" : "";
  var $numbers = settings.numbers === false ? false : true;

  jQuery.query = new function() {
    var is = function(o, t) {
      return o != undefined && o !== null && (!!t ? o.constructor == t : true);
    };
    var parse = function(path) {
      var m, rx = /\[([^[]*)\]/g, match = /^([^[]+)(\[.*\])?$/.exec(path), base = match[1], tokens = [];
      while (m = rx.exec(match[2])) tokens.push(m[1]);
      return [base, tokens];
    };
    var set = function(target, tokens, value) {
      var o, token = tokens.shift();
      if (typeof target != 'object') target = null;
      if (token === "") {
        if (!target) target = [];
        if (is(target, Array)) {
          target.push(tokens.length == 0 ? value : set(null, tokens.slice(0), value));
        } else if (is(target, Object)) {
          var i = 0;
          while (target[i++] != null);
          target[--i] = tokens.length == 0 ? value : set(target[i], tokens.slice(0), value);
        } else {
          target = [];
          target.push(tokens.length == 0 ? value : set(null, tokens.slice(0), value));
        }
      } else if (token && token.match(/^\s*[0-9]+\s*$/)) {
        var index = parseInt(token, 10);
        if (!target) target = [];
        target[index] = tokens.length == 0 ? value : set(target[index], tokens.slice(0), value);
      } else if (token) {
        var index = token.replace(/^\s*|\s*$/g, "");
        if (!target) target = {};
        if (is(target, Array)) {
          var temp = {};
          for (var i = 0; i < target.length; ++i) {
            temp[i] = target[i];
          }
          target = temp;
        }
        target[index] = tokens.length == 0 ? value : set(target[index], tokens.slice(0), value);
      } else {
        return value;
      }
      return target;
    };
    
    var queryObject = function(a) {
      var self = this;
      self.keys = {};
      
      if (a.queryObject) {
        jQuery.each(a.get(), function(key, val) {
          self.SET(key, val);
        });
      } else {
        self.parseNew.apply(self, arguments);
      }
      return self;
    };
    
    queryObject.prototype = {
      queryObject: true,
      parseNew: function(){
        var self = this;
        self.keys = {};
        jQuery.each(arguments, function() {
          var q = "" + this;
          q = q.replace(/^[?#]/,''); // remove any leading ? || #
          q = q.replace(/[;&]$/,''); // remove any trailing & || ;
          if ($spaces) q = q.replace(/[+]/g,' '); // replace +'s with spaces
          
          jQuery.each(q.split(/[&;]/), function(){
            var key = decodeURIComponent(this.split('=')[0] || "");
            var val = decodeURIComponent(this.split('=')[1] || "");
            
            if (!key) return;
            
            if ($numbers) {
              if (/^[+-]?[0-9]+\.[0-9]*$/.test(val)) // simple float regex
                val = parseFloat(val);
              else if (/^[+-]?[1-9][0-9]*$/.test(val)) // simple int regex
                val = parseInt(val, 10);
            }
            
            val = (!val && val !== 0) ? true : val;
            
            self.SET(key, val);
          });
        });
        return self;
      },
      has: function(key, type) {
        var value = this.get(key);
        return is(value, type);
      },
      GET: function(key) {
        if (!is(key)) return this.keys;
        var parsed = parse(key), base = parsed[0], tokens = parsed[1];
        var target = this.keys[base];
        while (target != null && tokens.length != 0) {
          target = target[tokens.shift()];
        }
        return typeof target == 'number' ? target : target || "";
      },
      get: function(key) {
        var target = this.GET(key);
        if (is(target, Object))
          return jQuery.extend(true, {}, target);
        else if (is(target, Array))
          return target.slice(0);
        return target;
      },
      SET: function(key, val) {
        var value = !is(val) ? null : val;
        var parsed = parse(key), base = parsed[0], tokens = parsed[1];
        var target = this.keys[base];
        this.keys[base] = set(target, tokens.slice(0), value);
        return this;
      },
      set: function(key, val) {
        return this.copy().SET(key, val);
      },
      REMOVE: function(key, val) {
        if (val) {
          var target = this.GET(key);
          if (is(target, Array)) {
            for (tval in target) {
                target[tval] = target[tval].toString();
            }
            var index = $.inArray(val, target);
            if (index >= 0) {
              key = target.splice(index, 1);
              key = key[index];
            } else {
              return;
            }
          } else if (val != target) {
              return;
          }
        }
        return this.SET(key, null).COMPACT();
      },
      remove: function(key, val) {
        return this.copy().REMOVE(key, val);
      },
      EMPTY: function() {
        var self = this;
        jQuery.each(self.keys, function(key, value) {
          delete self.keys[key];
        });
        return self;
      },
      load: function(url) {
        var hash = url.replace(/^.*?[#](.+?)(?:\?.+)?$/, "$1");
        var search = url.replace(/^.*?[?](.+?)(?:#.+)?$/, "$1");
        return new queryObject(url.length == search.length ? '' : search, url.length == hash.length ? '' : hash);
      },
      empty: function() {
        return this.copy().EMPTY();
      },
      copy: function() {
        return new queryObject(this);
      },
      COMPACT: function() {
        function build(orig) {
          var obj = typeof orig == "object" ? is(orig, Array) ? [] : {} : orig;
          if (typeof orig == 'object') {
            function add(o, key, value) {
              if (is(o, Array))
                o.push(value);
              else
                o[key] = value;
            }
            jQuery.each(orig, function(key, value) {
              if (!is(value)) return true;
              add(obj, key, build(value));
            });
          }
          return obj;
        }
        this.keys = build(this.keys);
        return this;
      },
      compact: function() {
        return this.copy().COMPACT();
      },
      toString: function() {
        var i = 0, queryString = [], chunks = [], self = this;
        var encode = function(str) {
          str = str + "";
          str = encodeURIComponent(str);
          if ($spaces) str = str.replace(/%20/g, "+");
          return str;
        };
        var addFields = function(arr, key, value) {
          if (!is(value) || value === false) return;
          var o = [encode(key)];
          if (value !== true) {
            o.push("=");
            o.push(encode(value));
          }
          arr.push(o.join(""));
        };
        var build = function(obj, base) {
          var newKey = function(key) {
            return !base || base == "" ? [key].join("") : [base, "[", key, "]"].join("");
          };
          jQuery.each(obj, function(key, value) {
            if (typeof value == 'object') 
              build(value, newKey(key));
            else
              addFields(chunks, newKey(key), value);
          });
        };
        
        build(this.keys);
        
        if (chunks.length > 0) queryString.push($hash);
        queryString.push(chunks.join($separator));
        
        return queryString.join("");
      }
    };
    
    return new queryObject(location.search, location.hash);
  };
}(jQuery.query || {}); // Pass in jQuery.query as settings object
        <!-- MAIN -->
        <main class="site-main">
            <div class="columns container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-3 col-sidebar">

                        <!-- Block  Breadcrumb-->
                        
                        <ol class="breadcrumb no-hide">
                            <li><a href="/">Home</a></li>
                            <li class="active">Books, Notes and Papers</li>
                        </ol>
                       <!-- Block  Breadcrumb-->

                        <!-- block filter books -->
                        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                            <div class="close-filter-books"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <div class="block-title">
                                <strong>Book By</strong>
                            </div>
                            <div class="block-content">

                                <!-- Filter Item  categori-->
                                <div class="filter-options-item filter-options-categori">
                                <?php  
                                // var_dump($filters);

                                if(isset($filters['f']) && !empty($filters['f'])){
                                    $types = explode(',', $filters['f']);
                                }
                                  ?>
                                    <div class="filter-options-title">Book Type</div>
                                    <div class="filter-options-content">
                                        <ol class="items" id="types" data-param="f">
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox" class="type_params" value="books" <?php if(in_array('books', $types)) echo 'checked';?>><span>Books</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox" class="type_params" value="student-notes"  <?php if(in_array('student-notes', $types)) echo 'checked';?>><span>Student-Notes</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox" class="type_params" value="teacher-notes"  <?php if(in_array('teacher-notes', $types)) echo 'checked';?>><span>Teacher-Notes</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox" class="type_params" value="old-papers" <?php if(in_array('old-papers', $types)) echo 'checked';?>><span>Old-Papers</span>
                                                </label>
                                            </li>
                                        </ol>
                                    </div>
                                </div><!-- Filter Item  categori-->

                                <!-- filter Manufacture-->
                                <div class="filter-options-item filter-options-manufacture">
                                    <div class="filter-options-title">Publishers</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Penguin  </span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>mcGraw Hill</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Arihant</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Indra</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Teenage</span>
                                                </label>
                                            </li>

                                        </ol>
                                    </div>
                                </div><!-- Filter Item -->
                            </div>
                        </div><!-- Filter -->

                        <!-- Block  tags-->
                       <!--  <div class="block-sidebar block-sidebar-tags">
                            <div class="block-title">
                                <strong>Popular tags</strong>
                            </div>
                            <div class="block-content">
                                <ul>
                                    <li><a href="#">Top</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Collection Men</a></li>
                                    <li><a href="#">Collection Women</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">New</a></li>
                                    <li><a href="#">Top</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li></li>
                                </ul>
                                <a href="#" class="view-all">View all tags <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div> --><!-- Block  tags-->

                    </div><!-- Sidebar -->

                    <!-- Main Content -->
                    <div class="col-lg-9 col-md-9  col-main">

                        <!-- images categori -->
                        <div class="category-view">
                            <div class="category-image">
                            </div>
                        </div><!-- images categori -->

                        <!-- Toolbar -->
                        <div class=" toolbar-books toolbar-top">

                            <div class="btn-filter-books">
                                <span>Filter</span>
                            </div>
                            <ul class="pagination">
                             
                               <li class="action">
                                    <a href="#">
                                        <span><i aria-hidden="true" class="fa fa-angle-left"></i></span>
                                    </a>
                                </li>
                                <?php
                                for ($i=1; $i <=$links; $i++) { 
                                ?>
                                <li class="action">
                                
                                <a href="?<?php echo $extra_params_to_link; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php 
                                }
                                ?>

                                <li class="active">
                                </li>
                                <li class="action">
                                    <a href="#">
                                        <span><i aria-hidden="true" class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                            </ul>

                        </div><!-- Toolbar -->

                        <!-- List books -->
                        <div class="books  books-grid">
                            <ol class="book-items row">
                         <?php foreach ($books as $key => $value) {
                         ?>
                                <li class="col-sm-4 book-item book-item-opt-0">
                                    <div class="book-item-info">
                                        <div class="book-item-photo">
                                            <a href="/books/<?php echo $value['book_alias']; ?>" class="book-item-img"><img src="<?php echo $this->config->item('book_images_path').$value['book_alias'].'/'.$value['book_alias'].'.png'; ?>" alt="<?php echo $value['book_title']; ?>"></a>
                                        </div>
                                        <div class="book-item-detail">
                                            <strong class="book-item-name"><a href="/books/<?php echo $value['book_alias']; ?>"><?php echo $value['book_title']; ?></a></strong>
                                            <div class="book-item-price">
                                                <span class="price"><?php echo $value['publisher_title']; ?></span>
                                            </div>
                                            <div class="book-item-actions">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                          <?php 
                          } ?>

                            </ol><!-- list book -->
                        </div> <!-- List books -->

                    </div><!-- Main Content -->
                    
                </div>
            </div>
        </main><!-- end MAIN -->

<script type="text/javascript" charset="utf-8">

﻿/**
 * jQuery.query - Query String Modification and Creation for jQuery
 * Written by Blair Mitchelmore (blair DOT mitchelmore AT gmail DOT com)
 * Licensed under the WTFPL (http://sam.zoy.org/wtfpl/).
 * Date: 2009/8/13
 *
 * @author Blair Mitchelmore
 * @version 2.2.3
 *
 **/
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


    jQuery(document).ready(function($) {
        $('.type_params').change(function(event) {
            var checkedVals = $('.type_params:checkbox:checked').map(function() {
                return this.value;
            }).get();
            window.location.search = jQuery.query.set("f", checkedVals.join(','));
            // params["f"] = checkedVals.join(",");
            // alert(newUrl);
        });
    });
</script>
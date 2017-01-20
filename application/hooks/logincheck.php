<?php
/*
 * logincheck.php
 *
 * Created on Fri Jan 06 2017 02:27:22 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

$CI =& get_instance();
 $buffer = $CI->output->get_output();

 $search = array(
    '/\>[^\S ]+/s',
    '/[^\S ]+\</s',
     '/(\s)+/s', // shorten multiple whitespace sequences
  '#(?://)?<!\[CDATA\[(.*?)(?://)?\]\]>#s' //leave CDATA alone
  );
 $replace = array(
     '>',
     '<',
     '\\1',
  "//![CDATA[\n".'\1'."\n//]]>"
  );

 $buffer = preg_replace($search, $replace, $buffer);

 $CI->output->set_output($buffer);
 $CI->output->_display();

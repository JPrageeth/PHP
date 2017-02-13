<?php
/* Prageeth Sudarshana | Tokyo */

//iframe get src

function get_iframe_src($string) {
  
  if (!empty($string)) {
      preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $string, $matches);
      return $matches[1];
  }

}

?>

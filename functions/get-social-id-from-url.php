<?php

/* Prageeth Sudarshana | Tokyo */

//get social id from url

function get_social_id($name, $url) {
  
  $arr = explode("/", rtrim($url, '/'));
  
  //Twiiter
  if ($name == 'twitter') {
    //detect numbers only
    $res = preg_replace('/\D/', '', $arr[5]);
    return $res;
  
  //Instagram  
  } else if ($name == 'instagram') {
    return $res[4];
  
  //Pinterest
  } else if ($name == 'pinterest') {
    return $res[4];
  
  }

}

?>

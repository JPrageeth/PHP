<?php
  /* Prageeth Sudarshana | Tokyo */

  /*
    Check Url Header
  */
  
  function check_url_header($url, $staus = false) {
      //check url
      if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
        return false;
      }
        
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
      curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_TIMEOUT,10);
      $output = curl_exec($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      
      //url true or false
      if (!empty($staus)) {
        if ($httpcode == 200) {
          return true;
        } else {
          return false;
        }
        
      } else {
        return $httpcode;
      }  
  }

?>

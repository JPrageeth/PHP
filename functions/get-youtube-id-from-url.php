<?php
  /* Prageeth Sudarshana | Tokyo */
  
  /*
    Get youtube id using php preg_match
  */
  
  function get_youtube_id($url){
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches[1];
  
  }


?>

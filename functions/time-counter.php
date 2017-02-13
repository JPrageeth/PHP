<?php
  /* Prageeth Sudarshana | Tokyo */

  /*
    Time Counter
  */
  function time_counter($original) {
    $now  = time();
    
    $time = ($now - $original);
    
    if ($time < 60) {
      $res = '今';
    
    } else if ($time < 3600) {
      $res = round(($time / 60), 0).'分';
    
    } else if ($time < 86400) {
      $res = round(($time / 3600), 0).'時間';
      
    } else {
      $res = (date("Y", $now) == date("Y", $original) ? date("n月j日", $original) : date("y年n月j日", $original));	
    
    }
    
    return $rs;
  
  }
  
?>  

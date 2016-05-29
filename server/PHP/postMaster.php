<?php
/**
 *
 * Strips the incoming post object of any tags or slashes, else it returns null
 * @param $value
 * @return null|string
 */
function getPost($value){
      if(!empty($_POST)&&!empty($_POST[$value])){
        // Strips any html tags
          $postValue = strip_tags($_POST[$value]);
        // Strips the \ (slashes) from any of the post values
          $postValue = stripcslashes($postValue);
          return $postValue;
      } else {
          return null;
      }
  }
?>

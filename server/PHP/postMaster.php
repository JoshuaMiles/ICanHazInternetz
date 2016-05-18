<?php

    function getPost($value){
        if(!empty($_POST)&&!empty($_POST[$value])){
            $postValue = strip_tags($_POST[$value]);
            $postValue = stripcslashes($postValue);
            return $postValue;
        } else {
            return null;
        }
    }


    function get($value){
        if(!empty($_GET)&&!empty($_GET[$value])){
            return $_GET[$value];
        } else {
            return null;
        }
    }

?>


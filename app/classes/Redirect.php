<?php


namespace App\classes;


class Redirect
{
    public static function to($page){
        header("Location: $page");
    }

    public static function back(){

        // for example if we in mysite.com/user this send /user to $uri
        $uri = $_SERVER['REQUEST_URI'];
        header("Location: $uri");
    }

}

<?php
define('CACHE_TIME',10*60);//cache store time
define('IF_HTTPS',false);//set true to auto turn to https
if(IF_HTTPS)
{
    if(empty($_SERVER['HTTPS']))
    {

        header('HTTP/1.1 301 Moved Permanently');
        header('Location: https://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
        return;
    }
}
ob_clean();
$url_md5=md5($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );//generate md5
if(!file_exists('./cache_html'))//create the cache store dir
    mkdir('./cache_html');
if($_SERVER['REQUEST_METHOD']=='GET')//only cache page when method is GET
{

    if((time()-filectime ("./cache_html/" . $url_md5 ))> CACHE_TIME  )//check cache time and if_exist
    {
        ob_start();//start a new ob to store the wordpress page.
        require("index1.php");//go to run wordpress
        $string = ob_get_contents();//get what wordpress output
        if(if_nocache() == false)//check if the page is NOT CACHE, in order to not cache in some situation (like when you sign in as an admin , a toolbar will display)
            file_put_contents("./cache_html/" . $url_md5, $string);//save cached page
        ob_end_clean();
    }
    else
    {
        $string = file_get_contents("./cache_html/" . $url_md5);//get cache page
    }
    echo $string;//output page
    echo "\n<!-- Cached by wp-superb-cache. -->";
}
else
    require("index1.php");


function if_nocache()//search in wordpress output headers
{
    $header=headers_list ();
    foreach($header as $one)
    {
        if(stripos($one,'no-cache') != false)
            return true;
    }
    return false;
}


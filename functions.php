<?php

function clientIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        return $_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //whether ip is from proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        //whether ip is from remote address
        return $_SERVER['REMOTE_ADDR'];
    }
}

function planets()
{
    return ['mercury', 'venus', 'earth', 'mars', 'asood', 'jupiter', 'saturn', 'uranus', 'neptune'];
}

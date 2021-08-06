<?php 
/**
 * file which is responsible for all the autoloading of defined classes wherever where 
 * object are initialised. 
 *
*/
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if(strpos($url,'includes/') != false)
    {
        $path='../classes/';
    }
    else
    {
        $path = 'classes/';
    }

    $extension = '.php';

    require_once $path . $className . $extension;
}
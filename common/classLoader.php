<?php

function classLoader($class)
{
    $dirs = array("common", "components");
    foreach($dirs as $dir) {
        if(file_exists(...)) {
            try{
                include_once ...;
            }catch(Exception $e){
                echo "Error while trying to load $class in ../".__FILE__.$dir."/".$class.".php";
            }            
            break;
        }
    }
}

// Register my autoload class
spl_autoload_register('classLoader');
<?php


/**
* Custom autoloader function for including necessary libraries. This is somewhat
* pre "Namespaces in 5.3". 
*
* @package onlineformsmarker
* @subpackage runtime
*
* @param string $class Name of the class to look up
* @return void
*/
function classLoader($class)
{
    $dirs = array("common", "components", "reader");
    foreach($dirs as $dir) {
        if(file_exists("./$dir/$class.php")) {
            try{
                include_once "./$dir/$class.php";
            }catch(Exception $e){
                echo "Error while trying to load {$class} in {$dir}/{$class}.php";
            }            
            break;
        }
    }
}

// Register my autoload class
spl_autoload_register('classLoader');
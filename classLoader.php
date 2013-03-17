<?php
/**
* Custom autoloader function for including the necessary libraries. 
* @package onlineformsmarker
* @param String $class Name of the class to look up
* @return void
*/
function classLoader($class)
{
    $class = preg_match("/\\\([\w _-]+)$/i", $class, $matches); // remove the namespace prefix from the name of the class -- transitory measure only!
    $class = $matches[1]; 
 
    $dirs = array("common", "components", "reader");          // look up directories
    foreach($dirs as $dir) {
        if(file_exists(OFMWWWDIR.OFMDS.OFMHOME.OFMDS.$dir.OFMDS.$class.'.php')) {
            try{
                include_once OFMWWWDIR.OFMDS.OFMHOME.OFMDS.$dir.OFMDS.$class.'.php';
            }catch(Exception $e){
                echo "Error while trying to load $class in ".$dir.OFMDS.$class.".php";
            }            
            break;
        }
    }
}

# Store the used paths in a file so that they can be retrieved faster without the need to traverse through the directories
# Use an ordered array to enable binary search
function loadClassPaths() {}                                  // load the data from the file into an array and possibly store it in the SESSION as a serialized object (if the memory of SESSION is suitable for storing such data)
function lookupClassPath() {}                                 // look up the path in the file
function addClassPath() {}                                    // if the look up from the file failed and the path had to be build anew, then add it to the file
function clearUnusedPaths() {}                                // clears up the paths that have not been used in the last 30 days

spl_autoload_register('classLoader');                         // Register my autoload class

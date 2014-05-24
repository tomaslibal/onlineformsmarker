<?php

// Set the Environment:

/**
 * A helper function to define a constant if the constant's name
 * is not yet in use. Otherwise returns just false.
 *
 * @param string $name Name of the constant
 * @param string $value Value of the constant
 * @return bool
 */
function defineConst($name, $value)
{
    return (!defined($name)) ? define($name, $value) : false;    
}

// Environment settings
defineConst("OFM", "OFM"); // online forms marker
defineConst("OFMDS", DIRECTORY_SEPARATOR);
defineConst("OFMHOME", dirname(dirname(dirname(__FILE__))).OFMDS."onlineformsmarker");
<?php
// Environment settings
defineConst("OFM", "OFM"); // online forms marker
defineConst(OFM."DS", DIRECTORY_SEPARATOR);
defineConst(OFM."HOME", "onlineformsmarker");
defineConst(OFM."WWWDIR", dirname(dirname(__FILE__)));

/**
 * Defines a Constant
 * @param string $name Name of the constant
 * @param string $value Value of the constant
 * @return bool
 */
function defineConst($name, $value)
{
    if(!defined($name)) {
	    define($name, $value);
	    return true;
	}else {
		return false;
	}
}
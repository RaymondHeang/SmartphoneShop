<?php

    define ('ROOT', realpath(dirname(__FILE__) . '/../') . '/'); // define a CONST to identify the current directory

    function autoloadItemsClass($sClassName)// function for the autoloader to which php sends the classname
    {
        $sFilePath = ROOT . 'src/' . str_replace("\\","/",$sClassName) . '.class.php';// build the path for the class
        if (is_file($sFilePath)) {
            require_once $sFilePath;
        }
    }

    spl_autoload_register('autoloadItemsClass');// tell PHP to use our autoloader.
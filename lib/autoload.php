<?php

define('MBILLING_SDK_ROOT_PATH', __DIR__);
define('MBILLING_PSR_LOG_PATH', __DIR__.'/../vendor/psr/log/Psr/Log');

function mbillingLoadClass($className)
{
    if (strncmp('Mbilling', $className, 14) === 0) {
        $path   = MBILLING_SDK_ROOT_PATH;
        $length = 7;
    }
    elseif (strncmp('Psr\Log', $className, 7) === 0) {
        $path   = MBILLING_PSR_LOG_PATH;
        $length = 7;
    }
    else {
        return;
    }

    $path .= str_replace('\\', '/', substr($className, $length)) . '.php';
    if (file_exists($path)) {
        require $path;
    }
}

spl_autoload_register('mbillingLoadClass');
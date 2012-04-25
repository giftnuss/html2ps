<?php

require_once dirname(__FILE__) . '/framework/Test.php';

$base = dirname(dirname(__FILE__));

setup_include_path(array($base));

require_once 'config.inc.php';

function setup_include_path($pathdirs)
{
    $dirs = array();
    foreach($pathdirs as $dir) {
        $dirs[] = str_replace(array("/","\\"),DIRECTORY_SEPARATOR,$dir);
    }
    $path=get_include_path();
    if($path!==FALSE) {
        $comp = explode(PATH_SEPARATOR,$path);
        $comp = array_unique(array_merge($dirs,$comp));
        set_include_path(join(PATH_SEPARATOR,$comp));
    }
}

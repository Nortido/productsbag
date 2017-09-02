<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

$dirs = [
    'Interfaces',
    'Entities',
    'Adapters',
    'Controllers',
    'Support'
];

loadClasses($dirs);

/**
 * @param array $dirs
 */
function loadClasses($dirs = [])
{
    foreach ($dirs as $dir) {
        $dirPath = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.$dir;
        foreach (scandir($dirPath) as $filename) {

            $path = $dirPath.DIRECTORY_SEPARATOR. $filename;

            if (is_file($path)) {
                require $path;
            }
        }
    }
}

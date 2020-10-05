<?php

spl_autoload_register(function($class){
    
    // get the difference in foldres beteween the location of autoloader and the file that called autoloader
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    //echo "getcwd = : " . getcwd() . "<br>";
    //echo "__DIR__ = : " . __DIR__ . "<br>";
    //echo "last directories = : " . $lastdirectories . "<br>";
    
    // count the number of slashes (folder depth)
    $numberoflastdirectories = substr_count($lastdirectories, '\\');
    
    //echo "number of different directories = : " . $numberoflastdirectories . "<br>";
    
    // this is the liste of possible locations that classes are found in this app
    $directories = ['businessService', 'businessService/model', 'database', 'presentation', 'presentation/handlers', 'presentation/views', 'utility'];
    
    // look inside each directory for the desired class
    foreach ($directories as $d) {
        $currentdirectory = $d;
        for ($x=0; $x < $numberoflastdirectories; $x++){
            $currentdirectory = "../" . $currentdirectory;
        }
        
        $classfile = $currentdirectory . '/' . $class . '.php';
        
        if (is_readable($classfile)) {
            $require_file = require $d . '/' . $class . '.php';
            if ($require_file) {
                break;
            }
        }
    }
});


?>
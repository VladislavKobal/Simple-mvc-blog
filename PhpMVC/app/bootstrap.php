<?php 
include ROOT . DS . '/app/etc/config.php'; 
include ROOT . DS . '/app/core/DB.php';  
include ROOT . DS . '/app/core/model.php'; 
function myAutoloader($class_name) {   
    include ROOT . DS . '/app/models/' . $class_name . '.php'; 
}
spl_autoload_register("myAutoloader");
include ROOT . DS . '/app/core/Helper.php';  
include ROOT . DS . '/app/core/controller.php'; 
include ROOT . DS . '/app/core/route.php';  
Route::Start(); 

<?php

class Route
{

    public static function Start()
    {
        $controller_name = 'index';
        $action_name = 'index';
        $action_parameters = array();


        $uri_array = explode('?', $_SERVER['REQUEST_URI']);
        $route_array = explode('/', $uri_array[0]);

        if ($route_array[0] === "")
            array_shift($route_array);
        if ($route_array[0] === basename(getcwd()))
            array_shift($route_array);
        if ($route_array[0] === 'index.php')
            array_shift($route_array);

        if (!empty($route_array[0])) {
            $controller_name = $route_array[0];
        }

        if (!empty($route_array[1])) {
            $action_name = $route_array[1];
        }


        $controller_name = ucfirst($controller_name) . 'Controller';
        $action_name = ucfirst($action_name) . 'Action';

        if (file_exists(ROOT . DS . '/app/controllers/' . $controller_name . '.php')) {
            include ROOT . DS . '/app/controllers/' . $controller_name . '.php';
        } else {
            include ROOT . DS . '/app/controllers/ErrorController.php';
            $controller_name = 'ErrorController';
        }

        $controller = new $controller_name();
        $controller->$action_name();

    }

}

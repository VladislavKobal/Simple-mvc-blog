<?php

class Helper
{
    public static function getModel($name)
    {
        $model = new $name();
        return $model;
    }

    public static function getMenu()
    {
        return self::getModel('menu')->initCollection()
            ->sort(array('sort_order' => 'ASC'))->getCollection()->select();
    }

    public static function getCustomer()
    {
        if (!empty($_SESSION['id'])) {
            return self::getModel('User')->initCollection()
                ->getCollection()
                ->selectFirst();
        } else {
            return null;
        }
    }

    public static function simpleLink($path, $name, $params = [])
    {
        if (!empty($params)) {
            $firts_key = array_keys($params)[0];
            foreach ($params as $key => $value) {
                $path .= ($key === $firts_key ? '?' : '&');
                $path .= "$key=$value";
            }
        }
        return '<a href="' . BP . $path . '">' . $name . '</a>';
    }

    public static function Link($path, $name, $params = [])
    {
        if (!empty($params)) {
            $firts_key = array_keys($params)[0];
            foreach ($params as $key => $value) {
                $path .= ($key === $firts_key ? '?' : '&');
                $path .= "$key=$value";
            }
        }
        return '<a class="btn btn-default btn-block button-background btn-warning" href="' . BP . $path . '">' . $name . '</a>';
    }
}

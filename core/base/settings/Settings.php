<?php

namespace core\base\settings;

class Settings
{

    static private $_instance;
    private $routes
        = [
            'admin'    => [
                'name'  => 'admin',
                'path'  => 'code/admin/controller/',
                'hrUrl' => false,
            ],
            'settings' => [
                'path' => 'core/base/settings/',
            ],
            'plugins'  => [
                'path'  => 'core/plugins/',
                'hrUrl' => false
            ],
            'user'     => [
                'path'   => 'core/user/controller/',
                'hrUrl'  => true,
                'routes' => [

                ]
            ],
            'default'  => [
                'controller'   => 'IndexController',
                'inputMethod'  => 'inputData',
                'outputMethod' => 'outputData',
            ]
        ];

    private $templateArr
        = [
            'text'     => ['name', 'phone', 'address'],
            'textarea' => ['content', 'keywords'],
        ];

    private function __construct()
    {
    }

    public function clueProperties($class)
    {
        $baseProperties = [];

        foreach ($this as $name => $item) {
            $property = $class::get($name);

            if (is_array($property) && is_array($item)) {
                $baseProperties[$name] = $this->arrayMergeRecursive(
                    $this->$name,
                    $property
                );
                continue;
            }

            if (!$property) {
                $baseProperties[$name] = $this->$name;
            }
        }

        return $baseProperties;
    }

    static public function get($property)
    {
        return self::getInstance()->$property;
    }

    static public function getInstance()
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }

        return self::$_instance = new self;
    }

    public function arrayMergeRecursive()
    {
        $arrays = func_get_args();

        $base = array_shift($arrays);

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value) && is_array($base[$key])) {
                    $base[$key] = $this->arrayMergeRecursive($base[$key],
                        $value);
                } else {
                    if (is_int($key)) {
                        if (!in_array($value, $base)) {
                            array_push($base, $value);
                        }
                        continue;
                    }
                    $base[$key] = $value;
                }
            }
        }
        return $base;
    }

    private function __clone()
    {
    }

}
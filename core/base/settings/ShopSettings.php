<?php

namespace core\base\settings;

class ShopSettings
{

    static private $_instance;
    private $baseSettings;

    private $templateArr
        = [
            'text'     => ['name', 'phone', 'address', 'price', 'short'],
            'textarea' => ['content', 'keywords', 'goods_content'],
        ];

    private function __construct()
    {
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
        self::$_instance = new self;
        self::$_instance->baseSettings = Settings::getInstance();
        $baseProperties
            = self::$_instance->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance;
    }

    protected function setProperty($properties)
    {
        if ($properties) {
            foreach ($properties as $name => $property) {
                $this->$name = $property;
            }
        }
    }

    private function __clone()
    {
    }
}
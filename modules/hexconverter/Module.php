<?php

namespace hexconverter;

use Craft;
use hexconverter\twig\HexToRgb;

class Module extends \yii\base\Module
{
    public function __construct($id, $parent = null, array $config = [])
    {
        // Setzt Alias für das Modul
        Craft::setAlias('@hexconverter', __DIR__);
        parent::__construct($id, $parent, $config);
    }

    public function init()
    {
        parent::init();

        // Registriert die Twig-Erweiterung
        Craft::$app->view->registerTwigExtension(new HexToRgb());
    }
}

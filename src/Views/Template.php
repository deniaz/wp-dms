<?php

namespace Deniaz\WordPress\Dms\Views;

use Deniaz\WordPress\Dms\Plugin;

class Template
{
    const TEMPLATE_FOLDER = '/templates/';

    private $baseDir;
    private $vars = array();

    public function __construct($pluginDir)
    {
        $this->baseDir = $pluginDir . self::TEMPLATE_FOLDER;
    }

    public function __get($key)
    {
        return $this->vars[$key];
    }

    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function render($templateName)
    {
        extract($this->vars, EXTR_SKIP);
        ob_start();
        include $this->baseDir . $templateName;
        return ob_get_clean();
    }
}
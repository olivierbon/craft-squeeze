<?php

namespace olivierbon\squeeze;

/**
 * Squeeze Class 
 *
 * @author    Olivier Bon
 * @package   Squeeze
 * @since     1.0.0
 *
 */
class Squeeze extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        $this->setComponents([
            'squeeze' => \olivierbon\squeeze\services\SqueezeService::class,
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 21:41
 */

namespace WTWeb\WidgetBundle\Registry;

use Symfony\Component\Config\Definition\Exception\Exception;
use WTWeb\WidgetBundle\Widget\WidgetInterface;

/**
 * Class WidgetRegistry
 * @package WTWeb\WidgetBundle\Registry
 */
class WidgetRegistry implements WidgetRegistryInterface
{
    /** @var array %widgets */
    protected $widgets = [];

    /**
     * Gets a widget by name
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        if (!isset($this->widgets[$name])) {
            throw new Exception("Widget $name not found");
        }

        return $this->widgets[$name];
    }

    /**
     * Adds a new widget to the registry
     *
     * @param WidgetInterface $widget
     */
    public function add(WidgetInterface $widget)
    {
        $this->widgets[$widget->getName()] = $widget;
    }
}
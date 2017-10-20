<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 21:41
 */

namespace WTWeb\WidgetBundle\Registry;

use WTWeb\WidgetBundle\Widget\WidgetInterface;

/**
 * Interface WidgetRegistryInterface
 * @package WTWeb\WidgetBundle\Registry
 */
interface WidgetRegistryInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name);

    /**
     * @param WidgetInterface $widget
     * @return mixed
     */
    public function add(WidgetInterface $widget);
}
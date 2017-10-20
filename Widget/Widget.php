<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 21:43
 */

namespace WTWeb\WidgetBundle\Widget;

/**
 * Class Widget
 * @package WTWeb\WidgetBundle\Widget
 */
abstract class Widget implements WidgetInterface
{
    protected $template;

    protected $data;

    /**
     * Widget constructor.
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template\
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }
}

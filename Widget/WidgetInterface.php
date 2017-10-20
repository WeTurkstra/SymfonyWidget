<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 21:43
 */

namespace WTWeb\WidgetBundle\Widget;


interface WidgetInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return array
     */
    public function getData() : array;

    /**
     * @param array $data
     * @return mixed
     */
    public function setData(array $data);

    /**
     * @param array $params
     * @return mixed
     */
    public function build(array $params);

    /**
     * @return string
     */
    public function getTemplate() : string;

    /**
     * @param string $template
     * @return mixed
     */
    public function setTemplate(string $template);
}
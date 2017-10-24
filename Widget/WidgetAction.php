<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 24-10-2017
 * Time: 23:38
 */

namespace WTWeb\WidgetBundle\Widget;

use Symfony\Component\HttpFoundation\Request;

abstract class WidgetAction extends Widget
{
    private $request;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
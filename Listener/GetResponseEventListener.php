<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 24-10-2017
 * Time: 22:32
 */

namespace WTWeb\WidgetBundle\Listener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use WTWeb\WidgetBundle\Registry\WidgetRegistryInterface;
use WTWeb\WidgetBundle\Widget\WidgetAction;

class GetResponseEventListener
{
    private $widgetRegistry;

    public function __construct(WidgetRegistryInterface $widgetRegistry)
    {
        $this->widgetRegistry = $widgetRegistry;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $request = $event->getRequest();

        $widgetKey = $request->get('widgetKey');
        if(empty($widgetKey)) {
            return false;
        }

        $widgetAction = $request->get('widgetAction');
        if(empty($widgetAction)) {
            return false;
        }

        $widgetAction .= 'Action';

        $widget = $this->widgetRegistry->get($widgetKey);

        if(!$widget instanceof WidgetAction) {
            throw new \LogicException('Widget needs to extend WidgetAction');
        }

        $widget->setRequest($request);

        $response = $widget->$widgetAction();
        if ($response instanceof Response) {
           $event->setResponse($response);
        }
        return true;


    }
}

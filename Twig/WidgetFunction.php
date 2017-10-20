<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 21:28
 */

namespace WTWeb\WidgetBundle\Twig;


use WTWeb\WidgetBundle\Registry\WidgetRegistryInterface;
use WTWeb\WidgetBundle\Widget\WidgetInterface;

/**
 * Class WidgetFunction
 * @package WTWeb\WidgetBundle\Twig
 */
class WidgetFunction extends \Twig_Extension
{
    private $widgetRegistry;

    /**
     * WidgetFunction constructor.
     * @param WidgetRegistryInterface $widgetRegistry
     */
    public function __construct(WidgetRegistryInterface $widgetRegistry)
    {
        $this->widgetRegistry = $widgetRegistry;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'widget',
                [$this, 'renderWidget'],
                [
                    'needs_environment' => true,
                    'is_safe' => ['html']
                ]
            )
        ];
    }

    /**
     * @param \Twig_Environment $environment
     * @param string $name
     * @param array $params
     * @return string
     */
    public function renderWidget(\Twig_Environment $environment, string $name, array $params = [])
    {
        /** @var WidgetInterface $widget */
        $widget = $this->widgetRegistry->get($name);
        $widget->build($params);

        return $environment->render($widget->getTemplate(), $widget->getData());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'widget';
    }
}

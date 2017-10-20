<?php
/**
 * Created by PhpStorm.
 * User: Willem
 * Date: 20-10-2017
 * Time: 22:11
 */
namespace WTWeb\WidgetBundle\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class WidgetCompilerPass
 * @package WTWeb\WidgetBundle\Compiler\
 */
class WidgetCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $widgetRegistryDefinition = new Definition('WTWeb\WidgetBundle\Registry\WidgetRegistry');
        $container->setDefinition('wtweb.registry.widget', $widgetRegistryDefinition);

        $widgetTwigExtensionDefinition = new Definition('WTWeb\WidgetBundle\Twig\WidgetFunction');
        $widgetTwigExtensionDefinition->setArguments(array(new Reference('wtweb.registry.widget')));
        $widgetTwigExtensionDefinition->addTag('twig.extension');
        $container->setDefinition('widget.twig.widget', $widgetTwigExtensionDefinition);

        $taggedServices = $container->findTaggedServiceIds('twig.widget');

        foreach ($taggedServices as $id => $tagAttributes) {
            $widgetRegistryDefinition->addMethodCall('add', array(
                new Reference($id),
            ));
        }
    }
}
